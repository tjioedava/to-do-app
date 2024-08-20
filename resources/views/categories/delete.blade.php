@extends('layouts.base')

@section('header-title', 'Delete Category')

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