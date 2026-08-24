<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'API Hub')
    </title>

    <style>
        {!! file_get_contents(resource_path('css/app.css')) !!}
    </style>
</head>

<body>

    @yield('content')

    @stack('scripts')

</body>

</html>