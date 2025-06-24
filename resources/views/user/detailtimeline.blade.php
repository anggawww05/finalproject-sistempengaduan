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
                <div class="w-full bg-white rounded-xl shadow-md p-6  text-center border border-gray-300">
                    <h2 class="text-xl font-semibold mb-4">Timeline Pengaduan</h2>
                    <div class="bg-black text-white font-bold text-lg py-2 px-4 rounded-md inline-block mb-6">
                        #SIPMA20250505-001
                    </div>
                    <h3 class="font-semibold text-md mb-2">Detail Status</h3>
                    <hr class="border-t border-black w-3/4 mx-auto mb-4">
                    <div class="text-sm space-y-6 text-left">
                        <div>
                            <p class="text-center font-medium">2025-05-05 08:03</p>
                            <p class="text-center font-semibold text-blue-600">Diterima</p>
                            <p class="text-center text-gray-700">
                                Pengaduan telah diverifikasi dan akan segera diproses.
                            </p>
                        </div>
                        <div>
                            <p class="text-center font-medium">2025-05-05 10:12</p>
                            <p class="text-center font-semibold text-yellow-600">Dalam Proses</p>
                            <p class="text-center text-gray-700">
                                Operator sedang menangani pengaduan Anda. Tindakan awal telah dilakukan.
                            </p>
                        </div>
                        <div>
                            <p class="text-center font-medium">2025-05-05 10:12</p>
                            <p class="text-center font-semibold text-yellow-600">Dalam Proses</p>
                            <p class="text-center text-gray-700">
                                Operator sedang menangani pengaduan Anda. Tindakan awal telah dilakukan.
                            </p>
                        </div>
                        <div>
                            <p class="text-center font-medium">2025-05-05 10:12</p>
                            <p class="text-center font-semibold text-yellow-600">Dalam Proses</p>
                            <p class="text-center text-gray-700">
                                Operator sedang menangani pengaduan Anda. Tindakan awal telah dilakukan.
                            </p>
                        </div>
                        <div>
                            <p class="text-center font-medium">2025-05-05 13:30</p>
                            <p class="text-center font-semibold text-green-600">Selesai</p>
                            <p class="text-center text-gray-700">
                                Pengaduan Anda telah diselesaikan oleh Operator Kategori Fasilitas Kampus.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
