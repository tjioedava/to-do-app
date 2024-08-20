@extends('layouts.base')

@section('header-title', 'Add Task')

@section('content')
    <form method="post" action="{{ route('store') }}">
        <x-task-form :categories="$categories"/>
    </form>
@endsection