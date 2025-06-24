@extends('user.main')

@section('content')
    <section class="p-6">
        <div class="flex items-center justify-center min-h-screen bg-gray-100">
            <div class="bg-white rounded-lg shadow-lg p-6 w-[340px] text-center">
                <h2 class="text-lg font-semibold mb-4 border-b border-black inline-block pb-1">
                    Lacak Nomor Pengaduan Anda
                </h2>

                <div class="relative mt-4">
                    <span class="absolute left-3 top-2.5 text-gray-400">
                        🔍
                    </span>
                    <input type="text" placeholder="Ketik nomor tiket"
                        class="pl-10 pr-4 py-2 rounded-md w-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black text-sm" />
                </div>
                <button class="mt-4 bg-black text-white w-full py-2 rounded-md hover:bg-gray-800 transition">
                    Cek
                </button>
            </div>
        </div>
    </section>
@endsection
