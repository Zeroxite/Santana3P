<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita762d1557fe1d9d33b0ec94a0e0c9d87
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'O' => 
        array (
            'Orhanerday\\OpenAi\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Orhanerday\\OpenAi\\' => 
        array (
            0 => __DIR__ . '/..' . '/orhanerday/open-ai/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita762d1557fe1d9d33b0ec94a0e0c9d87::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita762d1557fe1d9d33b0ec94a0e0c9d87::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita762d1557fe1d9d33b0ec94a0e0c9d87::$classMap;

        }, null, ClassLoader::class);
    }
}
