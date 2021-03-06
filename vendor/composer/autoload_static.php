<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit06a414b28d55d776d89629dd10139492
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\SimpleCache\\' => 16,
            'Psr\\Log\\' => 8,
            'Psr\\Cache\\' => 10,
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'C' => 
        array (
            'Cache\\TagInterop\\' => 17,
            'Cache\\Adapter\\Common\\' => 21,
            'Cache\\Adapter\\Apc\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\SimpleCache\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/simple-cache/src',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Psr\\Cache\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/cache/src',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Cache\\TagInterop\\' => 
        array (
            0 => __DIR__ . '/..' . '/cache/tag-interop',
        ),
        'Cache\\Adapter\\Common\\' => 
        array (
            0 => __DIR__ . '/..' . '/cache/adapter-common',
        ),
        'Cache\\Adapter\\Apc\\' => 
        array (
            0 => __DIR__ . '/..' . '/cache/apc-adapter',
        ),
    );

    public static $classMap = array (
        'App\\Controllers\\CompanyController' => __DIR__ . '/../..' . '/app/controllers/CompanyController.php',
        'App\\Controllers\\ContactController' => __DIR__ . '/../..' . '/app/controllers/ContactController.php',
        'App\\Controllers\\DashboardController' => __DIR__ . '/../..' . '/app/controllers/DashboardController.php',
        'App\\Controllers\\FilesController' => __DIR__ . '/../..' . '/app/controllers/FilesController.php',
        'App\\Controllers\\Helper' => __DIR__ . '/../..' . '/app/controllers/Helper.php',
        'App\\Controllers\\LoginController' => __DIR__ . '/../..' . '/app/controllers/LoginController.php',
        'App\\Controllers\\PageController' => __DIR__ . '/../..' . '/app/controllers/PageController.php',
        'App\\Controllers\\PasswordController' => __DIR__ . '/../..' . '/app/controllers/PasswordController.php',
        'App\\Controllers\\QuestionController' => __DIR__ . '/../..' . '/app/controllers/QuestionController.php',
        'App\\Controllers\\RecoveryController' => __DIR__ . '/../..' . '/app/controllers/RecoveryController.php',
        'App\\Controllers\\RegisterController' => __DIR__ . '/../..' . '/app/controllers/RegisterController.php',
        'App\\Controllers\\SellerController' => __DIR__ . '/../..' . '/app/controllers/SellerController.php',
        'App\\Core\\Answer' => __DIR__ . '/../..' . '/core/Answer.php',
        'App\\Core\\App' => __DIR__ . '/../..' . '/core/app.php',
        'App\\Core\\Company' => __DIR__ . '/../..' . '/core/Company.php',
        'App\\Core\\Contact' => __DIR__ . '/../..' . '/core/Contact.php',
        'App\\Core\\Photo' => __DIR__ . '/../..' . '/core/Photo.php',
        'App\\Core\\Question' => __DIR__ . '/../..' . '/core/Question.php',
        'App\\Core\\QuestionCategory' => __DIR__ . '/../..' . '/core/QuestionCategory.php',
        'App\\Core\\Request' => __DIR__ . '/../..' . '/core/Request.php',
        'App\\Core\\Router' => __DIR__ . '/../..' . '/core/Router.php',
        'App\\Core\\User' => __DIR__ . '/../..' . '/core/User.php',
        'Cache\\Adapter\\Apc\\ApcCachePool' => __DIR__ . '/..' . '/cache/apc-adapter/ApcCachePool.php',
        'Cache\\Adapter\\Common\\AbstractCachePool' => __DIR__ . '/..' . '/cache/adapter-common/AbstractCachePool.php',
        'Cache\\Adapter\\Common\\CacheItem' => __DIR__ . '/..' . '/cache/adapter-common/CacheItem.php',
        'Cache\\Adapter\\Common\\Exception\\CacheException' => __DIR__ . '/..' . '/cache/adapter-common/Exception/CacheException.php',
        'Cache\\Adapter\\Common\\Exception\\CachePoolException' => __DIR__ . '/..' . '/cache/adapter-common/Exception/CachePoolException.php',
        'Cache\\Adapter\\Common\\Exception\\InvalidArgumentException' => __DIR__ . '/..' . '/cache/adapter-common/Exception/InvalidArgumentException.php',
        'Cache\\Adapter\\Common\\HasExpirationTimestampInterface' => __DIR__ . '/..' . '/cache/adapter-common/HasExpirationTimestampInterface.php',
        'Cache\\Adapter\\Common\\JsonBinaryArmoring' => __DIR__ . '/..' . '/cache/adapter-common/JsonBinaryArmoring.php',
        'Cache\\Adapter\\Common\\PhpCacheItem' => __DIR__ . '/..' . '/cache/adapter-common/PhpCacheItem.php',
        'Cache\\Adapter\\Common\\PhpCachePool' => __DIR__ . '/..' . '/cache/adapter-common/PhpCachePool.php',
        'Cache\\Adapter\\Common\\TagSupportWithArray' => __DIR__ . '/..' . '/cache/adapter-common/TagSupportWithArray.php',
        'Cache\\TagInterop\\TaggableCacheItemInterface' => __DIR__ . '/..' . '/cache/tag-interop/TaggableCacheItemInterface.php',
        'Cache\\TagInterop\\TaggableCacheItemPoolInterface' => __DIR__ . '/..' . '/cache/tag-interop/TaggableCacheItemPoolInterface.php',
        'ComposerAutoloaderInit06a414b28d55d776d89629dd10139492' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInit06a414b28d55d776d89629dd10139492' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Connection' => __DIR__ . '/../..' . '/core/database/Connection.php',
        'ExampleTest' => __DIR__ . '/../..' . '/tests/ExampleTest.php',
        'PHPMailer\\PHPMailer\\Exception' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/Exception.php',
        'PHPMailer\\PHPMailer\\OAuth' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/OAuth.php',
        'PHPMailer\\PHPMailer\\PHPMailer' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/PHPMailer.php',
        'PHPMailer\\PHPMailer\\POP3' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/POP3.php',
        'PHPMailer\\PHPMailer\\SMTP' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/SMTP.php',
        'Psr\\Cache\\CacheException' => __DIR__ . '/..' . '/psr/cache/src/CacheException.php',
        'Psr\\Cache\\CacheItemInterface' => __DIR__ . '/..' . '/psr/cache/src/CacheItemInterface.php',
        'Psr\\Cache\\CacheItemPoolInterface' => __DIR__ . '/..' . '/psr/cache/src/CacheItemPoolInterface.php',
        'Psr\\Cache\\InvalidArgumentException' => __DIR__ . '/..' . '/psr/cache/src/InvalidArgumentException.php',
        'Psr\\Log\\AbstractLogger' => __DIR__ . '/..' . '/psr/log/Psr/Log/AbstractLogger.php',
        'Psr\\Log\\InvalidArgumentException' => __DIR__ . '/..' . '/psr/log/Psr/Log/InvalidArgumentException.php',
        'Psr\\Log\\LogLevel' => __DIR__ . '/..' . '/psr/log/Psr/Log/LogLevel.php',
        'Psr\\Log\\LoggerAwareInterface' => __DIR__ . '/..' . '/psr/log/Psr/Log/LoggerAwareInterface.php',
        'Psr\\Log\\LoggerAwareTrait' => __DIR__ . '/..' . '/psr/log/Psr/Log/LoggerAwareTrait.php',
        'Psr\\Log\\LoggerInterface' => __DIR__ . '/..' . '/psr/log/Psr/Log/LoggerInterface.php',
        'Psr\\Log\\LoggerTrait' => __DIR__ . '/..' . '/psr/log/Psr/Log/LoggerTrait.php',
        'Psr\\Log\\NullLogger' => __DIR__ . '/..' . '/psr/log/Psr/Log/NullLogger.php',
        'Psr\\Log\\Test\\DummyTest' => __DIR__ . '/..' . '/psr/log/Psr/Log/Test/LoggerInterfaceTest.php',
        'Psr\\Log\\Test\\LoggerInterfaceTest' => __DIR__ . '/..' . '/psr/log/Psr/Log/Test/LoggerInterfaceTest.php',
        'Psr\\SimpleCache\\CacheException' => __DIR__ . '/..' . '/psr/simple-cache/src/CacheException.php',
        'Psr\\SimpleCache\\CacheInterface' => __DIR__ . '/..' . '/psr/simple-cache/src/CacheInterface.php',
        'Psr\\SimpleCache\\InvalidArgumentException' => __DIR__ . '/..' . '/psr/simple-cache/src/InvalidArgumentException.php',
        'QueryBuilder' => __DIR__ . '/../..' . '/core/database/QueryBuilder.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit06a414b28d55d776d89629dd10139492::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit06a414b28d55d776d89629dd10139492::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit06a414b28d55d776d89629dd10139492::$classMap;

        }, null, ClassLoader::class);
    }
}
