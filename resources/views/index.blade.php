<x-layout>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/individual/index.css') }}">
    @endpush

    <h1>To Do App</h1>
    <x-navigation/>
    <hr>
    @foreach ($tasks as $task)
        <div id="container">
            <div id="left">
                <h3 class="nodes"><a href="{{ route('show', $task->id) }}">{{ $task->description }}</a></h1>
                <h3 class="nodes">{{ $task->date }}</h4>
            </div>
            <div id="right">
                <a class="nodes" href="{{ route('edit', $task->id) }}"><button>Edit</button></a>
                <form class="nodes" method="post" action="{{ route('destroy') }}">
                    @csrf
                    <button name="button" value="{{ $task->id }}">Done</button>
                </form>
            </div>
        </div>
        <hr>
    @endforeach
</x-layout>