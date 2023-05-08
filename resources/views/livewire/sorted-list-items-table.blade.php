<div>
    <div class="card card-flush mt-3">
        <div class="card-body pt-0">
            <div id="kt_customers_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                           id="kt_customers_table">
                        <thead>
                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
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
                                    {{ \App\Helpers\DateTimeHelper::getDateTime($listItem->created_at) }}
                                </td>

                                <td class="text-end">
                                    <a href="{{route(\Mintellity\LaravelSortedLists\LaravelSortedLists::getRoute('sortedLists.editItem'), $listItem)}}"
                                       class="btn btn-sm btn-icon btn-light-primary btn-active-light-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <a href="{{route(\Mintellity\LaravelSortedLists\LaravelSortedLists::getRoute('sortedLists.destroyItem'), $listItem)}}"
                                       class="btn btn-sm btn-icon btn-light-danger btn-active-light-primary confirm-destroy">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">keine Daten vorhanden</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
