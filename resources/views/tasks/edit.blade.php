@extends('layouts.base')

@push('sheets')
    <link rel="stylesheet" href="{{ asset('css/individual/control-panel.css') }}">
@endpush

@section('header-title', 'Edit Category')

@section('header')
    <x-control-panel/>
@endsection

@section('content')
    <form method="post" action="{{ route('update', $task->id) }}">
        @method('PATCH')
        <x-task-form :task="$task" :categories="$categories"/>
    </form>
@endsection