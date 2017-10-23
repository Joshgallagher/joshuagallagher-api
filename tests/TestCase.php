<?php

namespace Tests;

use Illuminate\Support\Facades\Artisan;
use Laravel\Lumen\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        return require __DIR__.'/../bootstrap/app.php';
    }

    /**
     * Set up test suite and run migrations.
     */
    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate');
    }

    /**
     * Destroy test suite and reset migrations.
     */
    public function tearDown()
    {
        Artisan::call('migrate:reset');
        parent::tearDown();
    }
}
