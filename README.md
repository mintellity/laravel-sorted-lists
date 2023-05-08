# Sorted lists for Laravel.

Manage sortable lists of e.g. countries, or whatever you need, with this package in your Laravel application.

## Installation

Add this repository to your `composer.json` file:

```json
{
  "repositories": [
    {
      "type": "github",
      "url": "https://github.com/mintellity/laravel-tabbed-sessions.git"
    }
  ]
}
```

Then, you can install the package via composer:

```bash
composer require mintellity/laravel-sorted-lists
```

Publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-sorted-lists-migrations"
php artisan migrate
```

Publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-sorted-lists-config"
```

Publish the views and adapt them to your needs:

```bash
php artisan vendor:publish --tag="laravel-sorted-lists-views"
```

Add the routes to your application, e.g. in your admin routes file:

```php
Route::middleware(['auth', 'verified', 'can:manage-sorted-lists'])
    ->prefix('admin')
    ->as('admin.')
    ->group(function() {
        Mintellity\LaravelSortedLists\LaravelSortedLists::routes();
    });
```

And add the regarding prefix to your `config/sorted-lists.php` file:

```php
'route_prefix' => 'admin',
```

Now you are good to go and can add your sorted lists in the config file.

## Usage

To add a new list, add a new entry to the `lists` array in the `config/sorted-lists.php` file:

```php
    'lists' => [
        TestSortedList::class => 'test',
    ],
```

And add a new class for the list, e.g. `app/SortedLists/TestSortedList.php`:

```php
<?php

namespace App\SortedLists;

use Mintellity\LaravelSortedLists\Contracts\SortedList;

class TestSortedList extends SortedList
{
    public static function getName(): string
    {
        return 'Test';
    }
}
```

The routes for the tables and lists are:
```
GET     {prefix}.index                                  {prefix}/sorted-lists/
GET     {prefix}.{sortedList}.view                      {prefix}/sorted-lists/{sortedList}
GET     {prefix}.{sortedList}.createItem                {prefix}/sorted-lists/{sortedList}/create
POST    {prefix}.{sortedList}.storeItem                 {prefix}/sorted-lists/{sortedList}/store
GET     {prefix}.{sortedList}.{sortedListItem}.edit     {prefix}/sorted-lists/{sortedList}/{sortedListItem}/edit
POST    {prefix}.{sortedList}.{sortedListItem}.update   {prefix}/sorted-lists/{sortedList}/{sortedListItem}/update
GET     {prefix}.{sortedList}.{sortedListItem}.destroy  {prefix}/sorted-lists/{sortedList}/{sortedListItem}/destroy
```

Then aou can access al list items statically as a collection via the `get` or as `Illuminate\Database\Eloquent\Builder` via the `items` method:

```php
$items = TestSortedList::get();

// or
$list = TestSortedList::make();
$items = $list->items()->get();
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Mintellity GmbH](https://github.com/mintellity)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
