@extends('layout.dashboard')

@section('content')
    @if(session()->has('failed'))
        <div class="mb-[16px] w-full text-[0.913rem] text-red-400 bg-red-400/[0.08] p-3 rounded-[3px]"
             role="alert">
            {{ session('failed') }}
        </div>
    @endif
    <form action="{{ route('dashboard.student.update', $student) }}" method="POST" class="grid lg:grid-cols-2 gap-3 p-4 rounded-[4px] border border-[#0d1117]/[0.12]" enctype="multipart/form-data">
        @csrf
        <div class="lg:col-span-2">
            <label for="image_path" class="block text-sm font-medium">Foto Siswa</label>
            <div class="wrapper mt-2 flex items-end gap-[6px]">
                <img src="{{ $student->image_path ? asset($student->image_path) : 'https://placehold.co/400x400?text=Image+Not+Found' }}" alt="Foto Siswa" class="w-[100px] aspect-square rounded-[4px] object-cover border border-[#0d1117]/[0.12]">
                <input type="file" name="image_path">
            </div>
        </div>
        <div>
            <label for="username" class="block text-sm font-medium">Username</label>
            <input type="text" id="username" name="username" value="{{ $student->user->username }}" class="w-full mt-2 p-3 rounded-black text-[#0d1117] border border-[#0d1117]/[0.12] rounded-[4px]" required>
        </div>
        <div>
            <label for="full_name" class="block text-sm font-medium">Nama Lengkap</label>
            <input type="text" id="full_name" name="full_name" value="{{ $student->full_name }}" class="w-full mt-2 p-3 rounded-black text-[#0d1117] border border-[#0d1117]/[0.12] rounded-[4px]" required>
        </div>
        <div>
            <label for="phone_number" class="block text-sm font-medium">Nomor Telepon</label>
            <input type="text" id="phone_number" name="phone_number" value="{{ $student->phone_number }}" class="w-full mt-2 p-3 rounded-black text-[#0d1117] border border-[#0d1117]/[0.12] rounded-[4px]" required>
        </div>
        <div>
            <label for="study_program" class="block text-sm font-medium">Prodi</label>
            <input type="text" id="study_program" name="study_program" value="{{ $student->study_program }}" class="w-full mt-2 p-3 rounded-black text-[#0d1117] border border-[#0d1117]/[0.12] rounded-[4px]" required>
        </div>
        <div class="lg:col-span-2">
            <label for="nim" class="block text-sm font-medium">NIM</label>
            <input type="text" id="nim" name="nim" value="{{ $student->nim }}" class="w-full mt-2 p-3 rounded-black text-[#0d1117] border border-[#0d1117]/[0.12] rounded-[4px]" required>
        </div>
        <div>
            <label for="email" class="block text-sm font-medium">Email</label>
            <input type="email" id="email" name="email" value="{{ $student->user->email }}" class="w-full mt-2 p-3 rounded-black text-[#0d1117] border border-[#0d1117]/[0.12] rounded-[4px]" required>
        </div>
        <div>
            <label for="password" class="block text-sm font-medium">Password</label>
            <input type="password" id="password" name="password" class="w-full mt-2 p-3 rounded-black text-[#0d1117] border border-[#0d1117]/[0.12] rounded-[4px]">
        </div>
        <div class="wrapper lg:col-span-2 flex items-center gap-[6px]">
            <button type="submit" class="cursor-pointer text-nowrap bg-[#A91D3A] hover:bg-[#CA3453] text-white p-3 rounded-[4px] focus:outline-none text-[0.875rem] border w-fit">
                Simpan Perubahan
            </button>
            <a href="{{ route('dashboard.student.index') }}" class="bg-transparent hover:bg-[#0d1117]/[0.04] text-[#0d1117] p-3 rounded-[4px] focus:outline-none text-[0.875rem] border border-[#0d1117]/[0.12] hover:border-[#0d1117]/[0.24] w-fit">
                Batal Edit
            </a>
        </div>
    </form>
@endsection
