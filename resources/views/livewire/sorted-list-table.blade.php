<div>

    <div class="table-responsive">
        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
               id="kt_customers_table">
            <thead>
            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                <th class="min-w-125px">
                    Name
                </th>

                <th class="text-end min-w-70px sorting_disabled"
                    aria-label="Actions">Aktionen
                </th>
            </tr>
            </thead>
            <tbody class="fw-bold text-gray-600">
            @forelse($sortedLists as $sortedList)
                @php
                    /** @var \Mintellity\LaravelSortedLists\Contracts\SortedList $sortedList */
                @endphp
                <tr class="odd">
                    <td>
                        <a href="{{ route(\Mintellity\LaravelSortedLists\LaravelSortedLists::getRoute('sortedLists.view'), $sortedList->getKey()) }}"
                           class="text-gray-800 text-hover-primary mb-1">{{ $sortedList->getName() }}</a>
                    </td>
                    <td class="text-end">
                        <a href="{{ route(\Mintellity\LaravelSortedLists\LaravelSortedLists::getRoute('sortedLists.view'), $sortedList->getKey()) }}"
                           class="btn btn-sm btn-icon btn-light-primary btn-active-light-primary">
                            Bearbeiten
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">keine Daten vorhanden</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
