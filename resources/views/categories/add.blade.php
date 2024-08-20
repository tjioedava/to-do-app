@extends('layouts.base')

@push('sheets')
    <link rel="stylesheet" href="{{ asset('css/individual/control-panel.css') }}">
@endpush

@section('header-title', 'Add Category')

@section('header')
    <!--select / mark the appropriate button-->
    <x-control-panel :selectedButton="'Add Category'"/>
@endsection

@section('content')
    <form method="post" action="{{ route('store-category') }}">
        <x-category-form/>
    </form>
@endsection