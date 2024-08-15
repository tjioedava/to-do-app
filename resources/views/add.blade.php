@extends('layouts.base')

@section('header-title', 'Add Task')

@section('content')
    <form method="post" action="{{ route('store') }}">
        <x-form :categories="$categories"/>
    </form>
@endsection