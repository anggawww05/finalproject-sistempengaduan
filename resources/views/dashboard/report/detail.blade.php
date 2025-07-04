@extends('layout.dashboard')

@section('content')
    <form class="grid lg:grid-cols-2 gap-3 p-4 rounded-[4px] border border-[#0d1117]/[0.12]">
        <div class="lg:col-span-2">
            <label for="image_path" class="block text-sm font-medium">Foto Pengajuan</label>
            <div class="wrapper mt-2">
                <img src="{{ $report->image_path ? asset($report->image_path) : 'https://placehold.co/400x400?text=Image+Not+Found' }}" alt="Foto Pengajuan" class="w-[100px] aspect-square rounded-[4px] object-cover border border-[#0d1117]/[0.12]">
            </div>
        </div>
        <div class="lg:col-span-2">
            <label for="title" class="block text-sm font-medium">Judul</label>
            <input type="text" id="title" name="title" value="{{ $report->title }}" class="w-full mt-2 p-3 rounded-black text-[#0d1117] border border-[#0d1117]/[0.12] rounded-[4px]" readonly>
        </div>
        <div>
            <label for="username" class="block text-sm font-medium">Username</label>
            <input type="text" id="username" name="username" value="{{ $report->user->username }}" class="w-full mt-2 p-3 rounded-black text-[#0d1117] border border-[#0d1117]/[0.12] rounded-[4px]" readonly>
        </div>
        <div>
            <label for="name" class="block text-sm font-medium">Kategori</label>
            <input type="text" id="name" name="name" value="{{ $report->category->name }}" class="w-full mt-2 p-3 rounded-black text-[#0d1117] border border-[#0d1117]/[0.12] rounded-[4px]" readonly>
        </div>
        <div>
            <label for="status" class="block text-sm font-medium">Status</label>
            <input type="text" id="status" name="status" value="{{ $report->status }}" class="capitalize w-full mt-2 p-3 rounded-black text-[#0d1117] border border-[#0d1117]/[0.12] rounded-[4px]" readonly>
        </div>
        <div>
            <label for="available" class="block text-sm font-medium">Status Publish</label>
            <input type="text" id="available" name="available" value="{{ $report->available }}" class="capitalize w-full mt-2 p-3 rounded-black text-[#0d1117] border border-[#0d1117]/[0.12] rounded-[4px]" readonly>
        </div>
        <div class="lg:col-span-2">
            <label for="description" class="block text-sm font-medium">Konten</label>
            <textarea id="description" name="description" class="w-full mt-2 p-3 rounded-black text-[#0d1117] border border-[#0d1117]/[0.12] rounded-[4px]" readonly rows="6">{{ $report->description }}</textarea>
        </div>
        <a href="{{ route('dashboard.report.index') }}" class="lg:col-span-2 bg-transparent hover:bg-[#0d1117]/[0.04] text-[#0d1117] p-3 rounded-[4px] focus:outline-none text-[0.875rem] border border-[#0d1117]/[0.12] hover:border-[#0d1117]/[0.24] w-fit">
            Kembali ke Halaman Pengajuan
        </a>
    </form>
@endsection
