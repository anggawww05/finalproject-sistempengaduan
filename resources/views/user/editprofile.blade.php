@extends('user.main')

@section('content')
    <div class = "w-full h-screen bg-[#F6F6F6]">
        <div class="w-screen h-[700px]  flex flex-col gap-4  justify-center items-center mx-auto">
            {{-- <div class="w-[1200px] text-[28px] font-semibold">
                <h1>Edit Profil</h1>
            </div> --}}
            <div class="w-[1200px] text-[28px] font-semibold flex items-center gap-4">
                <a href="#">
                    <img class="h-6 " src="#" alt="#">
                </a>
                <h1>Edit Profil</h1>
            </div>
            <div class = "">
                <div class = "w-[1200px] h-[500px] bg-white rounded-xl shadow-lg border border-[#AAAAAA] flex flex-row">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="w-[1160px] h-[500px] flex flex-col items-end justify-center border-black">
                            <div class="w-[1160px] flex items-center justify-between">
                                {{-- foto --}}
                                <div class="flex flex-col gap-8 w-[450px] h-[400px] justify-center items-center">
                                    <div class="w-60 h-60 rounded-full border border-black">
                                        <img src="#" alt="#"
                                            class="object-cover rounded-full overflow-hidden img-preview w-60 h-60">
                                    </div>
                                    <input type="file" name="picture_profile" id="picture_profile"
                                        class="hidden img-preview" accept="image/*">
                                    <label for="picture_profile"
                                        class="w-[140px] h-[40px] bg-[#F4F4F4] border-[2px] border-[#A4A4A4] rounded-lg text-[#A4A4A4] flex items-center justify-center cursor-pointer">
                                        Pilih Gambar
                                    </label>
                                </div>

                                <div>
                                    <div class="w-[670px] h-[400px] flex flex-col gap-4 justify-center">
                                        <div>
                                            <label for="user_name" class="text-lg font-medium">Nama</label>
                                            <input type="text" id="user_name" name="user_name"
                                                value="#"
                                                class="w-full max-h-[50px] p-2 border border-gray-300 rounded-lg">
                                        </div>
                                        <div>
                                            <label for="email" class="text-lg font-medium">Email</label>
                                            <input type="text" id="email" name="email" value="#"
                                                class="w-full max-h-[50px] p-2 border border-gray-300 rounded-lg">
                                        </div>
                                        <div>
                                            <label for="phone_number" class="text-lg font-medium">No. Telp</label>
                                            <input type="text" id="phone_number" name="phone_number"
                                                value="#"
                                                class="w-full max-h-[50px] p-2 border border-gray-300 rounded-lg">
                                        </div>
                                        <div>
                                            <label for="address" class="text-lg font-medium">Alamat</label>
                                            <input type="text" id="address" name="address" value="#"
                                                class="w-full max-h-[50px] p-2 border border-gray-300 rounded-lg">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <button type="w-[120px] submit"
                                class="w-[120px] h-[40px] bg-[#003A5B] text-white rounded-lg hover:bg-[#004A73] transition">
                                Simpan
                            </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
