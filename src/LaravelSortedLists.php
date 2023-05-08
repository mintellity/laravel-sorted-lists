<?php

namespace Mintellity\LaravelSortedLists;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Mintellity\LaravelSortedLists\Contracts\SortedList;
use Mintellity\LaravelSortedLists\Http\Controllers\SortedListController;

class LaravelSortedLists
{
    /**
     * Set the routes for the package.
     */
    public static function routes(): void
    {
        Route::controller(SortedListController::class)
            ->prefix('sortedLists')
            ->as('sortedLists.')
            ->group(function () {
                Route::get('/', 'index')->name('index');

                Route::prefix('{sortedList}')
                    ->group(function () {
                        Route::get('view', 'view')->name('view');

                        Route::get('create', 'createItem')->name('createItem');
                        Route::post('store', 'storeItem')->name('storeItem');

                        Route::prefix('{sortedListItem}')
                            ->group(function () {
                                Route::get('edit', 'editItem')->name('editItem');
                                Route::post('update', 'updateItem')->name('updateItem');

                                Route::get('destroy', 'destroyItem')->name('destroyItem');
                            });
                    });
            });
    }

    /**
     * Get a list instance for the given key.
     */
    public static function getList(string $sortedListKey): SortedList|null
    {
        $listClass = collect(config('sorted-lists.lists'))->search($sortedListKey);

        if (! $listClass) {
            return null;
        }

        return $listClass::make();
    }

    /**
     * Get the route with optional prefix.
     */
    public static function getRoute(string $routeName): string
    {
        $prefix = config('sorted-lists.route_prefix');

        if ($prefix && ! Str::endsWith($prefix, '.')) {
            $prefix .= '.';
        }

        return $prefix.$routeName;
    }
}
