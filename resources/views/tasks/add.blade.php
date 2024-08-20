@extends('layouts.base')

@push('sheets')
    <link rel="stylesheet" href="{{ asset('css/individual/control-panel.css') }}">
@endpush

@section('header-title', 'Add Task')

@section('header')
    <!--select / mark the appropriate button-->
    <x-control-panel :selectedButton="'Add Task'"/>
@endsection

@section('content')
    <form method="post" action="{{ route('store') }}">
        <x-task-form :categories="$categories"/>
    </form>
@endsection