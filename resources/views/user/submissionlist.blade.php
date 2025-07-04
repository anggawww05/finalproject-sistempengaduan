@extends('user.main')

@section('content')
    <div class="w-screen h-full bg-[#F5F5F5] p-30">
        <h1 class="text-[20px] font-semibold text-center mb-8">Daftar Pengajuan</h1>
        <div class="mb-8 flex justify-center">
            <form action="#" method="GET" class="flex items-center">
                <input type="text" name="search" value="Cari pengaduan disini..." placeholder="Cari pengaduan..."
                    class="w-96 px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-[#A91D3A]">
                <button type="submit" class="px-4 py-2 bg-[#A91D3A] text-white rounded-r-lg hover:bg-[#CA3453] transition">
                    Cari
                </button>
            </form>
        </div>
        <div class="grid grid-cols-4 gap-6 ">
            <!-- Card Etalase 1 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
                <img class="w-full h-40 object-cover" src="{{ asset('images/landing-page.png') }}" alt="Kategori 1">
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-2">Gedung A Rusak</h3>
                    <p class="text-gray-600 text-sm mb-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo
                        animi
                        dicta quo, maiores repellendus eveniet facilis quibusdam.</p>
                    <a href="{{ route('detail.pengaduan.page') }}"
                        class="inline-block text-white bg-[#A91D3A] hover:bg-[#CA3453] py-2 px-4 rounded">Lihat
                        Pengaduan</a>
                </div>
            </div>
            <!-- Card Etalase 2 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
                <img class="w-full h-40 object-cover" src="{{ asset('images/landing-page.png') }}" alt="Kategori 2">
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-2">Waspada Pelecehan!</h3>
                    <p class="text-gray-600 text-sm mb-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo
                        animi
                        dicta quo, maiores repellendus eveniet facilis quibusdam.</p>
                    <a href="#"
                        class="inline-block text-white bg-[#A91D3A] hover:bg-[#CA3453] py-2 px-4 rounded">Lihat
                        Pengaduan</a>
                </div>
            </div>
            <!-- Card Etalase 3 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
                <img class="w-full h-40 object-cover" src="{{ asset('images/landing-page.png') }}" alt="Kategori 3">
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-2">Jalan Rusak</h3>
                    <p class="text-gray-600 text-sm mb-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo
                        animi
                        dicta quo, maiores repellendus eveniet facilis quibusdam.</p>
                    <a href="#"
                        class="inline-block text-white bg-[#A91D3A] hover:bg-[#CA3453] py-2 px-4 rounded">Lihat
                        Pengaduan</a>
                </div>
            </div>
            <!-- Card Etalase 4 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
                <img class="w-full h-40 object-cover" src="{{ asset('images/landing-page.png') }}" alt="Kategori 3">
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-2">Helem Hilang!</h3>
                    <p class="text-gray-600 text-sm mb-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo
                        animi
                        dicta quo, maiores repellendus eveniet facilis quibusdam.</p>
                    <a href="#"
                        class="inline-block text-white bg-[#A91D3A] hover:bg-[#CA3453] py-2 px-4 rounded">Lihat
                        Pengaduan</a>
                </div>
            </div>
            <!-- Card Etalase 1 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
                <img class="w-full h-40 object-cover" src="{{ asset('images/landing-page.png') }}" alt="Kategori 1">
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-2">Gedung A Rusak</h3>
                    <p class="text-gray-600 text-sm mb-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo
                        animi
                        dicta quo, maiores repellendus eveniet facilis quibusdam.</p>
                    <a href="#"
                        class="inline-block text-white bg-[#A91D3A] hover:bg-[#CA3453] py-2 px-4 rounded">Lihat
                        Pengaduan</a>
                </div>
            </div>
            <!-- Card Etalase 2 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
                <img class="w-full h-40 object-cover" src="{{ asset('images/landing-page.png') }}" alt="Kategori 2">
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-2">Waspada Pelecehan!</h3>
                    <p class="text-gray-600 text-sm mb-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo
                        animi
                        dicta quo, maiores repellendus eveniet facilis quibusdam.</p>
                    <a href="#"
                        class="inline-block text-white bg-[#A91D3A] hover:bg-[#CA3453] py-2 px-4 rounded">Lihat
                        Pengaduan</a>
                </div>
            </div>
            <!-- Card Etalase 3 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
                <img class="w-full h-40 object-cover" src="{{ asset('images/landing-page.png') }}" alt="Kategori 3">
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-2">Jalan Rusak</h3>
                    <p class="text-gray-600 text-sm mb-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo
                        animi
                        dicta quo, maiores repellendus eveniet facilis quibusdam.</p>
                    <a href="#"
                        class="inline-block text-white bg-[#A91D3A] hover:bg-[#CA3453] py-2 px-4 rounded">Lihat
                        Pengaduan</a>
                </div>
            </div>
            <!-- Card Etalase 4 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
                <img class="w-full h-40 object-cover" src="{{ asset('images/landing-page.png') }}" alt="Kategori 3">
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-2">Helem Hilang!</h3>
                    <p class="text-gray-600 text-sm mb-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo
                        animi
                        dicta quo, maiores repellendus eveniet facilis quibusdam.</p>
                    <a href="#"
                        class="inline-block text-white bg-[#A91D3A] hover:bg-[#CA3453] py-2 px-4 rounded">Lihat
                        Pengaduan</a>
                </div>
            </div>
        </div>
    </div>
@endsection
