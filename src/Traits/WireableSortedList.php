<?php

namespace Mintellity\LaravelSortedLists\Traits;

trait WireableSortedList
{
    /**
     * Store this to Livewire component
     *
     * @return string
     */
    public function toLivewire(): string
    {
        return $this->getKey();
    }

    /**
     * Retrieve this from Livewire component
     *
     * @param $value
     * @return static
     */
    public static function fromLivewire($value): static
    {
        return static::make();
    }
}
