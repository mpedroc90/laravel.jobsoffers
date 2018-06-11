<?php

namespace Tests;

use App\Employer;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp()
    {
        parent::setUp();

        Artisan::call('migrate:fresh');
    }

    protected function tearDown()
    {
        parent::tearDown();
      //  Artisan::call('migrate:reset');

    }


    public function createApplication()
    {


        $app = require __DIR__ . '/../bootstrap/app.php';



        $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
        return $app;
    }

}






