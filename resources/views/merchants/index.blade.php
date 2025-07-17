@extends('layouts.merchant')

@section('title', $merchant->name)
@section('description', $merchant->banner_description)

@section('content')

{{-- Hero Section --}}
<section class="relative bg-white text-black">
  <div class="absolute inset-0">
    <img src="{{ asset('storage/' . $merchant->banner_image) }}" alt="{{ $merchant->name }} Banner" class="w-full h-full object-cover object-center" />
    <div class="absolute inset-0 bg-black/50"></div>
  </div>
  <div class="relative z-10 px-4 sm:px-8 lg:px-16 xl:px-20 py-24 min-h-screen flex flex-col justify-center text-white">
    <div class="max-w-3xl">
      <h2 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight mb-6">
        {{ $merchant->tagline }}
      </h2>
      <p class="text-lg sm:text-xl text-white/90 mb-8">
        {{ $merchant->banner_description }}
      </p>
      <a href="{{ route('merchants.products', $merchant->slug) }}" class="inline-block bg-white text-black font-semibold px-6 py-3 rounded-lg shadow hover:bg-gray-100 transition">
        Jelajahi Produk Kami
      </a>
    </div>
  </div>
</section>

{{-- Breadcrumb --}}
<nav class="bg-white py-6 px-4 sm:px-8 lg:px-16 xl:px-20 text-sm" aria-label="Breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
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
      <span itemprop="name" class="text-deepgreen font-medium">{{ $merchant->name }}</span>
      <meta itemprop="position" content="3" />
    </li>
  </ol>
</nav>

{{-- Kelebihan --}}
<section class="bg-white py-16 px-4 sm:px-8 lg:px-16 xl:px-20">
  <div class="max-w-6xl mx-auto">
    <h2 class="text-3xl font-semibold text-center text-deepgreen mb-12">Kenapa Memilih {{ $merchant->name }}?</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 text-center">
      @for ($i = 1; $i <= 4; $i++)
        @php
          $titleField = "feature_{$i}_title";
          $descField  = "feature_{$i}_desc";
        @endphp
        @if(!empty($merchant->$titleField) && !empty($merchant->$descField))
          <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow hover:shadow-md transition">
            <h3 class="text-lg font-bold text-deepgreen mb-2">{{ $merchant->$titleField }}</h3>
            <p class="text-base text-gray-600">{{ $merchant->$descField }}</p>
          </div>
        @endif
      @endfor
    </div>
  </div>
</section>

{{-- Produk --}}
<section id="produk" class="bg-white py-16 px-4 sm:px-8 lg:px-16 xl:px-20">
  <div class="max-w-6xl mx-auto">
    <h2 class="text-3xl font-bold text-center text-deepgreen mb-12">Produk Unggulan</h2>

    @if ($merchant->products->isEmpty())
      <div class="text-center text-gray-500 text-lg py-12">
        UMKM ini belum menambahkan produk apa pun.
      </div>
    @else
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($merchant->products as $product)
          <div class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition">
            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full aspect-square object-cover rounded-t-xl">
            <div class="p-4">
              <h3 class="font-semibold text-lg text-deepgreen mb-1">{{ $product->name }}</h3>
              <p class="text-sm text-gray-500 mb-2">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
              <p class="text-sm text-gray-600 leading-relaxed">
                {{ $product->description }}
              </p>
            </div>
          </div>
        @endforeach
      </div>
    @endif

  </div>
</section>

{{-- Cerita --}}
<section class="bg-white py-16 px-4 sm:px-8 lg:px-16 xl:px-20">
  <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
    <div class="bg-[#ECECEC] rounded-2xl shadow-sm h-full flex flex-col justify-center p-6 sm:p-8 md:p-10 lg:p-12">
      <h2 class="text-3xl font-semibold mb-4 text-center">
        Cerita {{ $merchant->name }}
      </h2>
      <p class="text-gray-700 text-lg leading-relaxed text-center">
        {{ $merchant->about_description }}
      </p>
    </div>
    <div class="h-full">
      <img 
        src="{{ asset('storage/' . $merchant->about_image) }}" 
        alt="Tentang {{ $merchant->name }}" 
        class="rounded-2xl shadow-md object-cover aspect-[7/8] w-full h-full"
        loading="lazy"
      >
    </div>
  </div>
</section>

{{-- Kontak --}}
<section class="bg-white py-16 px-4 sm:px-8 lg:px-16 xl:px-20">
  <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
    <div class="h-full">
      <img 
        src="{{ asset('storage/' . $merchant->contact_image) }}" 
        alt="Kontak {{ $merchant->name }}" 
        class="rounded-2xl shadow-md object-cover aspect-[7/8] w-full h-full"
        loading="lazy"
      >
    </div>
    <div class="bg-[#ECECEC] rounded-2xl shadow-sm h-full flex flex-col justify-center p-6 sm:p-8 md:p-10 lg:p-12">
      <h2 class="text-3xl font-semibold mb-4 text-center">
        Hubungi {{ $merchant->name }}
      </h2>
      <p class="text-gray-700 text-lg leading-relaxed text-center mb-6">
        {{ $merchant->contact_description }}
      </p>
      <ul class="text-gray-800 text-sm space-y-2 text-center">
        <li><strong>Alamat:</strong> {{ $merchant->contact_address }}</li>
        <li><strong>Telepon:</strong> {{ $merchant->contact_phone }}</li>
        <li><strong>Email:</strong> {{ $merchant->contact_email }}</li>
        @if(!empty($merchant->contact_instagram))
          <li><strong>Instagram:</strong> <a href="{{ $merchant->contact_instagram }}" class="text-blue-600 hover:underline">{{ $merchant->contact_instagram }}</a></li>
        @endif
      </ul>
    </div>
  </div>
</section>

@endsection
