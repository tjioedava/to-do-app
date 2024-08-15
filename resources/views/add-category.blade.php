@extends('layouts.base')

@section('header-title', 'Add Category')

@section('content')
    <form method="post" action="{{ route('store-category') }}">
        @csrf
        <label for="name">Category Name:</label>
        <input type="text" name="name">
        <button>Add Category</button>
    </form>
@endsection