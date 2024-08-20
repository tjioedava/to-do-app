@extends('layouts.base')

@push('sheets')
    <link rel="stylesheet" href="{{ asset('css/individual/control-panel.css') }}">
@endpush

@section('header-title', 'Delete Category')

@section('header')
    <!--select / mark the appropriate button-->
    <x-control-panel :selectedButton="'Delete Category'"/>
@endsection

@section('content')
    <form method="post" action="{{ route('destroy-category') }}">
        @csrf

        <!--present available categories to delete-->
        <select name="category">
            @foreach ($categories as $category)
                <option value="{{ $category->name }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <button>Delete</button>
    </form>
@endsection