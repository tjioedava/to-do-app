<x-layout>
    <h1>Edit Task</h1>
    <x-navigation/>
    <hr>
    <form method="post" action="{{ route('update', $task->id) }}">
        @csrf
        @method('PATCH')
        <x-form :task="$task"/>
    </form>
</x-layout>
