<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} | Sistem Pengaduan Mahasiswa</title>

    {{-- STYLE CSS --}}
    @vite('resources/css/app.css')
    {{-- END STYLE CSS --}}
</head>
<body>
@include('components.sidebar')
<main class="content ms-[280px]">
    @include('components.topbar')
    <div class="content p-4">
        @yield('content')
    </div>
</main>

{{-- SCRIPT JS --}}
<script src="https://kit.fontawesome.com/e5ccf98c71.js" crossorigin="anonymous"></script>
{{-- END SCRIPT JS --}}
</body>
</html>
