{{-- app/views/layout.blade.php --}}

<!DOCTYPE html>
<html lang=”en”>
<head>
    <meta charset="UTF-8" />
    <link
        type="text/css"
        rel="stylesheet"
        href="{{ asset('css/layout.css') }}" />
    <title>
        Tutorial
    </title>
</head>

<body>
    @include('header')
    <div class="content">
        <div class="container">
            @yield('content')
        </div>
    </div>
    @include('footer')
</body>
</html>