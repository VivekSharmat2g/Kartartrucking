<?php
/**
 * Wishlist table AJAX actions
 *
 * @since             2.0.0
 * @package           TInvWishlist\Public
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Wishlist shortcode
 */
class TInvWL_Public_Wishlist_Ajax {

	/**
	 * Current wishlist
	 *
	 * @var array
	 */
	private $current_wishlist;

	/**
	 * This class
	 *
	 * @var \TInvWL_Public_Wishlist_Ajax
	 */
	protected static $_instance = null;

	/**
	 * Get this class object
	 *
	 * @param string $plugin_name Plugin name.
	 *
	 * @return \TInvWL_Public_Wishlist_Ajax
	 */
	public static function instance( $plugin_name = TINVWL_PREFIX ) {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self( $plugin_name );
		}

		return self::$_instance;
	}

	/**
	 * Constructor
	 *
	 * @param string $plugin_name Plugin name.
	 */
	function __construct( $plugin_name ) {
		$this->_name = $plugin_name;
		$this->define_hooks();
	}

	/**
	 * Defined shortcode and hooks
	 */
	function define_hooks() {
		add_action( 'wc_ajax_tinvwl', array( $this, 'ajax_action' ) );
	}

	function ajax_action() {
		$post = filter_input_array( INPUT_POST, array(
			'tinvwl-security'   => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
			'tinvwl-action'     => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
			'tinvwl-product_id' => FILTER_VALIDATE_INT,
			'tinvwl-paged'      => FILTER_VALIDATE_INT,
			'tinvwl-per-page'   => FILTER_VALIDATE_INT,
			'tinvwl-sharekey'   => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
			'tinvwl-products'   => array(
				'filter' => FILTER_VALIDATE_INT,
				'flags'  => FILTER_FORCE_ARRAY,
			),
		) );

		if ( ! isset( $post['tinvwl-action'] ) || ! $post['tinvwl-action'] ) {
			return;
		}

		$wl       = new TInvWL_Wishlist( $this->_name );
		$wishlist = $wl->get_by_share_key( $post['tinvwl-sharekey'] );

		if ( ! $wishlist ) {
			$wishlist = $wl->get_by_user_default();
			$wishlist = array_shift( $wishlist );
		}

		$guest_wishlist = false;
		if ( ! is_user_logged_in() ) {
			$guest_wishlist = $wl->get_by_sharekey_default();
			$guest_wishlist = array_shift( $guest_wishlist );
		}

		if ( defined( 'DOING_AJAX' ) && DOING_AJAX && isset( $post['tinvwl-security'] ) && wp_verify_nonce( $post['tinvwl-security'], 'wp_rest' ) && isset( $post['tinvwl-action'] ) ) {
			$this->wishlist_ajax_actions( $wishlist, $post, $guest_wishlist );
		} else {
			$response['status'] = false;
			$response['msg'][]  = __( 'Something went wrong', 'ti-woocommerce-wishlist' );
			$response['icon']   = $response['status'] ? 'icon_big_heart_check' : 'icon_big_times';
			$response['msg']    = array_unique( $response['msg'] );
			$response['msg']    = implode( '<br>', $response['msg'] );
			if ( tinv_get_option( 'table', 'hide_popup' ) && array_key_exists( 'msg', $response ) ) {
				unset( $response['msg'] );
			}
			if ( ! empty( $response['msg'] ) ) {
				$response['msg'] = tinv_wishlist_template_html( 'ti-addedtowishlist-dialogbox.php', apply_filters( 'tinvwl_addtowishlist_dialog_box', $response, $post ) );
			}
			wp_send_json( $response );
		}
	}

	function wishlist_ajax_actions( $wishlist, $post, $guest_wishlist = false ) {

		do_action( 'tinvwl_ajax_actions_before', $wishlist, $post, $guest_wishlist );

		if ( ! $wishlist && $guest_wishlist ) {
			$wishlist = $guest_wishlist;
		}

		$post['wishlist_qty'] = 1;
		$action               = $post['tinvwl-action'];
		$class                = TInvWL_Public_AddToWishlist::instance();
		$owner                = ( $wishlist && isset( $wishlist['is_owner'] ) ) ? (bool) $wishlist['is_owner'] : false;
		$response['status']   = false;
		$response['msg']      = array();

		switch ( $action ) {
			case 'remove':
				if ( ! $wishlist['is_owner'] ) {
					$response['msg'][] = __( 'Something went wrong', 'ti-woocommerce-wishlist' );
					break;
				}
				$product = $post['tinvwl-product_id'];
				if ( 0 === $wishlist['ID'] ) {
					$wlp = TInvWL_Product_Local::instance();
				} else {
					$wlp = new TInvWL_Product( $wishlist );
				}
				if ( empty( $wlp ) ) {
					$response['msg'][] = __( 'Something went wrong', 'ti-woocommerce-wishlist' );
					break;
				}
				$product_data = $wlp->get_wishlist( array( 'ID' => $product ) );
				$product_data = array_shift( $product_data );
				if ( empty( $product_data ) ) {
					$response['msg'][] = __( 'Something went wrong', 'ti-woocommerce-wishlist' );
					break;
				}

				$title = sprintf( __( '&ldquo;%s&rdquo;', 'ti-woocommerce-wishlist' ), is_callable( array(
					$product_data['data'],
					'get_name'
				) ) ? $product_data['data']->get_name() : $product_data['data']->get_title() );

				if ( $wlp->remove( $product_data ) ) {
					$response['status'] = true;
					$response['msg'][]  = sprintf( __( '%s has been removed from wishlist.', 'ti-woocommerce-wishlist' ), $title );
				} else {
					$response['status'] = false;
					$response['msg'][]  = sprintf( __( '%s has not been removed from wishlist.', 'ti-woocommerce-wishlist' ), $title );
				}

				break;
			case 'add_to_cart_single':
				$product_id = $post['tinvwl-product_id'];
				if ( 0 === $wishlist['ID'] ) {
					$wlp = TInvWL_Product_Local::instance();
				} else {
					$wlp = new TInvWL_Product( $wishlist );
				}
				if ( empty( $wlp ) ) {
					$response['msg'][] = __( 'Something went wrong', 'ti-woocommerce-wishlist' );
					break;
				}
				$product_data = $wlp->get_wishlist( array( 'ID' => $product_id ) );
				$product_data = array_shift( $product_data );
				if ( empty( $product_data ) ) {
					$response['msg'][] = __( 'Something went wrong', 'ti-woocommerce-wishlist' );
					break;
				}

				$title = sprintf( __( '&ldquo;%s&rdquo;', 'ti-woocommerce-wishlist' ), is_callable( array(
					$product_data['data'],
					'get_name'
				) ) ? $product_data['data']->get_name() : $product_data['data']->get_title() );

				global $product;
				// store global product data.
				$_product_tmp = $product;
				// override global product data.
				$product = $product_data['data'];

				add_filter( 'clean_url', 'tinvwl_clean_url', 10, 2 );
				$redirect_url = $product_data['data']->add_to_cart_url();
				remove_filter( 'clean_url', 'tinvwl_clean_url', 10 );

				// restore global product data.
				$product = $_product_tmp;

				$quantity = apply_filters( 'tinvwl_product_add_to_cart_quantity', 1, $product_data['data'] );

				if ( apply_filters( 'tinvwl_product_add_to_cart_need_redirect', false, $product_data['data'], $redirect_url, $product_data ) ) {
					$response['redirect'] = apply_filters( 'tinvwl_product_add_to_cart_redirect_url', $redirect_url, $product_data['data'], $product_data );

				} elseif ( apply_filters( 'tinvwl_allow_addtocart_in_wishlist', true, $wishlist, $owner ) ) {
					$add = TInvWL_Public_Cart::add( $wishlist, $product_id, $quantity );
					if ( $add && ! isset( $add['error_code'] ) ) {
						$response['status'] = true;
						$response['msg'][]  = sprintf( _n( '%s has been added to your cart.', '%s have been added to your cart.', 1, 'ti-woocommerce-wishlist' ), $title );

						if ( tinv_get_option( 'processing', 'redirect_checkout' ) ) {
							$response['redirect'] = wc_get_checkout_url();
						}

						if ( 'yes' === get_option( 'woocommerce_cart_redirect_after_add' ) ) {
							$response['redirect'] = wc_get_cart_url();
						}
					} else {
						$response['status'] = false;
						$response['msg'][]  = TInvWL_Public_Cart::cart_all_errors_message( array( $add ) );
					}
				}

				break;

			case 'remove_selected':
				if ( ! $owner ) {
					$response['msg'][] = __( 'Something went wrong', 'ti-woocommerce-wishlist' );
					break;
				}
				$wlp = null;
				if ( 0 === $wishlist['ID'] ) {
					$wlp = TInvWL_Product_Local::instance();
				} else {
					$wlp = new TInvWL_Product( $wishlist );
				}
				if ( empty( $wlp ) ) {
					$response['msg'][] = __( 'Something went wrong', 'ti-woocommerce-wishlist' );
					break;
				}

				$products = $wlp->get_wishlist( array(
					'ID'    => $post['tinvwl-products'],
					'count' => 9999999,
				) );

				$titles = array();
				foreach ( $products as $product ) {
					if ( $wlp->remove_product_from_wl( $product['wishlist_id'], $product['product_id'], $product['variation_id'], $product['meta'] ) ) {
						$titles[] = sprintf( __( '&ldquo;%s&rdquo;', 'ti-woocommerce-wishlist' ), is_callable( array(
							$product['data'],
							'get_name'
						) ) ? $product['data']->get_name() : $product['data']->get_title() );
					}
				}
				if ( ! empty( $titles ) ) {
					$response['status'] = true;
					$response['msg'][]  = sprintf( _n( '%s has been successfully removed from wishlist.', '%s have been successfully removed from wishlist.', count( $titles ), 'ti-woocommerce-wishlist' ), wc_format_list_of_items( $titles ) );
				}

				break;
			case 'add_to_cart_selected':
				$_quantity = array();
				$products  = $post['tinvwl-products'];

				$result = $errors = array();
				foreach ( $products as $id ) {
					$wlp = null;
					if ( 0 === $wishlist['ID'] ) {
						$wlp = TInvWL_Product_Local::instance();
					} else {
						$wlp = new TInvWL_Product( $wishlist );
					}
					$_product     = $wlp->get_wishlist( array( 'ID' => $id ) );
					$_product     = array_shift( $_product );
					$product_data = wc_get_product( $_product['variation_id'] ? $_product['variation_id'] : $_product['product_id'] );

					if ( ! $product_data || 'trash' === $product_data->get_status() ) {
						continue;
					}

					global $product;
					// store global product data.
					$_product_tmp = $product;
					// override global product data.
					$product = $product_data;

					add_filter( 'clean_url', 'tinvwl_clean_url', 10, 2 );
					$redirect_url = $product_data->add_to_cart_url();
					remove_filter( 'clean_url', 'tinvwl_clean_url', 10 );

					// restore global product data.
					$product = $_product_tmp;

					$quantity             = apply_filters( 'tinvwl_product_add_to_cart_quantity', array_key_exists( $_product['ID'], (array) $_quantity ) ? $_quantity[ $_product['ID'] ] : 1, $product_data );
					$_product['quantity'] = $quantity;
					if ( apply_filters( 'tinvwl_product_add_to_cart_need_redirect', false, $product_data, $redirect_url, $_product ) ) {
						$cart_errors = TInvWL_Public_Cart::add_to_cart_errors( $product_data, $quantity );
						$error_code  = $cart_errors['error_code'] ?? 'default';
						$errors[]    = array(
							'product'    => $product_data,
							'quantity'   => $quantity,
							'error_code' => $error_code
						);
						continue;
					}

					$_product = $_product['ID'];

					$add = TInvWL_Public_Cart::add( $wishlist, $_product, $quantity );

					if ( $add && ! isset( $add['error_code'] ) ) {
						$result[] = $add;
					} else {
						$errors[] = $add;
					}
				}

				if ( ! empty( $errors ) ) {
					$response['msg'][] = TInvWL_Public_Cart::cart_all_errors_message( $errors );
				}
				if ( ! empty( $result ) ) {
					$response['status'] = true;

					$titles = array();
					$count  = 0;
					foreach ( $result as $key => $data ) {
						/* translators: %s: product name */
						$titles[] = apply_filters( 'woocommerce_add_to_cart_qty_html', ( $data['quantity'] > 1 ? absint( $data['quantity'] ) . ' &times; ' : '' ), $data['product']->get_id() ) . apply_filters( 'woocommerce_add_to_cart_item_name_in_quotes', sprintf( _x( '&ldquo;%s&rdquo;', 'Item name in quotes', 'ti-woocommerce-wishlist' ), $data['product']->get_name() ), $data['product']->get_id() );
						$count    += $data['quantity'];
					}

					$titles = array_filter( $titles );
					/* translators: %s: product name */
					$response['msg'][] = sprintf( _n( '%s has been added to your cart.', '%s have been added to your cart.', $count, 'ti-woocommerce-wishlist' ), wc_format_list_of_items( $titles ) );

					if ( tinv_get_option( 'processing', 'redirect_checkout' ) ) {
						$response['redirect'] = wc_get_checkout_url();
					}

					if ( 'yes' === get_option( 'woocommerce_cart_redirect_after_add' ) ) {
						$response['redirect'] = wc_get_cart_url();
					}
				}

				break;
			case 'add_to_cart_all':
				$_quantity = array();
				add_filter( 'tinvwl_before_get_current_product', array(
					'TInvWL_Public_Wishlist_Buttons',
					'get_all_products_fix_offset'
				) );
				$products = TInvWL_Public_Wishlist_Buttons::get_current_products( $wishlist, 9999999 );
				$result   = $errors = array();
				foreach ( $products as $_product ) {
					$product_data = wc_get_product( $_product['variation_id'] ? $_product['variation_id'] : $_product['product_id'] );

					if ( ! $product_data || 'trash' === $product_data->get_status() ) {
						continue;
					}

					global $product;
					// store global product data.
					$_product_tmp = $product;
					// override global product data.
					$product = $product_data;

					add_filter( 'clean_url', 'tinvwl_clean_url', 10, 2 );
					$redirect_url = $product_data->add_to_cart_url();
					remove_filter( 'clean_url', 'tinvwl_clean_url', 10 );

					// restore global product data.
					$product = $_product_tmp;

					$quantity             = apply_filters( 'tinvwl_product_add_to_cart_quantity', array_key_exists( $_product['ID'], (array) $_quantity ) ? $_quantity[ $_product['ID'] ] : 1, $product_data );
					$_product['quantity'] = $quantity;
					if ( apply_filters( 'tinvwl_product_add_to_cart_need_redirect', false, $product_data, $redirect_url, $_product ) ) {
						$cart_errors = TInvWL_Public_Cart::add_to_cart_errors( $product_data, $quantity );
						$error_code  = $cart_errors['error_code'] ?? 'default';
						$errors[]    = array(
							'product'    => $product_data,
							'quantity'   => $quantity,
							'error_code' => $error_code
						);
						continue;
					}

					$_product = $_product['ID'];

					$add = TInvWL_Public_Cart::add( $wishlist, $_product, $quantity );

					if ( $add && ! isset( $add['error_code'] ) ) {
						$result[] = $add;
					} else {
						$errors[] = $add;
					}
				}

				if ( ! empty( $errors ) ) {
					$response['msg'][] = TInvWL_Public_Cart::cart_all_errors_message( $errors );
				}
				if ( ! empty( $result ) ) {
					$response['status'] = true;

					$titles = array();
					$count  = 0;
					foreach ( $result as $key => $data ) {
						/* translators: %s: product name */
						$titles[] = apply_filters( 'woocommerce_add_to_cart_qty_html', ( $data['quantity'] > 1 ? absint( $data['quantity'] ) . ' &times; ' : '' ), $data['product']->get_id() ) . apply_filters( 'woocommerce_add_to_cart_item_name_in_quotes', sprintf( _x( '&ldquo;%s&rdquo;', 'Item name in quotes', 'ti-woocommerce-wishlist' ), $data['product']->get_name() ), $data['product']->get_id() );
						$count    += $data['quantity'];
					}

					$titles = array_filter( $titles );
					/* translators: %s: product name */
					$response['msg'][] = sprintf( _n( '%s has been added to your cart.', '%s have been added to your cart.', $count, 'ti-woocommerce-wishlist' ), wc_format_list_of_items( $titles ) );

					if ( tinv_get_option( 'processing', 'redirect_checkout' ) ) {
						$response['redirect'] = wc_get_checkout_url();
					}

					if ( 'yes' === get_option( 'woocommerce_cart_redirect_after_add' ) ) {
						$response['redirect'] = wc_get_cart_url();
					}
				}
				break;
			case 'get_data':
				$response['status'] = true;
				break;
		}
		$response['content'] = tinvwl_shortcode_view( array(
			'paged'          => $post['tinvwl-paged'],
			'sharekey'       => $post['tinvwl-sharekey'],
			'lists_per_page' => $post['tinvwl-per-page'],
		) );
		$response['action']  = $action;
		$response['icon']    = $response['status'] ? 'icon_big_heart_check' : 'icon_big_times';
		$response['msg']     = array_unique( $response['msg'] );
		$response['msg']     = implode( '<br>', $response['msg'] );
		if ( tinv_get_option( 'table', 'hide_popup' ) && array_key_exists( 'msg', $response ) ) {
			unset( $response['msg'] );
		}
		if ( ! empty( $response['msg'] ) ) {
			$response['msg'] = tinv_wishlist_template_html( 'ti-addedtowishlist-dialogbox.php', apply_filters( 'tinvwl_addtowishlist_dialog_box', $response, $post ) );
		}

		$share_key = false;

		if ( $guest_wishlist ) {
			$share_key = $guest_wishlist['share_key'];
		}
		$response['wishlists_data'] = $class->get_wishlists_data( $share_key );

		do_action( 'tinvwl_action_' . $action, $wishlist, $post['tinvwl-products'], $post['wishlist_qty'], $owner ); // @codingStandardsIgnoreLine WordPress.NamingConventions.ValidHookName.UseUnderscores
		do_action( 'tinvwl_ajax_actions_after', $wishlist, $post, $guest_wishlist );
		wp_send_json( $response );
	}
}
