<?php

namespace Mintellity\LaravelSortedLists\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Mintellity\LaravelSortedLists\Contracts\SortedList;
use Mintellity\LaravelSortedLists\Http\Requests\SortedListItemRequest;
use Mintellity\LaravelSortedLists\LaravelSortedLists;
use Mintellity\LaravelSortedLists\Models\SortedListItem;

class SortedListController extends Controller
{
    /**
     * Handle the redirect after create/edit/destroy of an item.
     */
    public function redirectAfterAction(SortedListItem $sortedListItem): mixed
    {
        return redirect()->route(LaravelSortedLists::getRoute('sortedLists.view'), $sortedListItem->sorted_list_key);
    }

    /**
     * Overview over all lists.
     */
    public function index(): View
    {
        return view('sorted-lists::index');
    }

    /**
     * Show view of sorted list.
     */
    public function view(SortedList $sortedList): View
    {
        return view('sorted-lists::view', [
            'sortedList' => $sortedList,
        ]);
    }

    /**
     * Show form to create item.
     */
    public function createItem(SortedList $sortedList): View
    {
        return view('sorted-lists::item-create', [
            'sortedList' => $sortedList,
        ]);
    }

    /**
     * Store item.
     */
    public function storeItem(SortedList $sortedList, SortedListItemRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['sorted_list_key'] = $sortedList->getKey();
        $sortedListItem = SortedListItem::create($data);

        return $this->redirectAfterAction($sortedListItem);
    }

    /**
     * Show form to edit item.
     */
    public function editItem(SortedList $sortedList, SortedListItem $sortedListItem): View
    {
        return view('sorted-lists::item-edit', [
            'sortedListItem' => $sortedListItem,
        ]);
    }

    /**
     * Update item.
     */
    public function updateItem(SortedList $sortedList, SortedListItem $sortedListItem, SortedListItemRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $sortedListItem->update($data);

        return $this->redirectAfterAction($sortedListItem);
    }

    /**
     * Delete item.
     */
    public function destroyItem(SortedList $sortedList, SortedListItem $sortedListItem): RedirectResponse
    {
        $sortedListItem->delete();

        return $this->redirectAfterAction($sortedListItem);
    }
}
