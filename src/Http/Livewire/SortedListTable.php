<?php

namespace Mintellity\LaravelSortedLists\Http\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;
use Mintellity\LaravelSortedLists\LaravelSortedLists;

class SortedListTable extends Component
{
    public function render(): View
    {
        $sortedLists = collect(config('sorted-lists.lists'))
            ->mapWithKeys(fn ($listName, $listKey) => [$listKey => LaravelSortedLists::getList($listName)])
            ->filter();

        return view('sorted-lists::livewire.sorted-list-table', [
            'sortedLists' => $sortedLists,
        ]);
    }
}
