<?php

namespace Epmnzava\LocationDemografia\Tests;

use Orchestra\Testbench\TestCase;
use Epmnzava\LocationDemografia\LocationDemografiaServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [LocationDemografiaServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
