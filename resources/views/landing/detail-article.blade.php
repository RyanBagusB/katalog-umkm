@extends('layouts.landing')

@section('title', $news->title . ' – Katalog UMKM Kelurahan Karangpoh')
@section('description', Str::limit(strip_tags($news->content), 150))

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
        <a href="{{ url('/berita') }}" itemprop="item" class="hover:text-gray-700">
          <span itemprop="name">Berita</span>
        </a>
        <meta itemprop="position" content="2" />
        <span class="mx-2">/</span>
      </li>
      <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <span itemprop="name" class="text-gray-700 font-medium">{{ $news->title }}</span>
        <meta itemprop="item" content="{{ url()->current() }}" />
        <meta itemprop="position" content="3" />
      </li>
    </ol>
  </nav>

  {{-- Konten Detail --}}
  <div class="max-w-3xl mx-auto flex flex-col gap-y-8">

    {{-- Judul & Info --}}
    <div class="flex flex-col gap-y-4 text-center">
      <h1 class="text-3xl sm:text-5xl font-semibold text-[#1E1E1E]">{{ $news->title }}</h1>
      <p class="text-gray-500 text-sm">
        Dipublikasikan pada {{ \Carbon\Carbon::parse($news->published_at)->translatedFormat('d F Y') }}
      </p>
    </div>

    {{-- Gambar Utama --}}
    @if($news->image)
      <div class="overflow-hidden rounded-2xl shadow-md">
        <img
          src="{{ asset('storage/'.$news->image) }}"
          alt="{{ $news->title }}"
          class="w-full aspect-[16/9] object-cover hover:scale-[1.02] transition duration-500"
          loading="lazy"
        />
      </div>
    @endif

    {{-- Isi Artikel --}}
    <article class="prose prose-lg max-w-none text-[#2C2C2C] prose-headings:text-[#1E1E1E] prose-p:leading-relaxed">
      {!! $news->content !!}
    </article>

    {{-- Tombol Kembali --}}
    <div class="pt-6">
      <a href="{{ url('/berita') }}"
        class="inline-block text-sm text-gray-600 px-4 py-2 border border-gray-300 rounded-full hover:bg-gray-100 transition">
        ← Kembali ke Daftar Berita
      </a>
    </div>
  </div>
</section>

{{-- Related Articles --}}
@if(isset($relatedNews) && $relatedNews->isNotEmpty())
<section class="px-4 sm:px-8 lg:px-16 xl:px-20 pt-12 pb-20 bg-white">
  <div>
    <h2 class="text-2xl sm:text-3xl font-semibold text-[#1E1E1E] mb-8">Berita Terkait</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach($relatedNews as $related)
        <a href="{{ url('/berita/'.$related->slug) }}" class="group block">
          <div class="overflow-hidden rounded-2xl shadow hover:shadow-lg transition">
            <img
              src="{{ asset('storage/'.$related->image) }}"
              alt="{{ $related->title }}"
              class="w-full aspect-[4/3] object-cover group-hover:scale-105 transition duration-300"
              loading="lazy"
            />
          </div>
          <h3 class="text-lg font-semibold text-[#1E1E1E] mt-3 group-hover:underline">
            {{ $related->title }}
          </h3>
          <p class="text-sm text-gray-500 mt-2">
            {{ Str::limit(strip_tags($related->content), 100) }}
          </p>
        </a>
      @endforeach
    </div>
  </div>
</section>
@endif
@endsection
