<nav class="bg-[#141414] fixed w-full z-50">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <img src="{{ asset('images/full-logo-sipma.png') }}" alt="Rekonser logo" class="h-6">
        <div class="flex flex-row justify-end order-2 gap-2">
            <a href="#"
                class="bg-[#A91D3A] py-1 px-6 rounded-lg text-white hover:bg-[#CA3453] text-[16px]">Daftar</a>
            <a href="#"
                class="text-[#A91D3A] border-2 border-[#A91D3A] rounded-lg py-1 px-6 hover:bg-[#A91D3A] hover:text-white text-[16px]">Masuk</a>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky ">
            <ul
                class="flex gap-7">
                <li>
                    <a href="{{ route('landing.page') }}"
                        class="block py-2 px-3 text-white bg-[#141414] text-[16px] hover:underline"
                        aria-current="page">Beranda</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-white bg-[#141414] text-[16px] hover:underline">Berita</a>
                </li>
                <li>
                    <a href="{{ route('pengaduan.page') }}"
                        class="block py-2 px-3 text-white bg-[#141414] text-[16px] hover:underline">Pengaduan</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-white bg-[#141414] text-[16px] hover:underline">Status</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
