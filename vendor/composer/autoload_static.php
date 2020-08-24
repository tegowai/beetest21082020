<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc6f501e0d679bfb0d104470a9088a579
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'application\\views\\' => 18,
            'application\\models\\' => 19,
            'application\\core\\' => 17,
            'application\\controllers\\' => 24,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'application\\views\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
        'application\\models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
        'application\\core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
        'application\\controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc6f501e0d679bfb0d104470a9088a579::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc6f501e0d679bfb0d104470a9088a579::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
