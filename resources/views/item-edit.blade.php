<form
    action="{{ route(\Mintellity\LaravelSortedLists\LaravelSortedLists::getRoute('sortedLists.updateItem'), $sortedListItem->list(), $sortedListItem) }}"
    method="POST">
    @csrf

    @include('sorted-lists::partials.item-form', ['sortedListItem' => $sortedListItem])

    <div class="d-flex justify-content-end">
        <a href="{{ url()->previous() }}" class="btn btn-color-gray-700 bg-body me-4">Abbrechen</a>
        <button type="submit" class="btn btn-primary">
            Speichern
        </button>
    </div>
</form>
