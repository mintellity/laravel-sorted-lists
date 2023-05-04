<?php

namespace Mintellity\LaravelSortedLists\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

interface SortedList
{
    /**
     * Create a new instance of this list.
     */
    public static function make(): static;

    /**
     * Get all items of this list.
     */
    public static function get(): Collection;

    /**
     * Get the key of this list.
     */
    public function getKey(): string;

    /**
     * Get the name of this list.
     */
    public function getName(): string;

    /**
     * All items of the list.
     */
    public function items(): Builder;

    /**
     * Refresh the sequence of the list, e.g. after deleting an element.
     */
    public function refreshSequence(): void;
}
