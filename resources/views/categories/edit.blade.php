@extends('layouts.base')

@section('header-title', 'Edit Category')

@section('content')
    <form>
        <!--choice box with categories as options-->
        <select name="category">

            <!--iterate each category and embed the name on option value and display-->
            @foreach ($categories as $category)
                <option value="{{ $category->name }}" {{ $category->name == ($selected_category->name ?? '') ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <button>Select</button>
    </form>

    <!--run if the previous form has been submitted as get request-->
    @if ($selected_category ?? false)
        <hr>

        <!--show additional form prompting to modify the corresponding category-->
        <form method="post" action="{{ route('update-category') }}">
            @method('PATCH')
            <x-category-form :category="$selected_category"/>

            <!--embed old category name to pass the category reference to route and appropriate controller-->
            <input type="hidden" name="old-category-name" value="{{ $selected_category->name }}">
        </form>
    @endif
@endsection