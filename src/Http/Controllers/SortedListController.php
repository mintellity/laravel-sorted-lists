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
     *
     * @param SortedListItem $sortedListItem
     * @return mixed
     */
    public function redirectAfterAction(SortedListItem $sortedListItem): mixed
    {
        return redirect()->route(LaravelSortedLists::getRoute('sortedLists.view'), $sortedListItem->sorted_list_key);
    }

    /**
     * Overview over all lists.
     *
     * @return View
     */
    public function index(): View
    {
        return view('sorted-lists::index');
    }

    /**
     * Show view of sorted list.
     *
     * @param SortedList $sortedList
     * @return View
     */
    public function view(SortedList $sortedList): View
    {
        return view('sorted-lists::view', [
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
        return view('sorted-lists::item-create', [
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
        $data['sorted_list_key'] = $sortedList->getKey();
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
        return view('sorted-lists::item-edit', [
            'sortedListItem' => $sortedListItem
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
