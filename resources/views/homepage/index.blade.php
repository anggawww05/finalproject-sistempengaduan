@extends('layout.main')

@section('content')
    <section>
        <div class="h-screen bg-center bg-cover flex items-center justify-center text-center"
            style="background-image: url('{{ asset('images/landing-page.png') }}')">
            <div class="relative z-10 flex flex-col items-end w-full pr-12">
                <div class="flex flex-col items-center w-full">
                    <h1 class="text-white text-4xl md:text-5xl lg:text-6xl font-bold mb-2 leading-tight text-center">
                        Sistem Pengaduan<br>
                        <span class="text-6xl md:text-7xl lg:text-8xl font-extrabold block">Mahasiswa</span>
                    </h1>
                    <p class="mb-8 text-[18px] md:text-[20px] font-normal text-white max-w-xl text-center" data-aos="fade-up">
                        SIPMA merupakan sistem pengaduan mahasiswa yang bertujuan untuk membantu mahasiswa dalam mengadukan
                        permasalahan dalam kampus.
                    </p>
                    <div class="flex flex-col mb-8 space-y-4 lg:mb-16 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4"
                        data-aos="fade-up">
                        <a href="{{ route('profile-submission.create')}}"
                            class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white rounded-lg bg-[#A91D3A] hover:bg-[#CA3453]" >
                            + Buat Pengaduan
                        </a>
                    </div>
                </div>
            </div>
            <div class="absolute w-full h-full bg-gradient-to-t from-[#000000] to-[#000000]/0"></div>
        </div>
    </section>
    <section class="px-12 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Tentang Kami -->
            <div>
                <div class="flex items-center mb-2">
                    <span class="italic text-3xl font-semibold mr-2">Tentang</span>
                </div>
                <div class="flex items-center">
                    <span class="text-9xl font-extrabold leading-none">Kami</span>
                </div>
            </div>
            <div class="flex items-center">
                <p class="text-base md:text-lg text-justify">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mt-12">
            <div>
                <p class="text-base md:text-lg text-justify">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
            <div>
                <div class="flex items-center mb-2 justify-end">
                    <span class="italic text-3xl font-semibold mr-2">Tugas</span>
                </div>
                <div class="flex items-center justify-end">
                    <span class="text-9xl font-extrabold leading-none">Kami</span>
                </div>
            </div>
        </div>
    </section>
    <section class="py-16 bg-white">
        <div class="flex flex-col items-center mb-12">
            <span class="italic text-3xl font-semibold mb-2">Layanan</span>
            <span class="text-9xl font-extrabold">Kami</span>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
            <div class="flex flex-col items-center">
                <div class="w-20 h-20 flex items-center justify-center rounded-full border-2 border-black text-2xl font-medium mb-4">
                    1
                </div>
                <p class="text-center text-base">Lorem ipsum dolor sit amet</p>
            </div>
            <div class="flex flex-col items-center">
                <div class="w-20 h-20 flex items-center justify-center rounded-full border-2 border-black text-2xl font-medium mb-4">
                    2
                </div>
                <p class="text-center text-base">Lorem ipsum dolor sit amet</p>
            </div>
            <div class="flex flex-col items-center">
                <div class="w-20 h-20 flex items-center justify-center rounded-full border-2 border-black text-2xl font-medium mb-4">
                    3
                </div>
                <p class="text-center text-base">Lorem ipsum dolor sit amet</p>
            </div>
        </div>
    </section>
@endsection
