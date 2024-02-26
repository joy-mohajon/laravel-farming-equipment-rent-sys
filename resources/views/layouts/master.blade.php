<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        @include ('includes.header2')
    </head>

    <body>
        @yield('body')
    </body>

</html>
