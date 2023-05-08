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

                Route::get('view/{sortedList}', 'view')->name('view');

                Route::get('createItem/{sortedList}', 'createItem')->name('createItem');
                Route::post('storeItem/{sortedList}', 'storeItem')->name('storeItem');

                Route::get('editItem/{sortedListItem}', 'editItem')->name('editItem');
                Route::post('updateItem/{sortedListItem}', 'updateItem')->name('updateItem');

                Route::get('destroyItem/{sortedListItem}', 'destroyItem')->name('destroyItem');
            });
    }

    /**
     * @param string $sortedListKey
     * @return SortedList|null
     */
    public static function getList(string $sortedListKey): SortedList|null
    {
        $listClass = collect(config('sorted-lists.lists'))->search($sortedListKey);

        if (!$listClass)
            return null;

        return $listClass::make();
    }

    /**
     * Get the route with optional prefix.
     *
     * @param string $routeName
     * @return string
     */
    public static function getRoute(string $routeName): string
    {
        $prefix = config('sorted-lists.route_prefix');

        if ($prefix && !Str::endsWith($prefix, '.'))
            $prefix .= '.';

        return $prefix . $routeName;
    }
}
