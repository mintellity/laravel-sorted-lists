<?php

namespace Mintellity\LaravelSortedLists\Traits;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Mintellity\LaravelSortedLists\Contracts\SortedList;
use Mintellity\LaravelSortedLists\Http\Requests\SortedListItemRequest;
use Mintellity\LaravelSortedLists\Models\SortedListItem;

trait ManagesSortedLists
{
    /**
     * Handle the redirect after create/edit/destroy of an item.
     *
     * @param SortedListItem $sortedListItem
     * @return mixed
     */
    public function redirectAfterAction(SortedListItem $sortedListItem): mixed
    {
        return redirect()->route('sortedLists.view', $sortedListItem->list_key);
    }

    /**
     * Show view of sorted list.
     *
     * @param SortedList $sortedList
     * @return View
     */
    public function view(SortedList $sortedList): View
    {
        return view('admin.sorted-lists.view', [
            'sortedList' => $sortedList
        ]);
    }

    /**
     * Show form to create item.
     *
     * @param SortedList $sortedList
     * @return View
     */
    public function createItem(SortedList $sortedList): View
    {
        return view('admin.sorted-lists.create', [
            'sortedList' => $sortedList
        ]);
    }

    /**
     * @param SortedList $sortedList
     * @param SortedListItemRequest $request
     * @return RedirectResponse
     */
    public function storeItem(SortedList $sortedList, SortedListItemRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['sorted_list_name'] = $sortedList->getKey();
        $sortedListItem = SortedListItem::create($data);

        return $this->redirectAfterAction($sortedListItem);
    }

    /**
     * Show form to edit item.
     *
     * @param SortedListItem $sortedListItem
     * @return View
     */
    public function editItem(SortedListItem $sortedListItem): View
    {
        return view('admin.sorted-lists.edit', [
            'sortedList' => $sortedListItem
        ]);
    }

    /**
     * @param SortedListItem $sortedListItem
     * @param SortedListItemRequest $request
     * @return RedirectResponse
     */
    public function updateItem(SortedListItem $sortedListItem, SortedListItemRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $sortedListItem->update($data);

        return $this->redirectAfterAction($sortedListItem);
    }

    /**
     * @param SortedListItem $sortedListItem
     * @return RedirectResponse
     */
    public function destroyItem(SortedListItem $sortedListItem): RedirectResponse
    {
        $sortedListItem->delete();

        return $this->redirectAfterAction($sortedListItem);
    }
}
