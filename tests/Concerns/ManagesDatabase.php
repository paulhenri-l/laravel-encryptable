<?php

namespace PaulhenriL\LaravelEncryptable\Tests\Concerns;

use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as Capsule;

trait ManagesDatabase
{
    /**
     * Have we already prepared the DB?
     *
     * @var bool
     */
    protected static $dbPrepared = false;

    /**
     * Prepare the test database.
     */
    protected function prepareDbIfNecessary()
    {
        if (!static::$dbPrepared) {
            $this->bootEloquent();
            static::$dbPrepared = true;
        }
    }

    /**
     * Boot eloquent by using an in memory sqlite db.
     */
    protected function bootEloquent()
    {
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver' => 'sqlite',
            'database' => ':memory:',
        ]);

        $capsule->setEventDispatcher(new Dispatcher(new Container));
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    /**
     * Equivalent of migarte:fresh
     */
    protected function freshSchema()
    {
        Capsule::schema()->dropIfExists('hellos');
        Capsule::schema()->create('hellos', function ($table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->timestamps();
        });
    }
}
