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
@include('components.old.navbar')
<div class="flex flex-1">
    @include('components.old.aside')
    <main class="flex-1 p-4 mt-16">
        @yield('content')
    </main>
</div>
@include('components.old.footer')
</body>

</html>
