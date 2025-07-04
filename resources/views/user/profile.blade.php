@extends('user.main')

@section('content')
    <div class = "container mx-auto flex justify-center flex-col">
        <div class = "my-40">
            <h1 class="text-[20px] text-center font-semibold">Pengaturan</h1>
            <div class ="flex items-center mt-5 mx-auto justify-between w-[600px] h-[120px] bg-white outline outline-[#AAAAAA] rounded-xl p-4"
                data-aos="fade-up" id="profil">
                <div class = "flex items-center space-x-4">
                    <img src="#" alt="#"
                        class="h-16 w-16 object-cover rounded-full overflow-hidden border-2 border-black">
                    <div class="item-center">
                        <h1 class=" text-[26px] font-semibold">username</h1>
                        <p>email</p>
                    </div>
                </div>
                <a href="{{ route('edit.profile.page') }}"
                    class="bg-[#003A5B] h-[35px] w-[100px] text-[15px] text-white px-4 py-2 rounded hover:bg-[#004A73] transition">Edit
                    Profil</a>
            </div>
            <div class="flex flex-col items-center gap-2 mt-4 " data-aos="fade-up">
                <a href="{{ route('submissions.page') }}">
                    <div
                        class="w-[600px] h-[40px] bg-white outline outline-[#AAAAAA] rounded-lg p-2 hover:bg-[#003654] hover:text-white transition">
                        <h1>Pengaduan Saya</h1>
                    </div>
                </a>
                <a href="#" data-aos="fade-up">
                    <div
                        class="w-[600px] h-[40px] bg-white outline outline-[#AAAAAA] rounded-lg p-2 hover:bg-[#003654] hover:text-white transition">
                        <h1>Daftar Postingan Disukai</h1>
                    </div>
                </a>
                <form action="#" method="POST">
                    @csrf
                    <button
                        class="w-[600px] h-[40px] bg-white outline outline-[#AAAAAA] rounded-lg p-2 hover:bg-[#DB2F27] hover:text-white transition text-left"
                        data-aos="fade-up">Log out
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
