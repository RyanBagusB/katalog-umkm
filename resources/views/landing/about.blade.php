@extends('layouts.landing')

@section('title', 'Tentang Kami - Katalog UMKM Kelurahan Karangpoh')
@section('description', 'Halaman resmi tentang inisiatif Kelurahan Karangpoh dalam mendukung dan memajukan pelaku UMKM lokal melalui platform katalog digital yang informatif dan mudah diakses.')

@section('content')
<section class="px-4 md:px-8 lg:px-16 xl:px-20">
  {{-- Section Intro --}}
  <div class="py-12 sm:py-20 lg:py-24">
    <div class="text-center max-w-2xl mx-auto mb-16 sm:mb-20">
      <h2 class="text-3xl sm:text-4xl lg:text-5xl font-semibold leading-tight text-[#1E1E1E]">
        Tentang Katalog UMKM Karangpoh
      </h2>
      <p class="text-[#1E1E1E] text-lg leading-relaxed mt-6">
        Katalog UMKM ini merupakan bagian dari inisiatif elurahan Karangpoh untuk mendukung dan mempromosikan pelaku Usaha Mikro, Kecil, dan Menengah (UMKM) lokal. Dengan semangat kolaborasi, platform ini bertujuan memperluas jangkauan pemasaran produk unggulan warga serta membangun kemandirian ekonomi berbasis komunitas.
      </p>
    </div>

    {{-- Responsive Grid Image --}}
    <div class="grid grid-cols-1 sm:[grid-template-columns:1fr_1.5fr_1fr] gap-4">
      {{-- Left column --}}
      <div class="flex flex-col gap-4">
        <img src="{{ asset('images/auth-image.jpg') }}" alt="Produk kuliner lokal Karangpoh" class="w-full aspect-square sm:aspect-[7/8] object-cover rounded-2xl shadow" />
        <img src="{{ asset('images/auth-image.jpg') }}" alt="Kerajinan tangan buatan warga Karangpoh" class="w-full aspect-[4/3] object-cover rounded-2xl shadow" />
      </div>

      {{-- Middle column --}}
      <div class="flex items-center">
        <img src="{{ asset('images/auth-image.jpg') }}" alt="Suasana UMKM di Kelurahan Karangpoh" class="w-full aspect-square object-cover rounded-2xl shadow my-4 md:my-12" />
      </div>

      {{-- Right column --}}
      <div class="flex flex-col gap-4">
        <img src="{{ asset('images/auth-image.jpg') }}" alt="Minuman herbal lokal Karangpoh" class="w-full aspect-[4/3] object-cover rounded-2xl shadow" />
        <img src="{{ asset('images/auth-image.jpg') }}" alt="Produk kreatif warga Karangpoh" class="w-full aspect-square sm:aspect-[7/8] object-cover rounded-2xl shadow" />
      </div>
    </div>
  </div>

  {{-- Quotation / Mission Section --}}
  <div class="text-center max-w-2xl mx-auto mb-16 sm:mb-24">
    <p class="text-xl md:text-2xl lg:text-3xl font-semibold text-[#1E1E1E] leading-relaxed">
      Digitalisasi UMKM Karangpoh untuk ekonomi kuat, mandiri, dan berdaya saing.  
    </p>
  </div>

  {{-- Full width image --}}
  <div class="mx-auto">
    <img src="{{ asset('images/auth-image.jpg') }}" alt="Kegiatan bazar UMKM bersama warga Karangpoh" class="w-full aspect-video object-cover rounded-2xl shadow" />
  </div>
</section>
@endsection
