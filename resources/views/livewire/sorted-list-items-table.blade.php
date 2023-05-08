<div>
    <div class="table-responsive">
        <table class="table align-middle table-row-dashed fs-6 gy-5">
            <thead>
            <tr class="text-start text-gray-400 fw-bolder text-uppercase fs-7 gs-0">
                <th class="w-10px pe-2">#</th>
                <th class="min-w-125px">Name</th>
                <th class="min-w-125px">Erstellt am</th>
                <th class="text-end min-w-70px">Aktionen</th>
            </tr>
            </thead>
            <tbody class="fw-bold text-gray-600" wire:sortable="updateSequence">
            @forelse($listItems as $key => $listItem)
                <tr class="odd"
                    wire:sortable.item="{{ $listItem->getKey() }}"
                    wire:key="user-{{ $listItem->getKey() }}">
                    <td>
                        {{ $listItem->sequence }}.
                    </td>

                    <td>
                        {{ $listItem->name }}
                    </td>

                    <td>
                        {{ $listItem->created_at->format('d.m.Y H:i') }}
                    </td>

                    <td class="text-end">
                        <a href="{{route(\Mintellity\LaravelSortedLists\LaravelSortedLists::getRoute('sortedLists.editItem'), $listItem)}}"
                           class="btn btn-sm btn-icon btn-light-primary btn-active-light-primary">
                            Bearbeiten
                        </a>

                        <a href="{{route(\Mintellity\LaravelSortedLists\LaravelSortedLists::getRoute('sortedLists.destroyItem'), $listItem)}}"
                           class="btn btn-sm btn-icon btn-light-danger btn-active-light-primary">
                            Löschen
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">keine Daten vorhanden</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
