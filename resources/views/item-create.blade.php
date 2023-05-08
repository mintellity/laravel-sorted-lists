@extends('admin.layouts.app', ['pageTitle' => 'Listenverwaltung'])

@section('content')
    <div class="card card-flush">
        <div class="card-header pt-7">
            <div class="card-title">
                <h2>Listeneintrag hinzufügen</h2>
            </div>
        </div>
        <div class="card-body pt-5">
            <form action="{{ route(\Mintellity\LaravelSortedLists\LaravelSortedLists::getRoute('sortedLists.storeItem'), ['sortedList' => $sortedList->getKey()]) }}"
                  method="POST" class="ajax-form">
                @csrf

                @include('sorted-lists::partials.item-form')

                <div class="separator mb-6"></div>

                <div class="d-flex justify-content-end">
                    <a href="{{ url()->previous() }}" class="btn bg-body btn-color-gray-700 btn-active-primary me-4">Abbrechen</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> Speichern
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
