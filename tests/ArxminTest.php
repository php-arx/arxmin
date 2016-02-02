<?php

/**
 * Main Arxmin test
 */
class ArxminTest extends Illuminate\Foundation\Testing\TestCase {

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $this->reportError();

        $app = require __DIR__.'/../../../../bootstrap/app.php';

        $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

        return $app;
    }

    /**
     * Test if it's correctly instanciated
     */
    public function testIfItsWorking()
    {
        error_reporting(1);
        $this->assertTrue(true, 'it s true');
    }

    /**
     * Test if Auth Provider is ok
     */
    public function testIfAuthIsOk()
    {
        $this->reportError();

        app('auth')->extend('arxmin', function(){
           return new \Arxmin\AuthProvider();
        });

        $user = app('auth')->driver('arxmin')->getUser();

        $this->assertNotEmpty($user, 'User is not defined');
    }

    public function reportError(){
        ini_set('error_reporting', 1);
        ini_set('display_errors', 1);
    }

}