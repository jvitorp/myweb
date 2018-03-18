<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb0091ac6ea7ec8f2092b1484b59ceb68
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb0091ac6ea7ec8f2092b1484b59ceb68::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb0091ac6ea7ec8f2092b1484b59ceb68::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
