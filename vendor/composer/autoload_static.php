<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit087b44b207afedead8eec3797bd20110
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit087b44b207afedead8eec3797bd20110::$classMap;

        }, null, ClassLoader::class);
    }
}
