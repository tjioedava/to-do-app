@extends('layouts.base')

@push('sheets')
    <link rel="stylesheet" href="{{ asset('css/individual/control-panel.css') }}">
@endpush

@section('header-title', 'Show Task: ' . $task->description)

@section('header')
    <x-control-panel/>
@endsection

@section('content')
    <h3>{{ $task->description }}</h3>
    <h4>{{ $task->date }}
    <h4>Category: {{ $task->category ? $task->category : 'None'}}</h4>
    <a href="{{ route('edit', $task->id) }}"><button>Edit</button></a>
@endsection