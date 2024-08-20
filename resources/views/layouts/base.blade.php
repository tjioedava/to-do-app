<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
        <link rel="stylesheet" href="{{ asset('css/global.css') }}">

        <!--for inserting additional stylesheet from child files-->
        @stack('sheets')

        <script src="https://kit.fontawesome.com/19ef3fcdaf.js" crossorigin="anonymous"></script>

        <!--for inserting additional head scripts from child files-->
        @stack('head-scripts')
        
        <!--modify the title from child files or default-->
        <title>@yield('title', 'To Do App')</title>
    </head>
    <body>
        <header>
            <!--modify the header title from child files or default-->
            <h1>@yield('header-title', 'To Do Application')</h1>

             <!--pushed header from child files-->
            @yield('header')
        
            <hr>
        </header>
        <body>
            <!--display session status or error if any-->
            <x-status-display/>
            <x-errors/>

            <!--pushed content from child files-->
            @yield('content')
        </body>

        <script>
            const controlPanelBtns = document.querySelectorAll('#control-panel > div');
            controlPanelBtns.forEach(function (button){

                //bind each buttonlike box to access certain link whenever clicked
                button.addEventListener('click', function (){
                    window.location.href = button.getAttribute('data-href');
                })
            });
        </script>
        @stack('scripts')
    </body>
</html>