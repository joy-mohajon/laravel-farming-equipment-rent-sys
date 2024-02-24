<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        @include ('includes.header')
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            {{-- @include ('includes.navbar')
            @include ('includes.sidebar') --}}

            @yield('content')

            {{-- @include ('includes.footer') --}}
        </div>
        @include ('includes.scripts')
    </body>

</html>
