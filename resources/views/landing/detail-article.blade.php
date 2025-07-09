@extends('layouts.landing')

@section('title', $judul)
@section('description', Str::limit(strip_tags($isi), 150))

@section('content')
<section class="px-4 sm:px-8 lg:px-16 xl:px-20 py-20 bg-white">

  {{-- Breadcrumb --}}
  <nav class="text-sm mb-8" aria-label="Breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
    <ol class="flex flex-wrap gap-1 text-gray-500">
      <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a href="{{ url('/') }}" itemprop="item" class="hover:text-gray-700">
          <span itemprop="name">Beranda</span>
        </a>
        <meta itemprop="position" content="1" />
        <span class="mx-2">/</span>
      </li>
      <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a href="{{ url('/artikel') }}" itemprop="item" class="hover:text-gray-700">
          <span itemprop="name">Artikel</span>
        </a>
        <meta itemprop="position" content="2" />
        <span class="mx-2">/</span>
      </li>
      <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <span itemprop="name" class="text-gray-700 font-medium">{{ $judul }}</span>
        <meta itemprop="item" content="{{ url()->current() }}" />
        <meta itemprop="position" content="3" />
      </li>
    </ol>
  </nav>

  {{-- Konten Detail --}}
  <div class="max-w-3xl mx-auto flex flex-col gap-y-8">

    {{-- Judul & Info --}}
    <div class="flex flex-col gap-y-4 text-center">
      <h2 class="text-3xl sm:text-5xl font-semibold text-[#1E1E1E]">{{ $judul }}</h2>
      <p class="text-gray-500 text-sm">Dipublikasikan pada {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}</p>
    </div>

    {{-- Gambar Utama --}}
    <img
      src="{{ asset($gambar) }}"
      alt="{{ $judul }}"
      class="w-full rounded-2xl shadow-md aspect-[16/9] object-cover"
      loading="lazy"
    />

    {{-- Isi Artikel --}}
    <article class="prose prose-lg max-w-none text-[#2C2C2C] prose-headings:text-[#1E1E1E] prose-p:leading-relaxed">
      {!! nl2br(e($isi)) !!}
    </article>

    {{-- Tombol Kembali --}}
    <div class="pt-6">
      <a href="{{ url('/artikel') }}"
        class="inline-block text-sm text-gray-600 px-4 py-2 border border-gray-300 rounded-full hover:bg-gray-100 transition">
        ← Kembali ke Daftar Artikel
      </a>
    </div>
  </div>
</section>

{{-- Related Articles --}}
<section class="px-4 sm:px-8 lg:px-16 xl:px-20 pt-12 pb-20 bg-[#F9F9F9]">
  <div class="max-w-screen-xl mx-auto">
    <h2 class="text-2xl sm:text-3xl font-semibold text-[#1E1E1E] mb-8">Berita Terkait</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @for ($i = 1; $i <= 3; $i++)
        <a href="{{ url('/artikel/detail-'.$i) }}" class="group block">
          <div class="overflow-hidden rounded-2xl shadow hover:shadow-lg transition">
            <img
              src="{{ asset('images/auth-image.jpg') }}"
              alt="Berita terkait {{ $i }}"
              class="w-full aspect-[4/3] object-cover group-hover:scale-105 transition duration-300"
              loading="lazy"
            />
          </div>
          <h3 class="text-2xl font-semibold text-[#1E1E1E] mt-3 group-hover:underline">
            Judul Berita UMKM Terkait {{ $i }}
          </h3>
          <p class="text-md text-gray-500 mt-2">
            Ringkasan singkat artikel terkait yang relevan dengan topik UMKM dan kegiatan warga.
          </p>
        </a>
      @endfor
    </div>
  </div>
</section>
@endsection
