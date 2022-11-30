<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbc79bbdbbfef608ab19b184b38e0873b
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Seip\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Seip\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbc79bbdbbfef608ab19b184b38e0873b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbc79bbdbbfef608ab19b184b38e0873b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbc79bbdbbfef608ab19b184b38e0873b::$classMap;

        }, null, ClassLoader::class);
    }
}