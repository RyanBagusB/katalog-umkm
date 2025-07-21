@extends('layouts.landing')

@section('title', 'Berita UMKM – Katalog UMKM Kelurahan Karangpoh')
@section('description', 'Dapatkan informasi terbaru seputar kegiatan, program, dan perkembangan UMKM di Kelurahan Karangpoh melalui katalog digital kami.')

@section('content')
<section class="px-4 sm:px-8 lg:px-16 xl:px-20 pt-20 pb-4 bg-white flex flex-col gap-y-12">
  {{-- Header --}}
  <div class="flex flex-col text-center justify-between items-center max-w-2xl mx-auto gap-8">
    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-semibold text-[#1E1E1E]">
        Berita dan Kegiatan UMKM Karangpoh
    </h2>
    <p class="text-[#1E1E1E] text-lg leading-relaxed">
        Temukan informasi terkini seputar pelatihan, bazar, program dukungan, serta kisah sukses para pelaku UMKM di Kelurahan Karangpoh.
    </p>
  </div>

  {{-- Konten Berita Grid --}}
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
    {{-- Berita Unggulan --}}
    @if($news->isNotEmpty())
    @php $featured = $news->first(); @endphp
    <a href="{{ route('news.show', $featured->slug) }}" class="group flex flex-col gap-y-4 hover:opacity-95 transition">
      <div class="overflow-hidden rounded-2xl shadow-lg">
        <img
          src="{{ asset('storage/' . $featured->image) }}"
          alt="{{ $featured->title }}"
          class="w-full aspect-[3/2] object-cover transform group-hover:scale-105 transition duration-500"
        />
      </div>
      <div>
        <h3 class="text-xl font-semibold text-[#1E1E1E]">{{ $featured->title }}</h3>
        <p class="text-gray-500 mt-2">
          {{ Str::limit(strip_tags($featured->content), 150) }}
        </p>
      </div>
    </a>
    @endif

    {{-- Daftar Berita Lainnya (3 pertama setelah unggulan) --}}
    <div class="flex flex-col gap-4">
      @foreach ($news->skip(1)->take(3) as $item)
      <a href="{{ route('news.show', $item->slug) }}" class="group block">
        <div class="md:grid grid-cols-3 gap-4 items-start md:items-center lg:items-start hover:bg-gray-50 rounded-xl p-2 transition">
          <div class="col-span-1 overflow-hidden rounded-2xl shadow-md">
            <img
              src="{{ asset('storage/' . $item->image) }}"
              alt="{{ $item->title }}"
              class="w-full aspect-[3/2] sm:aspect-[4/3] object-cover transform group-hover:scale-105 transition duration-500"
            />
          </div>
          <div class="col-span-2 flex flex-col justify-center">
            <h3 class="text-xl font-semibold text-[#1E1E1E]">{{ $item->title }}</h3>
            <p class="text-gray-500 text-sm sm:text-base mt-1">
              {{ Str::limit(strip_tags($item->content), 100) }}
            </p>
          </div>
        </div>
      </a>
      @endforeach
    </div>
  </div>
</section>

{{-- Berita Lainnya Grid --}}
<section class="px-4 sm:px-8 lg:px-16 xl:px-20 pb-16 bg-white">
  <div class="mt-16 flex flex-col gap-y-6">
    <h2 class="text-2xl sm:text-3xl font-semibold text-[#1E1E1E]">Berita Lainnya</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach ($news->skip(4) as $item)
      <a href="{{ route('news.show', $item->slug) }}" class="group block">
        <div class="flex flex-col gap-y-4 hover:bg-gray-50 p-2 rounded-xl transition">
          <div class="overflow-hidden rounded-2xl shadow-md">
            <img
              src="{{ asset('storage/' . $item->image) }}"
              alt="{{ $item->title }}"
              class="w-full aspect-[4/3] object-cover transform group-hover:scale-105 transition duration-500"
            />
          </div>
          <h3 class="text-lg font-semibold text-[#1E1E1E]">{{ $item->title }}</h3>
          <p class="text-gray-500 text-sm">
            {{ Str::limit(strip_tags($item->content), 100) }}
          </p>
        </div>
      </a>
      @endforeach
    </div>
  </div>
</section>
@endsection
