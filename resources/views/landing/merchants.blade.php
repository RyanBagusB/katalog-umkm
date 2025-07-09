@extends('layouts.landing')

@section('title', 'Daftar UMKM - Kelurahan Karangpoh')
@section('description', 'Lihat daftar lengkap UMKM unggulan di Kelurahan Karangpoh. Temukan produk lokal, kuliner, dan kerajinan terbaik dari pelaku usaha warga.')

@section('content')
<section class="px-4 sm:px-8 lg:px-16 xl:px-20 py-24 bg-white flex flex-col gap-16">
  {{-- Judul & Aksi --}}
  <div class="flex flex-col text-center justify-between items-center max-w-xl mx-auto gap-8">
    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-semibold text-[#1E1E1E]">
      Daftar UMKM Karangpoh
    </h2>
    <p class="text-[#1E1E1E] text-base leading-relaxed">
      Temukan berbagai produk unggulan dari pelaku UMKM di Kelurahan Karangpoh. Mulai dari makanan khas, kerajinan tangan, hingga layanan lokal yang kreatif dan berkualitas.
    </p>
  </div>

  {{-- Grid UMKM Dummy --}}
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 max-w-screen-xl mx-auto">
    @for ($i = 1; $i <= 8; $i++)
      <div class="flex flex-col gap-y-4">
        <img
          src="{{ asset('images/auth-image.jpg') }}"
          alt="UMKM Dummy {{ $i }}"
          class="w-full aspect-[6/4] md:aspect-square object-cover rounded-2xl shadow-md hover:shadow-lg transition duration-300"
          loading="lazy"
        />
        <p class="text-lg font-medium text-[#1E1E1E] truncate">UMKM Dummy {{ $i }}</p>
      </div>
    @endfor
  </div>
</section>
@endsection
