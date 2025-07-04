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
                        <a href="#"
                            class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white rounded-lg bg-[#A91D3A] hover:bg-[#CA3453]" >
                            + Buat Pengaduan
                        </a>
                    </div>
                </div>
            </div>
            <div class="absolute w-full h-full bg-gradient-to-t from-[#000000] to-[#000000]/0"></div>
        </div>
    </section>
    <section>
        tentang kami
    </section>
    <section>
        layanan kami
    </section>
    <section>
        grafik
    </section>
@endsection
