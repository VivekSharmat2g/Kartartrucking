<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'kartartrucking-new' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '&Z@6qci#&P8VjsjhD-Y&kA|@)`5bFe;t:!jJ7?[5{(`3B8`/!X|.|z3 U;Ir<HU2' );
define( 'SECURE_AUTH_KEY',  '`cZw1$j.PXqgRzDBi.>nn6!FnM/7|>ZgkGWueErVe0)=ZTTyR0}6_VuUbRT^|4zF' );
define( 'LOGGED_IN_KEY',    '06fE@CpCYjnOI*qwJr[1m0_ikPt,(s^hh(!U?#/-QxQmi1RKgk8W1on$pz*P[XC-' );
define( 'NONCE_KEY',        'BzpJ5=vNl98l1n3j%||jw]/F#eyJ*Ln>Rs8n.fr2nNK,}:{i{p36*^4rgjm0u0b)' );
define( 'AUTH_SALT',        '#4f*K(TRPoP`ZHpx3SL%dW9!oVPC#bxhVr7TZ^>2p}!RS[Rb5{3|qqrjkK9TGn%5' );
define( 'SECURE_AUTH_SALT', 'w6~?!4us:E#@CHyq5BQ]R};FoqdXeV;0S(6n.-`hXq~*6clj_oLBCDleX^RA7{FZ' );
define( 'LOGGED_IN_SALT',   '].&?A6r9Keuw^M<EJQopq!+_JY4jc=waxUUHBK+W+Jc;uloC1<Gi0uad.LQ71KlY' );
define( 'NONCE_SALT',       'v8bOUR|COXj@d:vb@+3@*^jw6%[fDT$<QSIcf:X=yvwF/aWe-!@^oP:#CJ`Xy6Pg' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
