<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb3057e46ed57f41f2847a19ff8ec2133
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb3057e46ed57f41f2847a19ff8ec2133::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb3057e46ed57f41f2847a19ff8ec2133::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
