@extends('layout.dashboard')

@section('content')
    @if(session()->has('failed'))
        <div class="mb-[16px] w-full text-[0.913rem] text-red-400 bg-red-400/[0.08] p-3 rounded-[3px]"
             role="alert">
            {{ session('failed') }}
        </div>
    @endif
    <form action="{{ route('dashboard.report-post.update', $reportPost) }}" method="POST" class="grid lg:grid-cols-2 gap-3 p-4 rounded-[4px] border border-[#0d1117]/[0.12]" enctype="multipart/form-data">
        @csrf
        <div class="lg:col-span-2">
            <label for="image_path" class="block text-sm font-medium">Foto Pengajuan Posting</label>
            <div class="wrapper mt-2 flex items-end gap-[6px]">
                <img src="{{ $reportPost->image_path ? asset($reportPost->image_path) : 'https://placehold.co/400x400?text=Image+Not+Found' }}" alt="Foto Pengajuan Posting" class="w-[100px] aspect-square rounded-[4px] object-cover border border-[#0d1117]/[0.12]">
                <input type="file" name="image_path">
            </div>
        </div>
        <div class="lg:col-span-2">
            <label for="title" class="block text-sm font-medium">Judul</label>
            <input type="text" id="title" name="title" value="{{ $reportPost->title }}" class="w-full mt-2 p-3 rounded-black text-[#0d1117] border border-[#0d1117]/[0.12] rounded-[4px]" required>
        </div>
        <div class="lg:col-span-2">
            <label for="description" class="block text-sm font-medium">Konten</label>
            <textarea id="description" name="description" class="w-full mt-2 p-3 rounded-black text-[#0d1117] border border-[#0d1117]/[0.12] rounded-[4px]" required rows="6">{{ $reportPost->description }}</textarea>
        </div>
        <div class="wrapper lg:col-span-2 flex items-center gap-[6px]">
            <button type="submit" class="cursor-pointer text-nowrap bg-[#A91D3A] hover:bg-[#CA3453] text-white p-3 rounded-[4px] focus:outline-none text-[0.875rem] border w-fit">
                Simpan Perubahan
            </button>
            <a href="{{ route('dashboard.report-post.index') }}" class="bg-transparent hover:bg-[#0d1117]/[0.04] text-[#0d1117] p-3 rounded-[4px] focus:outline-none text-[0.875rem] border border-[#0d1117]/[0.12] hover:border-[#0d1117]/[0.24] w-fit">
                Batal Edit
            </a>
        </div>
    </form>
@endsection
