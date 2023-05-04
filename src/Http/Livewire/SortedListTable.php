<?php

namespace App\Http\Livewire;

use App\Contracts\DefaultSortedList;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class SortedListTable extends Component
{
    public $orderBy = 'name';
    public $orderAsc = true;

    /**
     * @return View
     */
    public function render(): View
    {
        $sortedLists = collect(config('sortable-lists'))
            ->mapWithKeys(fn($listName, $listKey) => [$listKey => DefaultSortedList::make(listKey: $listKey)])
            ->sortBy($this->orderBy, SORT_REGULAR, $this->orderAsc ? 'asc' : 'desc');

        return view('admin.sorted-list.livewire.sorted-list-table', [
            'sortedLists' => $sortedLists
        ]);
    }
}
