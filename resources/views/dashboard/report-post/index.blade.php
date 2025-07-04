@extends('layout.dashboard')

@section('content')
    @if (session()->has('success'))
        <div class="mb-[16px] w-full text-[0.913rem] text-green-400 bg-green-400/[0.08] p-3 rounded-[3px]"
             role="alert">
            {{ session('success') }}
        </div>
    @elseif(session()->has('failed'))
        <div class="mb-[16px] w-full text-[0.913rem] text-red-400 bg-red-400/[0.08] p-3 rounded-[3px]"
             role="alert">
            {{ session('failed') }}
        </div>
    @endif
    <form method="GET" class="mb-4 flex items-center gap-[8px]">
        <input type="text" id="search" name="search" value="{{ $search }}" placeholder="Cari pengajuan posting..." class="w-full p-3 rounded-black text-[#0d1117] border border-[#0d1117]/[0.12] rounded-[4px]">
    </form>
    <div class="relative overflow-x-auto border border-[#0d1117]/[0.12] rounded-[4px]">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-[0.875rem] text-[#0d1117] bg-[#0d1117]/[0.04] border-b border-[#0d1117]/[0.12]">
            <tr>
                <td class="px-6 py-3 font-medium">
                    Nomor Tiket
                </td>
                <td class="px-6 py-3 font-medium">
                    Pembuat
                </td>
                <td class="px-6 py-3 font-medium">
                    Kategori
                </td>
                <td class="px-6 py-3 font-medium">
                    Judul
                </td>
                <td class="px-6 py-3 font-medium">
                    Status
                </td>
                <td class="px-6 py-3 font-medium">
                    Status Publish
                </td>
                <td class="px-6 py-3 font-medium"></td>
            </tr>
            </thead>
            <tbody>
            @if(count($reportPosts) === 0)
                <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                    <td colspan="7" class="px-6 py-4 text-center">
                        Tidak ada data pengajuan!
                    </td>
                </tr>
            @else
                @foreach($reportPosts as $reportPost)
                    <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                        <td class="px-6 py-4">
                            {{ $reportPost->report->ticket_number }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $reportPost->report->user->username }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $reportPost->report->category->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $reportPost->title }}
                        </td>
                        <td class="px-6 py-4 capitalize">
                            {{ $reportPost->report->status }}
                        </td>
                        <td class="px-6 py-4 capitalize">
                            {{ $reportPost->report->available }}
                        </td>
                        <td class="px-6 py-4 text-right flex items-center gap-[8px]">
                            <a href="{{ route('dashboard.report-post.show', $reportPost) }}" class="font-medium text-blue-600 hover:underline">Detail</a>
                            <a href="{{ route('dashboard.report-post.edit', $reportPost) }}" class="font-medium text-yellow-600 hover:underline">Edit</a>
                            <form action="{{ route('dashboard.report-post.destroy', $reportPost) }}" method="POST">
                                @csrf
                                <button type="submit" class="font-medium text-red-600 hover:underline" onclick="confirm('Apakah anda yakin ingin menghapus pengajuan posting ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection
