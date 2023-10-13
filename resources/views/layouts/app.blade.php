<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.partials.head')
    @yield('head')
</head>
<body class="antialiased">
    <header>
        @include('layouts.partials.header')
        @yield('header')
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        @include('layouts.partials.footer')
        @yield('footer')
    </footer>
</body>
</html>
