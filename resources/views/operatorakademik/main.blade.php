<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main</title>
    @vite('resources/css/app.css')
</head>

<body>
<div>
    @include('components.old.asideoperatorakademik')
    @include('components.old.navbaroperator')
    <main>
        @yield('content')
    </main>
</div>
</body>

</html>
