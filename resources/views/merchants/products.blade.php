@extends('layouts.merchant')

@section('title', 'Produk dari ' . $merchant->name)
@section('description', 'Daftar lengkap produk yang dimiliki oleh ' . $merchant->name . ', temukan kualitas dan ragamnya di sini.')

@section('content')

{{-- Breadcrumb SEO --}}
<nav class="bg-white py-6 px-4 sm:px-8 lg:px-16 xl:px-20 text-sm" aria-label="Breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
  <ol class="flex flex-wrap gap-1 text-gray-500">
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <a href="{{ url('/') }}" itemprop="item" class="hover:text-gray-700">
        <span itemprop="name">Beranda</span>
      </a>
      <meta itemprop="position" content="1" />
      <span class="mx-2">/</span>
    </li>
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <a href="{{ url('/umkm') }}" itemprop="item" class="hover:text-gray-700">
        <span itemprop="name">UMKM</span>
      </a>
      <meta itemprop="position" content="2" />
      <span class="mx-2">/</span>
    </li>
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <a href="{{ route('merchants.show', $merchant->slug) }}" itemprop="item" class="hover:text-gray-700">
        <span itemprop="name">{{ $merchant->name }}</span>
      </a>
      <meta itemprop="position" content="3" />
      <span class="mx-2">/</span>
    </li>
    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
      <span itemprop="name" class="text-deepgreen font-medium">Produk</span>
      <meta itemprop="position" content="4" />
    </li>
  </ol>
</nav>

<section class="bg-white py-16 px-4 sm:px-8 lg:px-16 xl:px-20">
  <div class="max-w-6xl mx-auto">
    <h2 class="text-3xl font-bold text-center text-deepgreen mb-12">
      Produk dari {{ $merchant->name }}
    </h2>

    @if($merchant->products->isEmpty())
      <div class="text-center text-gray-500 text-lg py-12">
        UMKM ini belum menambahkan produk apa pun.
      </div>
    @else
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" itemscope itemtype="https://schema.org/ItemList">
        @foreach($merchant->products as $product)
          <article class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition p-0" itemprop="itemListElement" itemscope itemtype="https://schema.org/Product">
            <meta itemprop="name" content="{{ $product->name }}">
            <meta itemprop="description" content="{{ $product->description }}">
            <div class="overflow-hidden rounded-t-xl">
              <img 
                src="{{ $product->image_url }}" 
                alt="{{ $product->name }}" 
                class="w-full aspect-square object-cover"
                itemprop="image"
                loading="lazy"
              >
            </div>
            <div class="p-4">
              <h3 class="font-semibold text-lg text-deepgreen mb-1">
                {{ $product->name }}
              </h3>
              <p class="text-sm text-gray-500 mb-2" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
                <span itemprop="priceCurrency" content="IDR">Rp</span>
                <span itemprop="price" content="{{ $product->price }}">{{ number_format($product->price, 0, ',', '.') }}</span>
              </p>
              <p class="text-sm text-gray-600 leading-relaxed">
                {{ Str::limit($product->description, 80) }}
              </p>
            </div>
          </article>
        @endforeach
      </div>
    @endif
  </div>
</section>
@endsection
