@extends('layouts.base')

@push('sheets')
    <link rel="stylesheet" href="{{ asset('css/individual/index.css') }}">
@endpush

@section('content')
    <x-carousel-categories :pos="$carousel_pos" :categories="$categories"/>
    <hr>

    <!--displaying section for each task-->
    @foreach ($tasks as $task)
        <div id="container">
            <div id="non-controls-container">
                <div id="description-container">
                    <h3 class="nodes"><a href="{{ route('show', $task->id) }}">{{ $task->description }}</a></h1>
                </div>
                <div id="date-container">
                    <h3 class="nodes">{{ $task->date }}</h3>    
                </div>
                <div id="category-container">
                    <h3 class="nodes">{{ $task->category }}</h3>
                </div>
            </div>
            <div id="controls-container">
                <a class="nodes" href="{{ route('edit', $task->id) }}">
                    <button><i class="fa-solid fa-pencil fa-lg"></i></button>
                </a>
                <form class="nodes" method="post" action="{{ route('destroy') }}">
                    @csrf
                    <button name="button" value="{{ $task->id }}"><i class="fa-solid fa-check fa-2xl"></i></button>
                </form>
            </div>
        </div>
        <hr>
    @endforeach
@endsection