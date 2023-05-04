<?php

namespace Mintellity\LaravelSortedLists;

use Illuminate\Support\Facades\Route;

class LaravelSortedLists
{
    /**
     * Set the routes for the package.
     *
     * @return void
     */
    public static function routes(): void
    {
        Route::prefix('sortedLists')->as('sortedLists.')->group(function () {
            Route::get('/view/{sortedList}', 'view')->name('view');

            Route::get('/createItem/{sortedList}', 'createItem')->name('createItem');
            Route::post('/storeItem/{sortedList}', 'storeItem')->name('storeItem');

            Route::get('/editItem/{sortedListItem}', 'editItem')->name('editItem');
            Route::post('/updateItem/{sortedListItem}', 'updateItem')->name('updateItem');

            Route::get('/destroyItem/{sortedListItem}', 'destroyItem')->name('destroyItem');
        });
    }
}
