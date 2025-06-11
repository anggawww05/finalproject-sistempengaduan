@extends('user.main')

@section('content')
    <section class="p-6 w-screen h-[600px]">
        <div class="mt-20 max-w-[1000px] mx-auto my-auto flex flex-col gap-3">
            <div class="bg-white rounded-lg shadow-md p-8 border border-gray-300 flex flex-col items-center gap-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-28 w-28 text-black" fill="none" viewBox="0 0 64 64">
                    <circle cx="32" cy="32" r="24" stroke="currentColor" stroke-width="4" fill="none"/>
                    <path d="M32 16v16l12 6" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M48 8a24 24 0 0 1 8 18" stroke="currentColor" stroke-width="4" stroke-dasharray="4 4" fill="none"/>
                    <polygon points="54,7 62,10 55,15" fill="currentColor"/>
                </svg>
                <h1 class="text-2xl font-semibold text-center">Pengaduan berhasil dikirim.</h1>
                <p class="text-center text-gray-700">Admin akan meninjau pengaduan anda selama 1×24 jam.</p>
                <a href="#" class="mt-6 w-full">
                    <button class="w-full bg-[#A3243B] hover:bg-[#871d30] text-white py-2 px-4 rounded-lg font-medium transition-colors">
                        Cek Status
                    </button>
                </a>
            </div>
        </div>
    @endsection
