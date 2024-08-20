@extends('layouts.base')

@section('header-title', 'Add Category')

@section('content')
    <form method="post" action="{{ route('store-category') }}">
        <x-category-form/>
    </form>
@endsection