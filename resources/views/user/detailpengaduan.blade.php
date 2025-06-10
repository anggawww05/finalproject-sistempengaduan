@extends('user.main')

@section('content')
    <section class="p-6">
        <div class="mt-20 max-w-[1000px] mx-auto flex flex-col gap-3">
            <div class="flex justify-between items-center ">
                <a href="{{ route('pengaduan.page') }}"
                    class="inline-flex items-center py-1 px-4 rounded-lg bg-[#141414] hover:bg-[#2B2B2B] text-white text-[16px]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali
                </a>
            </div>
            <div class=" bg-white rounded-lg shadow-md p-4  border-1 border-gray-300 flex flex-col gap-1">
                <h2 class="text-[20px] font-semibold">Detail Pengaduan</h2>
                <div class="">
                    <img src="{{ asset('images/landing-page.png') }}" alt="Pengaduan Image"
                        class="w-full h-[300px] object-cover rounded-lg ">
                    <div class ="flex justify-between items-center mt-3">
                        <h3 class="text-[20px] font-semibold ">Gedung A Rusak</h3>
                        <p class="text-gray-600 text-sm">01 Januari 2025</p>
                    </div>
                    <p class="text-[16px] text-justify">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam
                        tenetur ipsa inventore totam, possimus, praesentium laudantium quibusdam voluptatibus voluptatum
                        dicta quo porro atque a quidem. Harum doloremque laborum odio blanditiis, ut exercitationem
                        cupiditate vero. Qui consectetur iure repellendus ullam expedita aliquid odit laudantium tempore
                        similique hic, sequi adipisci quasi corporis, commodi illum amet temporibus sed tenetur inventore?
                        Vel dolore ducimus consequuntur magni voluptas non earum debitis minus ut, aperiam omnis explicabo
                        rem esse. At, quo. Quas veritatis neque reiciendis. Omnis quidem, rem sed obcaecati necessitatibus,
                        eligendi earum fugit iusto nisi assumenda illo, natus nulla inventore ipsam quos fuga quae odit.</p>
                    <p class="text-[16px] font-semibold">Kategori: Fasilitas</p>
                </div>
                <div class="mt-6 border-1 p-2 rounded-lg border-gray-300">
                    <h4 class="text-lg font-semibold mb-2">Komentar</h4>
                    <!-- Komentar List -->
                    <div class="flex flex-col gap-4 mb-4">
                        <!-- Komentar Orang Lain -->
                        <div class="flex items-start gap-2">
                            <img src="https://ui-avatars.com/api/?name=Anonymus" alt="avatar" class="w-7 h-7 rounded-full">
                            <div>
                                <span class="text-xs text-gray-500">Anonymus</span>
                                <div class="bg-[#141414] text-white rounded-lg px-4 py-2 mt-1 text-xs max-w-md">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                </div>
                            </div>
                        </div>
                        <!-- Komentar User Sendiri -->
                        <div class="flex items-start justify-end gap-2">
                            <div>
                                <span class="block text-xs text-right text-gray-500">Saya</span>
                                <div class="bg-[#141414] text-white rounded-lg px-4 py-2 mt-1 text-xs max-w-md text-right">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                </div>
                            </div>
                            <img src="https://ui-avatars.com/api/?name=Saya" alt="avatar" class="w-7 h-7 rounded-full">
                        </div>
                    </div>
                    <!-- Form Komentar -->
                    <form class="flex items-center gap-2 mt-2">
                        <input type="text" class="flex-1 border border-gray-300 rounded-lg p-2 text-sm" placeholder="Tulis komentar disini....">
                        <button type="submit" class="bg-[#A91D3A] hover:bg-[#CA3453] text-white rounded-full p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
