<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css')}}" type='text/css'>
    </head>
    <body>
            @include('_includes/nav/topnav')
            @yield('content')
            <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
