@extends('layout.main')

@section('content')
    <div class="w-screen h-full bg-[#F5F5F5] p-30">
        <h1 class="text-[20px] font-semibold text-center mb-8">Seluruh Blog</h1>
        <div class="mb-8 flex justify-center">
            <form method="GET" class="flex items-center">
                <input type="text" name="search" placeholder="Cari blog disini..." value="{{ $search }}"
                       class="w-96 px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-[#A91D3A]">
                <button type="submit" class="px-4 py-2 bg-[#A91D3A] text-white rounded-r-lg hover:bg-[#CA3453] transition">
                    Cari
                </button>
            </form>
        </div>
        <div class="grid grid-cols-4 gap-4">
            @if(count($blogs) === 0)
                <p class="col-span-4 w-full text-center text-[0.913rem] text-[#0d1117]/[0.42] mt-8">Data blog tidak ada.</p>
            @else
                @foreach($blogs as $blog)
                    <div class="w-full rounded-xl overflow-hidden border border-gray-300 bg-white shadow-md max-w-sm mx-auto">
                        <img src="{{ asset('storage/' . $blog->image_path) }}" alt="Dummy Image" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h2 class="text-lg font-semibold mb-2">{{ $blog->title }}</h2>
                            <a href="{{ route('blog.show', $blog->id) }}" class="block w-full text-center bg-black text-white py-2 rounded-lg mt-4 font-medium hover:bg-gray-800 transition">Selengkapnya</a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
