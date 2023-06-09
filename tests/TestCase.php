<?php

namespace Mintellity\LaravelSortedLists\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Mintellity\LaravelSortedLists\LaravelSortedListsServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Mintellity\\LaravelSortedLists\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelSortedListsServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-sorted-lists_table.php.stub';
        $migration->up();
        */
    }
}
