<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbae6a70bf54b448615fa8c49982bf258
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbae6a70bf54b448615fa8c49982bf258::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbae6a70bf54b448615fa8c49982bf258::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
