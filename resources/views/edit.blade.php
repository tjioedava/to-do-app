<x-layout>
    <h1>Edit Task</h1>
    <x-navigation/>
    <hr>
    <form method="post" action="{{ route('update', $task->id) }}">
        @method('PATCH')
        <x-form :task="$task" :categories="$categories"/>
    </form>
</x-layout>
