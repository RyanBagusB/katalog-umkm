@extends('layouts.merchant')

@section('title', 'UMKM Rasa Lokal - Karangpoh')
@section('description', 'Temukan informasi lengkap tentang UMKM Rasa Lokal, mulai dari produk, cerita usaha, hingga kontak langsung untuk pembelian.')

@section('content')

{{-- Hero Section with Real UMKM Photo --}}
<section class="relative bg-cover bg-center text-white py-32 px-4 sm:px-8 lg:px-16 xl:px-20"
         style="background-image: url('{{ asset('images/auth-image.jpg') }}');">
  <div class="max-w-4xl mx-auto text-center bg-black/50 rounded-xl p-6 sm:p-12">
    <h1 class="text-4xl sm:text-5xl font-extrabold mb-4 leading-tight tracking-tight text-gold">Camilan Tradisional Rasa Lokal</h1>
    <p class="text-lg sm:text-xl text-gray-200 max-w-2xl mx-auto">Dibuat dari bahan pilihan oleh warga Karangpoh, dengan rasa otentik dan kemasan kekinian.</p>
    <a href="#produk" class="inline-block mt-8 bg-gold text-deepgreen font-semibold px-6 py-3 rounded-full hover:bg-[#D4AF37]/90 transition">Lihat Produk</a>
  </div>
</section>

{{-- Breadcrumb --}}
<nav class="bg-[#FAFAF7] px-4 sm:px-8 lg:px-16 xl:px-20 pt-6 pb-3 text-sm border-b border-gray-200" aria-label="Breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
  <ol class="flex flex-wrap gap-1 text-gray-500">
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <a href="{{ url('/') }}" itemprop="item" class="hover:text-gray-700"><span itemprop="name">Beranda</span></a>
      <meta itemprop="position" content="1" />
      <span class="mx-2">/</span>
    </li>
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <a href="{{ url('/umkm') }}" itemprop="item" class="hover:text-gray-700"><span itemprop="name">UMKM</span></a>
      <meta itemprop="position" content="2" />
      <span class="mx-2">/</span>
    </li>
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <span itemprop="name" class="text-deepgreen font-medium">Rasa Lokal</span>
      <meta itemprop="position" content="3" />
    </li>
  </ol>
</nav>

{{-- Kelebihan / Fitur --}}
<section class="bg-[#F6F5F3] py-20 px-4 sm:px-8 lg:px-16 xl:px-20">
  <div class="max-w-6xl mx-auto">
    <h2 class="text-3xl font-semibold text-center text-deepgreen mb-12">Kenapa Memilih Rasa Lokal?</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 text-center">
      @foreach ([
        ['title' => 'Tanpa Pengawet', 'desc' => 'Aman dikonsumsi, tanpa bahan kimia berbahaya.'],
        ['title' => 'Rasa Otentik', 'desc' => 'Cita rasa khas Karangpoh yang kaya tradisi.'],
        ['title' => 'Kemasan Modern', 'desc' => 'Menarik, praktis, dan cocok untuk oleh-oleh.'],
        ['title' => 'Distribusi Luas', 'desc' => 'Menjangkau berbagai kota di Jawa Tengah.']
      ] as $item)
      <div class="bg-white rounded-2xl p-6 shadow hover:shadow-md transition">
        <h3 class="text-lg font-bold text-deepgreen mb-2">{{ $item['title'] }}</h3>
        <p class="text-base text-gray-600">{{ $item['desc'] }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>

{{-- Produk Unggulan --}}
<section id="produk" class="bg-[#FBFAF8] py-20 px-4 sm:px-8 lg:px-16 xl:px-20">
  <div class="max-w-6xl mx-auto">
    <h2 class="text-3xl font-bold text-center text-deepgreen mb-12">Produk Unggulan</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @for ($i = 1; $i <= 6; $i++)
      <div class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition">
        <img src="{{ asset('images/auth-image.jpg') }}" alt="Produk {{ $i }}" class="w-full aspect-square object-cover rounded-t-xl">
        <div class="p-4">
          <h3 class="font-semibold text-lg text-deepgreen mb-1">Keripik Singkong Rasa {{ $i }}</h3>
          <p class="text-sm text-gray-500">Rp{{ number_format(10000 + $i * 1000, 0, ',', '.') }}</p>
        </div>
      </div>
      @endfor
    </div>
  </div>
</section>

{{-- Cerita --}}
<section class="bg-white py-20 px-4 sm:px-8 lg:px-16 xl:px-20">
  <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
    <div class="space-y-6">
      <h2 class="text-3xl font-semibold text-deepgreen">Cerita Rasa Lokal</h2>
      <p class="text-gray-700 text-lg leading-relaxed">
        Didirikan oleh Ibu Sri Lestari saat pandemi 2020, Rasa Lokal menjadi simbol ketahanan dan harapan masyarakat Karangpoh. Kini menjadi UMKM unggulan yang menjaga kualitas rasa dan semangat lokal.
      </p>
      <ul class="list-disc text-gray-700 pl-5 space-y-1">
        <li>Diproduksi dari bahan lokal</li>
        <li>Dikelola oleh warga Karangpoh</li>
        <li>Dipasarkan hingga luar kota</li>
      </ul>
    </div>
    <img src="{{ asset('images/auth-image.jpg') }}" alt="Tentang Rasa Lokal" class="rounded-2xl shadow-md object-cover aspect-[4/3] w-full">
  </div>
</section>

{{-- Kontak --}}
<section class="bg-[#ECEFEB] py-20 px-4 sm:px-8 lg:px-16 xl:px-20">
  <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
    <div class="space-y-4">
      <h2 class="text-2xl font-bold text-deepgreen">Hubungi Rasa Lokal</h2>
      <p class="text-gray-700">Tertarik menjadi pelanggan, reseller, atau ingin tahu lebih banyak? Kami siap membantu:</p>
      <ul class="text-gray-800 text-sm space-y-2">
        <li><strong>Alamat:</strong> Karangpoh RT 03/RW 01, Tegalrejo</li>
        <li><strong>Telepon:</strong> 0857-1234-5678</li>
        <li><strong>Email:</strong> rasalokal@umkm.com</li>
        <li><strong>Instagram:</strong> <a href="#" class="text-blue-600 hover:underline">@rasalokal.id</a></li>
      </ul>
    </div>
    <img src="{{ asset('images/auth-image.jpg') }}" alt="Kontak Rasa Lokal" class="w-full aspect-[4/3] object-cover rounded-2xl shadow-md" loading="lazy">
  </div>
</section>

@endsection
