<?php

namespace PaulhenriL\LaravelEncryptable\Tests;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function resolveApplicationConfiguration($app)
    {
        parent::resolveApplicationConfiguration($app);

        $app->make('config')->set(
            'app.key', '00000000000000000000000000000000'
        );
    }
}
