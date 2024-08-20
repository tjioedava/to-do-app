@extends('layouts.base')

@section('header-title', 'Edit Category')

@section('content')
    <form method="post" action="{{ route('update', $task->id) }}">
        @method('PATCH')
        <x-task-form :task="$task" :categories="$categories"/>
    </form>
@endsection