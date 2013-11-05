{{-- app/views/layout.blade.php --}}

<!DOCTYPE html>
<html lang=”en”>
<head>
    @section('head')
    <meta charset="UTF-8" />
    <link
        type="text/css"
        rel="stylesheet"
        href="{{ asset('style.css') }}" />
    @show
    <title>
        {{-- Title Code --}}
        @yield('title')
    </title>
</head>

<body>
    @include('header')

    <div class="content">
        <div class="container">
            @yield('content')
        </div>
    </div>
</body>
</html>