@extends('admin.layouts.app', ['pageTitle' => 'Listenverwaltung'])

@section('adminHeaderButton')
    <a href="{{route('admin.sortedLists.createItem', $sortedList->getKey())}}" class="btn btn-primary"><i
            class="fas fa-plus fa-sm text-white-50"></i>
        Listeneintrag
    </a>
@endsection

@section('content')
    <livewire:sorted-lists::items-table :sorted-list="$sortedList">
@endsection
