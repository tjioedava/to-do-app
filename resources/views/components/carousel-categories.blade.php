<h3>Categories</h3>

<div id="carousel-track"></div>

</div>

<a href="{{ route('index') . '?category=All' }}">All</a>
@foreach ($categories as $category)
    <a href="{{ route('index') . '?category=' . $category->name }}">{{ $category->name }}</a>
@endforeach