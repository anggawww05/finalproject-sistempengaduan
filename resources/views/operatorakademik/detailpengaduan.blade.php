@extends('operatorakademik.main')

@section('content')
    <div class="ml-[270px] w-[1250px] mx-auto mt-8 bg-white rounded-lg shadow p-2">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-[18px] font-semibold mb-2 text-black">Detail Pengaduan</h2>
            <div class="flex justify-between items-center ">
                <a href="{{ route('operatorakademik.listpengaduan') }}"
                    class="inline-flex items-center py-1 px-4 rounded-lg bg-[#141414] hover:bg-[#2B2B2B] text-white text-[16px]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali
                </a>
            </div>
        </div>
        <div class=" bg-white rounded-lg shadow-md p-4  border-1 border-gray-300 flex flex-col gap-1">
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
            <div>
                <form action="#" method="POST" class="mt-4">
                    {{-- @csrf --}}
                    <div class="mb-4">
                        <label for="status" class="block text-gray-700 font-semibold mb-2">Status Pengaduan</label>
                        <select id="status" name="status"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="proses">Proses</option>
                            <option value="selesai">Selesai</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="opsional" class="block text-gray-700 font-semibold mb-2">Kalimat Opsional</label>
                        <input type="text" id="opsional" name="opsional"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan kalimat opsional (jika ada)">
                    </div>
                    <button type="submit"
                        class="py-2 px-6 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold">
                        Update Status
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
