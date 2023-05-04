<?php

namespace Mintellity\LaravelSortedLists\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SortedListItemRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string'
        ];
    }
}
