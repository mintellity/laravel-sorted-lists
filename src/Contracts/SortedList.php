<?php

namespace Mintellity\LaravelSortedLists\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

interface SortedList
{
    /**
     * Create a new instance of this list.
     * @return static
     */
    public static function make(): static;

    /**
     * Get all items of this list.
     *
     * @return Collection
     */
    public static function get(): Collection;

    /**
     * Get the key of this list.
     *
     * @return string
     */
    public function getKey(): string;

    /**
     * Get the name of this list.
     *
     * @return string
     */
    public function getName(): string;

    /**
     * All items of the list.
     *
     * @return Builder
     */
    public function items(): Builder;

    /**
     * Refresh the sequence of the list, e.g. after deleting an element.
     *
     * @return void
     */
    public function refreshSequence(): void;
}
