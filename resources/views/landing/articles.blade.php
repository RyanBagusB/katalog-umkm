@extends('layouts.landing')

@section('title', 'Berita UMKM - Kelurahan Karangpoh')
@section('description', 'Dapatkan informasi terbaru seputar kegiatan, program, dan perkembangan UMKM di Kelurahan Karangpoh.')

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
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 max-w-screen-xl mx-auto">
    {{-- Berita Unggulan --}}
    <div class="flex flex-col gap-y-4">
      <img
        src="{{ asset('images/auth-image.jpg') }}"
        alt="Berita unggulan UMKM"
        class="w-full aspect-[3/2] object-cover rounded-2xl shadow-lg"
      />
      <div>
        <h3 class="text-xl font-semibold text-[#1E1E1E]">Pelatihan Digitalisasi UMKM Karangpoh</h3>
        <p class="text-gray-500 mt-2">
          Kelurahan Karangpoh mengadakan pelatihan digital marketing untuk mendukung UMKM go online dan meningkatkan daya saing usaha lokal.
        </p>
      </div>
    </div>

    {{-- Daftar Berita Lainnya --}}
    <div class="flex flex-col gap-4">
      @for ($i = 1; $i <= 3; $i++)
      <div class="md:grid grid-cols-3 gap-4 items-start md:items-center lg:items-start">
        <div class="col-span-1">
          <img
            src="{{ asset('images/berita-'.$i.'.jpg') }}"
            alt="Berita UMKM {{ $i }}"
            class="w-full aspect-[3/2] sm:aspect-[4/3] object-cover rounded-2xl shadow-md"
          />
        </div>
        <div class="col-span-2 flex flex-col justify-center">
          <h3 class="text-xl font-semibold text-[#1E1E1E]">Judul Berita UMKM {{ $i }}</h3>
          <p class="text-gray-500 text-sm sm:text-base mt-1">
            Deskripsi singkat berita UMKM yang menjelaskan kegiatan atau informasi terkait usaha warga Karangpoh.
          </p>
        </div>
      </div>
      @endfor
    </div>
  </div>
</section>

{{-- Berita Lainnya Grid --}}
<section class="px-4 sm:px-8 lg:px-16 xl:px-20 pb-16 bg-white">
  <div class="mt-16 flex flex-col gap-y-6">
    <h2 class="text-2xl sm:text-3xl font-semibold text-[#1E1E1E]">Berita Lainnya</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @for ($i = 4; $i <= 9; $i++)
      <div class="flex flex-col gap-y-4">
        <img
          src="{{ asset('images/berita-'.$i.'.jpg') }}"
          alt="Berita UMKM {{ $i }}"
          class="w-full aspect-[4/3] object-cover rounded-2xl shadow-md"
        />
        <h3 class="text-lg font-semibold text-[#1E1E1E]">Judul Berita UMKM {{ $i }}</h3>
        <p class="text-gray-500 text-sm">
          Ringkasan informasi mengenai kegiatan atau program UMKM yang berlangsung di Karangpoh.
        </p>
      </div>
      @endfor
    </div>
  </div>
</section>
@endsection
