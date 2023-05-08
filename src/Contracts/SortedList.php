<?php

namespace Mintellity\LaravelSortedLists\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Wireable;
use Mintellity\LaravelSortedLists\LaravelSortedLists;
use Mintellity\LaravelSortedLists\Models\SortedListItem;

abstract class SortedList implements Wireable
{
    private function __construct(
        private string $key
    )
    {
    }

    /**
     * Get the display name of this list.
     *
     * @return string
     */
    abstract public static function getName(): string;

    /**
     * Get the key of this list.
     *
     * @return string
     */
    public static function getKey(): string
    {
        return config('sorted-lists.lists.' . static::class);
    }

    /**
     * Create a new instance of this list.
     *
     * @return static
     */
    public static function make(): static
    {
        return new static(self::getKey());
    }

    /**
     * Get all items of this list.
     *
     * @return Collection
     */
    public static function get(): Collection
    {
        return static::make()->items()->get();
    }

    /**
     * All items of the list.
     *
     * @return Builder
     */
    public function items(): Builder
    {
        return SortedListItem::query()->where('sorted_list_key', $this->key)->orderBy('sequence');
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

    /**
     * Store this to Livewire component
     *
     * @return string
     */
    public function toLivewire(): string
    {
        return $this->key;
    }

    /**
     * Retrieve this from Livewire component
     *
     * @param $value
     * @return static
     */
    public static function fromLivewire($value): static
    {
        return LaravelSortedLists::getList($value);
    }
}
