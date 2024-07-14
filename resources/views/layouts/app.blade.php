<!doctype html>
<html>
<head>
    @include('partials.head')
</head>
<body>
    <div id="main-wrapper">
    @include('partials.nav')
    @yield('content')
    @include('partials.footer')
    </div>
</body>
</html>
