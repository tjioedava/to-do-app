<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
        @stack('sheets')
        @stack('head-scripts')
        <title>@yield('title', 'To Do App')</title>
    </head>
    <body>
        <header>
            <h1>@yield('header-title', 'To Do Application')</h1>
            <x-control-panel/>
            <hr>
        </header>
        <body>
            @yield('content')
        </body>
        @stack('scripts')
    </body>
</html>