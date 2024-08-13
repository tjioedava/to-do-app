<x-layout>
    <h1>Add Task</h1>
    <x-navigation/>
    <hr>
    <form method="post" action="{{ route('store') }}">
        <x-form/>
    </form>
</x-layout>