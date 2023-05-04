<?php

namespace App\Http\Livewire;

use App\Contracts\DefaultSortedList;
use App\Models\SortedListItem;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class SortedListItemsTable extends Component
{
    public DefaultSortedList $sortedList;

    public function mount(DefaultSortedList $sortedList): void
    {
        $this->sortedList = $sortedList;
    }

    public function render(): View
    {
        $listItems = $this->sortedList->items()->get();

        return view('admin.sorted-list.livewire.sorted-list-items-table', [
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
