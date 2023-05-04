<?php

namespace Mintellity\LaravelSortedLists\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Mintellity\LaravelSortedLists\Models\SortedListItem;

trait HasSortedListItems
{
    public function __construct(
        public readonly string $listKey,
        public readonly string $listName
    )
    {
    }

    /**
     * Get all list items.
     *
     * @return Collection
     */
    public static function get(): Collection
    {
        return static::make()->items()->get();
    }

    /**
     * Get the key of this list.
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->listKey;
    }

    /**
     * Get the name of this list.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->listName;
    }

    /**
     * All items of the list.
     *
     * @return Builder
     */
    public function items(): Builder
    {
        return SortedListItem::query()->where('sorted_list_name', $this->getKey())->orderBy('sequence');
    }

    /**
     * Refresh the sequence of the list, e.g. after deleting an element.
     *
     * @return void
     */
    public function refreshSequence(): void
    {
        $items = $this->items()->orderBy('sequence')->get();
        $sequence = 1;

        foreach ($items as $item) {
            $item->update(['sequence' => $sequence]);
            $sequence++;
        }
    }
}
