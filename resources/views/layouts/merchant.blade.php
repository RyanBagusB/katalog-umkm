<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', $merchant->name . ' - UMKM Karangpoh')</title>
  <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">

  <meta name="description" content="@yield('description', 'Profil UMKM ' . $merchant->name . ' dari Karangpoh.')">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-gray-800 flex flex-col min-h-screen">

  {{-- Header khusus UMKM --}}
  <header class="sticky top-0 left-0 w-full z-50 bg-white shadow-sm" role="banner">
    <div class="flex md:grid justify-between md:[grid-template-columns:1fr_auto_1fr] items-center gap-4 px-4 py-4 sm:px-8 lg:px-16 xl:px-20">
      
      {{-- Logo UMKM --}}
      <a href="{{ route('merchants.show', $merchant->slug) }}"
        class="text-2xl font-extrabold tracking-tight text-[#1E1E1E] hover:text-black transition duration-200 whitespace-nowrap"
        title="Beranda {{ $merchant->name }}">
        {{ $merchant->name }}
      </a>

      {{-- Navigation (Desktop) --}}
      <nav class="hidden md:flex items-center gap-x-6 text-[15px] font-medium tracking-wide whitespace-nowrap justify-center"
          role="navigation" aria-label="Navigasi utama UMKM">
        <a href="{{ route('merchants.show', $merchant->slug) }}" class="hover:text-[#1E1E1E] transition">Beranda</a>
        <a href="{{ route('merchants.products', $merchant->slug) }}" class="hover:text-[#1E1E1E] transition">Semua Produk</a>
        <a href="{{ route('merchants.contact', $merchant->slug) }}" class="hover:text-[#1E1E1E] transition">Kontak</a>
      </nav>

      {{-- CTA Button (Desktop) --}}
      <div class="hidden md:flex justify-end">
        <a href="{{ route('merchants.contact', $merchant->slug) }}"
          class="bg-[#1E1E1E] text-white px-6 py-2.5 rounded-full text-sm font-semibold hover:bg-black transition">
          Hubungi Kami
        </a>
      </div>

      {{-- Mobile Menu Button --}}
      <div class="md:hidden">
        <button id="mobileMenuButton" class="p-2 text-[#1E1E1E]" aria-label="Buka menu navigasi">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
              viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
        </button>
      </div>
    </div>
  </header>

  {{-- Mobile Menu --}}
  <nav id="mobileMenu" class="fixed top-[64px] inset-x-0 hidden bg-white shadow-md md:hidden transition-all duration-300">
    <ul class="flex flex-col gap-y-3 py-5 text-[15px] font-medium tracking-wide text-[#1E1E1E] px-4 sm:px-6">
      <li><a href="{{ route('merchants.show', $merchant->slug) }}" class="block px-4 py-2 rounded hover:bg-[#F5F5F5]">Beranda</a></li>
      <li><a href="{{ route('merchants.products', $merchant->slug) }}" class="block px-4 py-2 rounded hover:bg-[#F5F5F5]">Semua Produk</a></li>
      <li class="pt-2 px-4">
        <a href="{{ route('merchants.contact', $merchant->slug) }}" class="block w-full text-center bg-[#1E1E1E] text-white px-4 py-2.5 rounded-full hover:bg-black transition-all duration-200">Hubungi Kami</a>
      </li>
    </ul>
  </nav>

  {{-- Main Content --}}
  <main class="flex-1">
    @yield('content')
  </main>

  {{-- Footer --}}
  <footer class="bg-[#1E1E1E] text-white px-4 sm:px-8 lg:px-16 xl:px-20 py-8">
    <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
      {{-- Brand & Deskripsi --}}
      <div class="sm:col-span-2 lg:col-span-1">
        <a href="{{ route('merchants.show', $merchant->slug) }}" class="text-2xl font-extrabold tracking-wide text-white">
          {{ $merchant->name }}
        </a>
        <p class="mt-4 text-sm text-gray-300 leading-relaxed max-w-sm">
          Profil resmi UMKM {{ $merchant->name }}. Temukan produk lokal berkualitas dan hubungi kami untuk kerjasama.
        </p>
      </div>

      {{-- Navigasi --}}
      <div>
        <h4 class="text-base font-semibold mb-4">Navigasi</h4>
        <ul class="space-y-2 text-sm">
          <li><a href="{{ route('merchants.show', $merchant->slug) }}" class="text-gray-300 hover:text-white transition">Beranda</a></li>
          <li><a href="{{ route('merchants.products', $merchant->slug) }}" class="text-gray-300 hover:text-white transition">Semua Produk</a></li>
          <li><a href="{{ route('merchants.contact', $merchant->slug) }}" class="text-gray-300 hover:text-white transition">Kontak</a></li>
        </ul>
      </div>

      {{-- Kontak --}}
      <div>
        <h4 class="text-base font-semibold mb-4">Kontak</h4>
        <ul class="space-y-2 text-sm text-gray-300">
          @if($merchant->contact_address)<li>{{ $merchant->contact_address }}</li>@endif
          @if($merchant->contact_phone)<li>Telp: {{ $merchant->contact_phone }}</li>@endif
          @if($merchant->contact_email)<li>Email: {{ $merchant->contact_email }}</li>@endif
        </ul>
      </div>
    </div>

    <div class="mt-12 border-t border-white/10 pt-6 text-sm text-center text-gray-400">
      © {{ date('Y') }} {{ $merchant->name }}. Semua hak dilindungi.
    </div>
  </footer>

  <script>
    document.getElementById('mobileMenuButton').addEventListener('click', function () {
      const menu = document.getElementById('mobileMenu');
      menu.classList.toggle('hidden');
    });
  </script>

</body>
</html>
