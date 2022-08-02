<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitab3dd7ee4c7dfc06d19d30c2dbbe878e
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitab3dd7ee4c7dfc06d19d30c2dbbe878e', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitab3dd7ee4c7dfc06d19d30c2dbbe878e', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitab3dd7ee4c7dfc06d19d30c2dbbe878e::getInitializer($loader));

        $loader->register(true);

        $includeFiles = \Composer\Autoload\ComposerStaticInitab3dd7ee4c7dfc06d19d30c2dbbe878e::$files;
        foreach ($includeFiles as $fileIdentifier => $file) {
            composerRequireab3dd7ee4c7dfc06d19d30c2dbbe878e($fileIdentifier, $file);
        }

        return $loader;
    }
}

/**
 * @param string $fileIdentifier
 * @param string $file
 * @return void
 */
function composerRequireab3dd7ee4c7dfc06d19d30c2dbbe878e($fileIdentifier, $file)
{
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;

        require $file;
    }
}
