<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9d3f3f3b284f8b3a3443f767fda79fe8
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Modules\\Jobs\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Modules\\Jobs\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Modules\\Jobs\\Database\\Seeders\\JobsDatabaseSeeder' => __DIR__ . '/../..' . '/Database/Seeders/JobsDatabaseSeeder.php',
        'Modules\\Jobs\\Entities\\Trip' => __DIR__ . '/../..' . '/Entities/Trip.php',
        'Modules\\Jobs\\Http\\Controllers\\Api\\JobController' => __DIR__ . '/../..' . '/Http/Controllers/Api/JobController.php',
        'Modules\\Jobs\\Http\\Controllers\\JobsController' => __DIR__ . '/../..' . '/Http/Controllers/JobsController.php',
        'Modules\\Jobs\\Http\\Requests\\JobRequest' => __DIR__ . '/../..' . '/Http/Requests/JobRequest.php',
        'Modules\\Jobs\\Providers\\JobsServiceProvider' => __DIR__ . '/../..' . '/Providers/JobsServiceProvider.php',
        'Modules\\Jobs\\Providers\\RouteServiceProvider' => __DIR__ . '/../..' . '/Providers/RouteServiceProvider.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9d3f3f3b284f8b3a3443f767fda79fe8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9d3f3f3b284f8b3a3443f767fda79fe8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9d3f3f3b284f8b3a3443f767fda79fe8::$classMap;

        }, null, ClassLoader::class);
    }
}