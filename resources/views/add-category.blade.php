<x-layout>
    <h1>Add Category</h1>
    <x-navigation/>
    <hr>
    <form method="post" action="{{ route('store-category') }}">
        @csrf
        <label for="name">Category Name:</label>
        <input type="text" name="name">
        <button>Add Category</button>
    </form>
</x-layout>