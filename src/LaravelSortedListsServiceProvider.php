<?php

namespace Mintellity\LaravelSortedLists;

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Mintellity\LaravelSortedLists\Http\Livewire\SortedListItemsTable;
use Mintellity\LaravelSortedLists\Http\Livewire\SortedListTable;
use Mintellity\LaravelSortedLists\Models\SortedListItem;
use Mintellity\LaravelSortedLists\Observers\SortedListItemObserver;
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

        Livewire::component('sorted-lists::items-table', SortedListItemsTable::class);
        Livewire::component('sorted-lists::lists-table', SortedListTable::class);

        Route::bind('sortedList', function ($value) {
            $sortedList = LaravelSortedLists::getList($value);

            if ($sortedList !== null)
                return $sortedList;

            abort(404);
        });

        SortedListItem::observe(SortedListItemObserver::class);
    }
}
