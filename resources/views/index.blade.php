<x-layout>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/individual/index.css') }}">
    @endpush

    @push('scripts')
        <script src="https://kit.fontawesome.com/19ef3fcdaf.js" crossorigin="anonymous"></script>
    @endpush

    <h1>To Do App</h1>
    <x-navigation/>
    <hr>
    <h3>Categories</h3>
    @foreach ($categories as $category)
        <a href="{{ route('index') . '?category=' . $category->name }}">{{ $category->name }}</a>
    @endforeach
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
</x-layout>