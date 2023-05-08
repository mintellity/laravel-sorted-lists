<?php

namespace Mintellity\LaravelSortedLists\Observers;

use Mintellity\LaravelSortedLists\Models\SortedListItem;

class SortedListItemObserver
{
    /**
     * Set sequence to max + 1.
     */
    public function creating(SortedListItem $sortedListItem): void
    {
        $maxSequence = SortedListItem::where('sorted_list_key', $sortedListItem->sorted_list_key)->max('sequence');
        $sortedListItem->sequence = $maxSequence + 1;
    }

    /**
     * Reorder remaining items after deleting an item.
     */
    public function deleted(SortedListItem $sortedListItem): void
    {
        $sortedListItem->list()->refreshSequence();
    }
}
