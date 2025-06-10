<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#141414] flex justify-center items-center h-screen flex-col">
    <div class="border-[#343434] border-2 text-white w-full max-w-md p-8 rounded-xl shadow-lg">
        <div class="flex justify-center mb-6">
            <img src="{{ asset('images/full-logo-sipma.png') }}" alt="SIPMA Logo">
        </div>
        <h1 class="text-[30px] font-semibold text-center">Halo, selamat datang!</h1>
        <p class="text-center mb-4">Silahkan lengkapi data untuk pendaftaran akun.</p>
        <form action="{{route('register.store')}}" method="POST" class="flex flex-col gap-2">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium">Nama Pengguna</label>
                <input type="text" id="name" name="name"
                    class="w-full mt-2 p-2 rounded-black text-white border border-gray-600 rounded-2xl focus:border-[#A91D3A]"
                    required>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium">Email</label>
                <input type="email" id="email" name="email"
                    class="w-full mt-2 p-2 rounded-black text-white border border-gray-600 rounded-2xl focus:border-[#A91D3A]"
                    required>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium">Kata Sandi</label>
                <input type="password" id="password" name="password"
                    class="w-full mt-2 p-2 rounded-black text-white border border-gray-600 rounded-2xl focus:border-[#A91D3A]"
                    required>
            </div>
            <div>
                <label for="confirm-password" class="block text-sm font-medium">Konfirmasi Kata Sandi</label>
                <input type="password" id="confirm-password" name="confirm-password"
                    class="w-full mt-2 p-2 rounded-black text-white border border-gray-600 rounded-2xl focus:border-[#A91D3A]"
                    required>
            </div>
            {{-- <div class="flex items-center mb-4">
                <input type="checkbox" id="remember-me" name="remember-me"
                    class="h-4 w-4 text-[#A91D3A] border-gray-600 rounded-md focus:ring-0">
                <label for="remember-me" class="ml-2 text-sm">Ingat aku</label>
            </div> --}}
            <div class="flex justify-between mt-4 mb-4">
                <button type="submit"
                    class="bg-[#A91D3A] hover:bg-[#CA3453] text-white px-6 py-2 rounded-2xl focus:outline-none w-full">Daftar</button>
            </div>
            <p class="text-center text-sm">Sudah memiliki akun?
                <a href="{{route('login')}}" class="text-[#A91D3A] hover:underline">Login disini
                </a>
            </p>
        </form>
    </div>
    {{-- <footer>
        <div class="flex justify-center mt-6">
            <img src="{{ asset('images/footer-auth.png') }}" alt="SIPMA Logo" class="w-screen">
        </div>
    </footer> --}}
</body>

</html>
