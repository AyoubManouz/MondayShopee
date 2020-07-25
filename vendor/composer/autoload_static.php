<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit46d81ab460e934036c4cf9e5ae604de8
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit46d81ab460e934036c4cf9e5ae604de8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit46d81ab460e934036c4cf9e5ae604de8::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}