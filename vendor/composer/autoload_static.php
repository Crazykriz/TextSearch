<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9342fefb6b3790b4ecd76d6e2708525a
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Crazykriz\\TextSearch\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Crazykriz\\TextSearch\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9342fefb6b3790b4ecd76d6e2708525a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9342fefb6b3790b4ecd76d6e2708525a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
