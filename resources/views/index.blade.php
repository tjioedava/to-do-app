@extends('layouts.base')

@push('sheets')
    <link rel="stylesheet" href="{{ asset('css/individual/index.css') }}">
@endpush

@section('content')
    <x-carousel-categories :pos="$carousel_pos" :categories="$categories"/>
    <hr>
    @foreach ($tasks as $task)
        <div id="container">
            <div id="left">
                <h3 class="nodes"><a href="{{ route('show', $task->id) }}">{{ $task->description }}</a></h1>
                <h3 class="nodes">{{ $task->date }}</h4>
            </div>
            <div id="right">
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