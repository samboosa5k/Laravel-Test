<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <title>Laravel - Index Page</title>
</head>

<body>
    <div class="movies-all">
        @yield('content')
    </div>
    <script src="{{ URL::asset('js/app.js')}}"></script>
</body>

</html>
