<?php

namespace Mintellity\LaravelSortedLists\Traits;

trait WireableSortedList
{
    /**
     * Store this to Livewire component
     */
    public function toLivewire(): string
    {
        return $this->getKey();
    }

    /**
     * Retrieve this from Livewire component
     */
    public static function fromLivewire($value): static
    {
        return static::make();
    }
}
