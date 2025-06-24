<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-[#141414]">
        <img src="{{ asset('images/full-logo-sipma.png') }}" class="w-[600px] h-auto mx-auto mb-1" alt="logo rekonser">
        <hr class="my-4 border-gray-200 ">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('operatorakademik.dashboard') }}"
                    class="flex items-center p-2 text-[#DFDFDF] rounded-lg hover:bg-[#025E93] @if (Route::is('#')) bg-[#025E93] @endif">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="#ffffff" stroke-width="2" class="size-6">
                        <rect x="3" y="3" width="7" height="7"></rect>
                        <rect x="14" y="3" width="7" height="7"></rect>
                        <rect x="14" y="14" width="7" height="7"></rect>
                        <rect x="3" y="14" width="7" height="7"></rect>
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('operatorakademik.permintaan') }}"
                     class="flex items-center p-2 text-[#DFDFDF] rounded-lg hover:bg-[#025E93] @if (Route::is('operatorakademik.permintaan')) bg-[#025E93] @endif">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="#ffffff" stroke-width="2" class="size-6">
                        <circle cx="10" cy="20.5" r="1" />
                        <circle cx="18" cy="20.5" r="1" />
                        <path d="M2.5 2.5h3l2.7 12.4a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 2-1.6l1.6-8.4H7.1" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Permintaan Penggaduan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('operatorakademik.listpengaduan') }}"
                    class="flex items-center p-2 text-[#DFDFDF] rounded-lg hover:bg-[#025E93] @if (Route::is('#') || Route::is('#')) bg-[#025E93] @endif">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="#ffffff" stroke-width="2" class="size-6">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Kelola Status</span>
                </a>
            </li>
        </ul>
        <div class="mt-5">
            <form action="#" method="POST">
                @csrf
                <button type="submit"
                    class="w-full px-4 py-2 text-white bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                    Logout
                </button>
            </form>
        </div>
    </div>

</aside>
