<?php

namespace Mintellity\LaravelSortedLists\Http\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;
use Mintellity\LaravelSortedLists\Contracts\SortedList;
use Mintellity\LaravelSortedLists\Models\SortedListItem;

class SortedListItemsTable extends Component
{
    public SortedList $sortedList;

    public function mount(SortedList $sortedList): void
    {
        $this->sortedList = $sortedList;
    }

    public function render(): View
    {
        $listItems = $this->sortedList->items()->get();

        return view('sorted-lists::livewire.sorted-list-items-table', [
            'listItems' => $listItems,
        ]);
    }

    public function updateSequence($list): void
    {
        foreach ($list as $item) {
            SortedListItem::find($item['value'])->update(['sequence' => $item['order']]);
        }
    }
}
