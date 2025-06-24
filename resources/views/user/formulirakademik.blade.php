@extends('user.main')

@section('content')
    <section class="p-6 w-screen h-full">
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
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                        role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ $error }}</span>
                    </div>
                @endforeach
            @endif
            <form action="{{ route('formulir.akademik.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class=" bg-white rounded-lg shadow-md p-4  border-1 border-gray-300 flex flex-col gap-1 ">
                    <h1 class="flex justify-center text-[20px] font-semibold">Formulir Pengaduan Akademik</h1>
                    <div class="p-6 flex flex-col gap-4">
                        <label for="">Kategori<span class="text-red-500">*</span>
                            <select name="category_id" id="category_id"
                                class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#141414] mt-1">
                                <option value="" disabled selected>Pilih kategori</option>
                                @foreach ($category as $categoryitem)
                                    <option value="{{ $categoryitem->id }}">{{ $categoryitem->category_name }}</option>
                                @endforeach
                            </select>
                        </label>
                        <div class="flex flex-col gap-1">
                            <label for="" class="text-[16px]">Judul <span class="text-red-500">*</span></label>
                            <input type="text" name="title" id="title"
                                class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#141414]">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="" class="text-[16px]">Deskripsi <span class="text-red-500">*</span></label>
                            <textarea name="description" id="description"
                                class="w-full h-48 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#141414]"></textarea>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="" class="text-[16px]">Bukti Foto <span class="text-red-500">*</span></label>
                            <label for="" class="text-[12px] italic">Jika tidak memiliki bukti foto, dapat
                                menggunakan
                                foto dummy.</label>
                            <input type="file" name="photo" id="photo" accept="image/*"
                                class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#141414]">
                        </div>
                        <button
                            class="w-full py-2 px-4 bg-[#141414] text-white rounded-lg hover:bg-[#2B2B2B] transition-colors duration-200"
                            type="submit">
                            Kirim Pengaduan
                        </button>
                        {{-- <a href="{{ route('formulir.akademik.postsubmit.page') }}"
                                class="w-full py-2 px-4 bg-[#141414] text-white rounded-lg hover:bg-[#2B2B2B] transition-colors duration-200">Kirim
                                Pengaduan</a> --}}
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
