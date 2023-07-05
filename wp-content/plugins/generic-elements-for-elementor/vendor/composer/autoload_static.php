<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4261d276e3fd7eb5eb6872ee65faea44
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'Generic\\Elements\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Generic\\Elements\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
            1 => __DIR__ . '/../..' . '/widgets',
            2 => __DIR__ . '/../..' . '/classes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4261d276e3fd7eb5eb6872ee65faea44::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4261d276e3fd7eb5eb6872ee65faea44::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4261d276e3fd7eb5eb6872ee65faea44::$classMap;

        }, null, ClassLoader::class);
    }
}