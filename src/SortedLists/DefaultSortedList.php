<?php

namespace Mintellity\LaravelSortedLists\SortedLists;

use Livewire\Wireable;
use Mintellity\LaravelSortedLists\Contracts\SortedList;
use Mintellity\LaravelSortedLists\Traits\HasSortedListItems;
use Mintellity\LaravelSortedLists\Traits\WireableSortedList;

abstract class DefaultSortedList implements SortedList, Wireable
{
    use HasSortedListItems, WireableSortedList;
}
