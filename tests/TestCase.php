<?php

namespace ChrisBraybrooke\ArtisanVue\Tests;

use VueGenerators\ServiceProvider;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Contracts\Console\Kernel;
use Laravel\BrowserKitTesting\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../vendor/laravel/laravel/bootstrap/app.php';
        $app->register(ServiceProvider::class);
        $app->make(Kernel::class)->bootstrap();
        return $app;
    }

    /**
     * Setup DB and test variables before each test.
     */
    protected function setUp()
    {
        $filesystem = new Filesystem();
        $configDir = __DIR__.'./../src/config/artisan-vue.php';
        $configTarget = __DIR__.'./../vendor/laravel/laravel/config/artisan-vue.php';
        $filesystem->copy($configDir, $configTarget);
        parent::setUp();
    }
    /**
     * Teardown after each class.
     */
    protected function tearDown()
    {
        $filesystem = new Filesystem();
        $filesystem->deleteDirectory(resource_path());

        parent::tearDown();
    }
}
