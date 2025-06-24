@extends('operatorakademik.main')

@section('content')
    <div class="ml-[270px] w-[1250px] mx-auto mt-8 bg-white rounded-lg shadow p-2">
        <h2 class="text-[18px] font-semibold mb-2 text-black">Daftar Permintaan</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-gray-50 border border-gray-200 rounded-lg">
                <thead>
                    <tr>
                        <th class="px-4 py-3 bg-[#141414] text-white text-left font-medium">No</th>
                        <th class="px-4 py-3 bg-[#141414] text-white text-left font-medium">Nama Pengirim</th>
                        <th class="px-4 py-3 bg-[#141414] text-white text-left font-medium">Judul Permintaan</th>
                        <th class="px-4 py-3 bg-[#141414] text-white text-left font-medium">Tanggal</th>
                        <th class="px-4 py-3 bg-[#141414] text-white text-left font-medium">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="px-4 py-2 text-left">#</td>
                        <td class="px-4 py-2 text-left">#</td>
                        <td class="px-4 py-2 text-left">#</td>
                        <td class="px-4 py-2 text-left">#</td>
                        <td class="px-4 py-2 text-left">
                            <a href="{{route('operatorakademik.detailpengaduan')}}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-xs px-3 py-1 rounded transition">Detail</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @endsection
