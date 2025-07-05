@extends('layout.main')

@section('content')
    <div class = "w-full bg-[#F6F6F6] py-20">
        <div class="w-screen  flex flex-col gap-4  justify-center items-center mx-auto">
            {{-- <div class="w-[1200px] text-[28px] font-semibold">
                <h1>Edit Profil</h1>
            </div> --}}
            <div class="w-[1200px] text-[28px] font-semibold flex items-center gap-4">
                <h1>Edit Profil</h1>
            </div>
            <div class = "">
                <div class = "w-[1200px] bg-white rounded-xl shadow-lg border border-[#AAAAAA] flex flex-row">
                    <form action="{{ route('profile.edit') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="w-[1160px] flex flex-col items-end justify-center border-black">
                            <div class="w-[1160px] flex items-center justify-between">
                                {{-- foto --}}
                                <div class="flex flex-col gap-8 w-[450px] h-[400px] justify-center items-center">
                                    <div class="w-60 h-60 rounded-full border border-black">
                                        <img src="{{ auth()->user()->student->image_path ? asset('storage/' . auth()->user()->student->image_path) : 'https://placehold.co/400x400?text=Image+Not+Found' }}" alt="#"
                                            class="object-cover rounded-full overflow-hidden w-60 h-60" id="image-preview">
                                    </div>
                                    <input type="file" name="image_path"
                                        class="img-input" id="image-input">
                                    <label for="image_path"
                                        class="w-[140px] h-[40px] bg-[#F4F4F4] border-[2px] border-[#A4A4A4] rounded-lg text-[#A4A4A4] flex items-center justify-center cursor-pointer">
                                        Pilih Gambar
                                    </label>
                                    @error('image_path')
                                    <p class="message-error text-red-600 mt-1 text-[0.875rem]">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <div class="w-[670px] py-6 flex flex-col gap-4 justify-center">
                                        <div>
                                            <label for="username" class="text-lg font-medium">Username</label>
                                            <input type="text" id="username" name="username"
                                                value="{{ auth()->user()->username }}"
                                                class="w-full max-h-[50px] p-2 border border-gray-300 rounded-lg">
                                            @error('username')
                                            <p class="message-error text-red-600 mt-1 text-[0.875rem]">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="email" class="text-lg font-medium">Email</label>
                                            <input type="email" id="email" name="email"
                                                   value="{{ auth()->user()->email }}"
                                                   class="w-full max-h-[50px] p-2 border border-gray-300 rounded-lg">
                                            @error('email')
                                            <p class="message-error text-red-600 mt-1 text-[0.875rem]">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="password" class="text-lg font-medium">Password</label>
                                            <input type="password" id="password" name="password"
                                                   class="w-full max-h-[50px] p-2 border border-gray-300 rounded-lg">
                                            @error('password')
                                            <p class="message-error text-red-600 mt-1 text-[0.875rem]">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="full_name" class="text-lg font-medium">Nama Lengkap</label>
                                            <input type="text" id="full_name" name="full_name"
                                                   value="{{ auth()->user()->student->full_name }}"
                                                   class="w-full max-h-[50px] p-2 border border-gray-300 rounded-lg">
                                            @error('full_name')
                                            <p class="message-error text-red-600 mt-1 text-[0.875rem]">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="phone_number" class="text-lg font-medium">Nomor Telepon</label>
                                            <input type="text" id="phone_number" name="phone_number"
                                                   value="{{ auth()->user()->student->phone_number }}"
                                                   class="w-full max-h-[50px] p-2 border border-gray-300 rounded-lg">
                                            @error('phone_number')
                                            <p class="message-error text-red-600 mt-1 text-[0.875rem]">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="study_program" class="text-lg font-medium">Prodi</label>
                                            <input type="text" id="study_program" name="study_program"
                                                   value="{{ auth()->user()->student->study_program }}"
                                                   class="w-full max-h-[50px] p-2 border border-gray-300 rounded-lg">
                                            @error('study_program')
                                            <p class="message-error text-red-600 mt-1 text-[0.875rem]">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="nim" class="text-lg font-medium">NIM</label>
                                            <input type="text" id="nim" name="nim"
                                                   value="{{ auth()->user()->student->nim }}"
                                                   class="w-full max-h-[50px] p-2 border border-gray-300 rounded-lg">
                                            @error('nim')
                                            <p class="message-error text-red-600 mt-1 text-[0.875rem]">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wrapper">
                                <a href="{{ route('profile.index') }}"
                                        class="w-[120px] mb-6 h-[40px] bg-[#003A5B] text-white rounded-lg hover:bg-[#004A73] transition">
                                    Kembali
                                </a>
                                <button type="submit"
                                    class="w-[120px] mb-6 h-[40px] bg-[#003A5B] text-white rounded-lg hover:bg-[#004A73] transition">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const input = document.getElementById('image-input');
            const preview = document.getElementById('image-preview');
            input.addEventListener('change', function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        preview.src = e.target.result;
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection
