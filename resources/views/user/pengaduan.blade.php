@extends('user.main2')

@section('content')
    <section>
        <div class="w-full rounded-xl overflow-hidden border-1 border-gray-300 bg-white">
            <div class="p-6">
                <div class="flex flex-col">
                    <img class="w-full h-48 object-cover rounded-xl" src="{{ asset('images/landing-page.png') }}" alt="Etalase Image">
                    <div class="font-bold text-[20px] mt-2">Postingan Pengaduan</div>
                    <p class="">
                        Selamat datang di etalase pengaduan. Silakan pilih kategori atau buat pengaduan baru sesuai permasalahan anda.
                    </p>
                </div>
                <div class="relative mt-2">
                    <!-- Trigger Button -->
                    <a href="{{route('formulir.akademik.page')}}" class="inline-block text-white bg-[#A91D3A] hover:bg-[#CA3453] py-2 px-4 rounded">Buat Pengaduan</a>
                    {{-- <button id="openModalBtn" class="inline-block text-white bg-[#A91D3A] hover:bg-[#CA3453] py-2 px-4 rounded focus:outline-none">
                        Buat Pengaduan
                    </button> --}}

                    <!-- Modal Background -->
                    {{-- <div>
                        <div id="popupModal" class="fixed inset-0 z-50 items-center justify-center bg-opacity-40 hidden">
                            <!-- Modal Content -->
                            <div class="bg-white rounded-xl p-8 max-w-2xl w-full shadow-lg relative">
                                <h2 class="text-center text-xl font-semibold mb-6">Pilih Kategori Pengaduan</h2>
                                <div class="flex flex-col md:flex-row gap-4 justify-center mb-4">
                                    <!-- Akademik -->
                                    <a href="{{route('formulir.akademik.page')}}" class="flex flex-col items-center border rounded-lg p-4 w-full md:w-40 hover:shadow cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0v6m0 0H6m6 0h6" />
                                        </svg>
                                        <span>Akademik</span>
                                    </a>
                                    <!-- Kemahasiswaan -->
                                    <a href="#" class="flex flex-col items-center border rounded-lg p-4 w-full md:w-40 hover:shadow cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <circle cx="9" cy="7" r="4" stroke="currentColor" stroke-width="2" fill="none"/>
                                            <circle cx="17" cy="7" r="4" stroke="currentColor" stroke-width="2" fill="none"/>
                                            <path d="M2 21v-2a4 4 0 014-4h4a4 4 0 014 4v2" stroke="currentColor" stroke-width="2" fill="none"/>
                                            <path d="M14 21v-2a4 4 0 014-4h0a4 4 0 014 4v2" stroke="currentColor" stroke-width="2" fill="none"/>
                                        </svg>
                                        <span>Kemahasiswaan</span>
                                    </a>

                                    <a href="#" class="flex flex-col items-center border rounded-lg p-4 w-full md:w-40 hover:shadow cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9-9 9 9M4 10v10a1 1 0 001 1h3m10-11v10a1 1 0 01-1 1h-3m-6 0h6" />
                                        </svg>
                                        <span>Fasilitas</span>
                                    </a>
                                    <a href="#" class="flex flex-col items-center border rounded-lg p-4 w-full md:w-40 hover:shadow cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" fill="none"/>
                                            <path d="M8 15l8-8" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                            <text x="12" y="16" text-anchor="middle" font-size="10" fill="currentColor">18</text>
                                        </svg>
                                        <span>Pelecehan</span>
                                    </a>
                                </div>
                                <div class="text-center mt-4">
                                    <a href="#" class="text-blue-600 underline">Klik disini untuk layanan Call Center</a>
                                </div>
                                <!-- Close Button -->
                                <button id="closeModalBtn" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
                            </div>
                        </div>
                    </div> --}}
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const openBtn = document.getElementById('openModalBtn');
                        const closeBtn = document.getElementById('closeModalBtn');
                        const modal = document.getElementById('popupModal');

                        openBtn.addEventListener('click', function () {
                            modal.classList.remove('hidden');
                            modal.classList.add('flex');
                        });

                        closeBtn.addEventListener('click', function () {
                            modal.classList.add('hidden');
                            modal.classList.remove('flex');
                        });

                        // Optional: close modal when clicking outside the modal content
                        modal.addEventListener('click', function (e) {
                            if (e.target === modal) {
                                modal.classList.add('hidden');
                                modal.classList.remove('flex');
                            }
                        });
                    });
                </script>
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
