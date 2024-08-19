<?php
    $titles_and_routes = [
        'Home' => route('index'),
        'Add Task' => route('add'),
        'Add Category' => route('add-category'),
        'Delete Category' => route('delete-category'), 
    ];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
        <link rel="stylesheet" href="{{ asset('css/global.css') }}">
        <link rel="stylesheet" href="{{ asset('css/individual/control-panel.css') }}">
        @stack('sheets')

        <script src="https://kit.fontawesome.com/19ef3fcdaf.js" crossorigin="anonymous"></script>
        @stack('head-scripts')
        
        <title>@yield('title', 'To Do App')</title>
    </head>
    <body>
        <header>
            <h1>@yield('header-title', 'To Do Application')</h1>
            
            <div id="control-panel">
                @foreach ($titles_and_routes as $title => $route)
                    <div class="no-select" data-href="{{ $route }}">{{ $title }}</div>
                @endforeach
            </div>
            <hr>
        </header>
        <body>
            @yield('content')
        </body>

        <script>
            const controlPanelBtns = document.querySelectorAll('#control-panel > div');
            controlPanelBtns.forEach(function (button){
                button.addEventListener('click', function (){
                    window.location.href = button.getAttribute('data-href');
                })
            });
        </script>
        @stack('scripts')
    </body>
</html>