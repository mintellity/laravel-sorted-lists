<?php

namespace Mintellity\LaravelSortedLists\Observers;

use Mintellity\LaravelSortedLists\Models\SortedListItem;

class SortedListItemObserver
{
    /**
     * Set sequence to max + 1.
     *
     * @param SortedListItem $sortedListItem
     * @return void
     */
    public function creating(SortedListItem $sortedListItem): void
    {
        $maxSequence = SortedListItem::where('list_key', $sortedListItem->list_key)->items()->max('sequence');
        $sortedListItem->sequence = $maxSequence + 1;
    }

    /**
     * Reorder remaining items after deleting an item.
     *
     * @param SortedListItem $sortedListItem
     * @return void
     */
    public function deleted(SortedListItem $sortedListItem): void
    {
        //TODO
        $sortedListItem->list->refreshSequence();
    }
}
