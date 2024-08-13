<x-layout>
    <h1>Task Details</h1>
    <x-navigation/>
    <hr>
    <h3>{{ $task->description }}</h3>
    <h4>{{ $task->date }}
    <a href="{{ route('edit', $task->id) }}"><button>Edit</button></a>
</x-layout>
