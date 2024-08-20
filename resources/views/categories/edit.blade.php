@extends('layouts.base')

@section('header-title', 'Edit Category')

@section('content')
    <form>
        <select name="category">
            @foreach ($categories as $category)
                <option value="{{ $category->name }}" {{ $category->name == ($selected_category->name ?? '') ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <button>Select</button>
    </form>

    @if ($selected_category ?? false)
        <hr>
        <form method="post" action="{{ route('update-category') }}">
            @method('PATCH')
            <x-category-form :category="$selected_category"/>
            <input type="hidden" name="old-category-name" value="{{ $selected_category->name }}">
        </form>
    @endif
@endsection