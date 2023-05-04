<?php

namespace Mintellity\LaravelSortedLists\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Mintellity\LaravelSortedLists\Contracts\SortedList;
use Mintellity\LaravelSortedLists\Http\Requests\SortedListItemRequest;
use Mintellity\LaravelSortedLists\Models\SortedListItem;

class SortedListController extends Controller
{
    //TODO Redirect after create/update/delete

    public function storeItem(SortedList $sortedList, SortedListItemRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['sorted_list_name'] = $sortedList->getKey();
        SortedListItem::create($data);

        return redirect()->route('admin.sorted-list.edit', $sortedList->getKey());
    }

    public function updateItem(SortedListItem $sortedListItem, SortedListItemRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $sortedListItem->update($data);

        return redirect()->route('admin.sorted-list.edit', $sortedListItem->list_key);
    }

    public function destroyItem(SortedListItem $sortedListItem): RedirectResponse
    {
        $sortedListItem->delete();

        return redirect()->route('admin.sorted-list.edit', $sortedListItem->list_key);
    }
}
