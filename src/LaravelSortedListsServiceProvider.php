<?php

namespace Mintellity\LaravelSortedLists;

use Illuminate\Support\Facades\Route;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelSortedListsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-sorted-lists')
            ->hasConfigFile()
            ->hasMigration('create_sorted_lists_items_table')
            ->hasViews();
    }

    public function bootingPackage(): void
    {
        parent::bootingPackage();

        Route::bind('sortedList', function ($value) {
            //TODO
            return DefaultSortedList::make($value);
        });
    }
}
