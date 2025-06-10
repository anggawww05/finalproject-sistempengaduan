@extends('user.main2')

@section('content')
    <section class="">
        <div class="w-full rounded-xl overflow-hidden border-1 border-gray-300 bg-white">
            <div class="p-6">
                <div class="flex flex-col">
                    <img class="w-full h-48 object-cover rounded-xl" src="{{ asset('images/landing-page.png') }}" alt="Etalase Image">
                    <div class="font-bold text-[20px] mt-2">Postingan Pengaduan</div>
                    <p class="">
                        Selamat datang di etalase pengaduan. Silakan pilih kategori atau buat pengaduan baru sesuai permasalahan anda.
                    </p>
                </div>
                <a href="#" class="mt-2 inline-block text-white bg-[#A91D3A] hover:bg-[#CA3453] py-2 px-4 rounded">
                    Buat Pengaduan
                </a>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">
            <!-- Card Etalase 1 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
                <img class="w-full h-40 object-cover" src="{{ asset('images/landing-page.png') }}" alt="Kategori 1">
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-2">Gedung A Rusak</h3>
                    <p class="text-gray-600 text-sm mb-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo animi dicta quo, maiores repellendus eveniet facilis quibusdam.</p>
                    <a href="{{route('detail.pengaduan.page')}}" class="inline-block text-white bg-[#A91D3A] hover:bg-[#CA3453] py-2 px-4 rounded">Lihat Pengaduan</a>
                </div>
            </div>
            <!-- Card Etalase 2 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
                <img class="w-full h-40 object-cover" src="{{ asset('images/landing-page.png') }}" alt="Kategori 2">
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-2">Waspada Pelecehan!</h3>
                    <p class="text-gray-600 text-sm mb-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo animi dicta quo, maiores repellendus eveniet facilis quibusdam.</p>
                    <a href="#" class="inline-block text-white bg-[#A91D3A] hover:bg-[#CA3453] py-2 px-4 rounded">Lihat Pengaduan</a>
                </div>
            </div>
            <!-- Card Etalase 3 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
                <img class="w-full h-40 object-cover" src="{{ asset('images/landing-page.png') }}" alt="Kategori 3">
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-2">Jalan Rusak</h3>
                    <p class="text-gray-600 text-sm mb-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo animi dicta quo, maiores repellendus eveniet facilis quibusdam.</p>
                    <a href="#" class="inline-block text-white bg-[#A91D3A] hover:bg-[#CA3453] py-2 px-4 rounded">Lihat Pengaduan</a>
                </div>
            </div>
            <!-- Card Etalase 4 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
                <img class="w-full h-40 object-cover" src="{{ asset('images/landing-page.png') }}" alt="Kategori 3">
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-2">Helem Hilang!</h3>
                    <p class="text-gray-600 text-sm mb-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo animi dicta quo, maiores repellendus eveniet facilis quibusdam.</p>
                    <a href="#" class="inline-block text-white bg-[#A91D3A] hover:bg-[#CA3453] py-2 px-4 rounded">Lihat Pengaduan</a>
                </div>
            </div>
            <!-- Card Etalase 1 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
                <img class="w-full h-40 object-cover" src="{{ asset('images/landing-page.png') }}" alt="Kategori 1">
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-2">Gedung A Rusak</h3>
                    <p class="text-gray-600 text-sm mb-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo animi dicta quo, maiores repellendus eveniet facilis quibusdam.</p>
                    <a href="#" class="inline-block text-white bg-[#A91D3A] hover:bg-[#CA3453] py-2 px-4 rounded">Lihat Pengaduan</a>
                </div>
            </div>
            <!-- Card Etalase 2 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
                <img class="w-full h-40 object-cover" src="{{ asset('images/landing-page.png') }}" alt="Kategori 2">
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-2">Waspada Pelecehan!</h3>
                    <p class="text-gray-600 text-sm mb-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo animi dicta quo, maiores repellendus eveniet facilis quibusdam.</p>
                    <a href="#" class="inline-block text-white bg-[#A91D3A] hover:bg-[#CA3453] py-2 px-4 rounded">Lihat Pengaduan</a>
                </div>
            </div>
            <!-- Card Etalase 3 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
                <img class="w-full h-40 object-cover" src="{{ asset('images/landing-page.png') }}" alt="Kategori 3">
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-2">Jalan Rusak</h3>
                    <p class="text-gray-600 text-sm mb-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo animi dicta quo, maiores repellendus eveniet facilis quibusdam.</p>
                    <a href="#" class="inline-block text-white bg-[#A91D3A] hover:bg-[#CA3453] py-2 px-4 rounded">Lihat Pengaduan</a>
                </div>
            </div>
            <!-- Card Etalase 4 -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
                <img class="w-full h-40 object-cover" src="{{ asset('images/landing-page.png') }}" alt="Kategori 3">
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-2">Helem Hilang!</h3>
                    <p class="text-gray-600 text-sm mb-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo animi dicta quo, maiores repellendus eveniet facilis quibusdam.</p>
                    <a href="#" class="inline-block text-white bg-[#A91D3A] hover:bg-[#CA3453] py-2 px-4 rounded">Lihat Pengaduan</a>
                </div>
            </div>
        </div>
    </section>
@endsection
