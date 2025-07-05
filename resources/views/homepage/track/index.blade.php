@extends('layout.main')

@section('content')
    <section class="p-6 pt-40 w-full min-h-screen">
        <div class="flex flex-col items-center gap-4">
            <div class="bg-white rounded-lg shadow-lg p-6 w-[340px] text-center">
                <h2 class="text-lg font-semibold mb-4 border-b border-black inline-block pb-1">
                    Lacak Nomor Pengaduan Anda
                </h2>
                <form method="GET">
                    <div class="relative mt-4">
                        <span class="absolute left-3 top-2.5 text-gray-400">
                            🔍
                        </span>
                        <input type="text" name="search" placeholder="Ketik nomor tiket"
                            class="pl-10 pr-4 py-2 rounded-md w-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black text-sm" />
                    </div>
                    <button type="submit" class="mt-4 bg-black text-white w-full py-2 rounded-md hover:bg-gray-800 transition">
                        Cek
                    </button>
                </form>
            </div>
            @if(!is_null($submissions))
                <div class="bg-white rounded-lg shadow-lg p-6 w-[340px] text-center">
                    <h6>Hasil Pencarian</h6>
                    <div class="wrapper grid grid-cols-1 gap-[12px] mt-4">
                        @foreach($submissions as $submission)
                            <div class="wrapper pb-[12px] border-b border-black/[0.12] flex flex-col gap-1">
                                <div class="wrapper flex items-center justify-between gap-[12px] w-full">
                                    <p class="text-[0.913rem] text-red-500">{{ $submission->ticket_number }}</p>
                                    <p class="text-[0.913rem] text-black/[0.62]">{{ \Carbon\Carbon::parse($submission->created_at)->translatedFormat('j F Y - H:i') }}</p>
                                </div>
                                <div class="wrapper flex items-center justify-between gap-[12px] w-full">
                                    <p class="text-[0.913rem] text-black/[0.62]">{{ $submission->title }}</p>
                                    <a href="{{ route('track.show', $submission->id) }}" class="text-[0.913rem] text-blue-500 hover:underline">Lihat Timeline</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
