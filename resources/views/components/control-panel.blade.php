<?php
    //in-server helper data
    $titles_and_routes = [
        'Home' => route('index'),
        'Add Task' => route('add'),
        'Add Category' => route('add-category'),
        'Edit Category' => route('edit-category'),
        'Delete Category' => route('delete-category'), 
    ];
?>

<div id="control-panel">
    @foreach ($titles_and_routes as $title => $route)
        <!--buttonlike box for each link, with destination (href) embedded in the data-href attr-->
        <div class="no-select" data-href="{{ $route }}" 
        {{ ($selectedButton ?? '') == $title ? 'id=selected' : '' }}>{{ $title }}</div>
        <!--apply selected id to matching button (parameterized from the component caller)-->
    @endforeach
</div>