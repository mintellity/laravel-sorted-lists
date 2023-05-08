@extends('admin.layouts.app', ['pageTitle' => 'Listenverwaltung'])

@section('content')
    <livewire:sorted-lists::lists-table/>
@endsection
