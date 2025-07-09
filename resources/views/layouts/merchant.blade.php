<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Merchant - UMKM Karangpoh')</title>
  <meta name="description" content="@yield('description', 'Halaman merchant untuk UMKM Karangpoh.')">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-gray-800 flex flex-col min-h-screen">

  {{-- Header --}}
  <header class="bg-[#0C3A2D] text-white">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-4 sm:px-8 py-4">
      <a href="{{ url('/') }}" class="text-xl font-semibold tracking-tight">UMKM Karangpoh</a>
      <nav class="hidden md:flex gap-6 text-sm">
        <a href="{{ url('/') }}" class="hover:text-green-300">Beranda</a>
        <a href="{{ url('/produk') }}" class="hover:text-green-300">Produk</a>
        <a href="{{ url('/tentang') }}" class="hover:text-green-300">Tentang</a>
        <a href="{{ url('/kontak') }}" class="hover:text-green-300">Kontak</a>
      </nav>
      <button class="md:hidden" id="menuToggle">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
      </button>
    </div>

    {{-- Mobile Menu --}}
    <div class="md:hidden hidden px-4 pb-4 space-y-2 text-sm" id="mobileMenu">
      <a href="{{ url('/') }}" class="block hover:text-green-300">Beranda</a>
      <a href="{{ url('/produk') }}" class="block hover:text-green-300">Produk</a>
      <a href="{{ url('/tentang') }}" class="block hover:text-green-300">Tentang</a>
      <a href="{{ url('/kontak') }}" class="block hover:text-green-300">Kontak</a>
    </div>
  </header>

  {{-- Main Content --}}
  <main class="flex-1">
    @yield('content')
  </main>

  {{-- Footer --}}
  <footer class="bg-[#0C3A2D] text-white mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 py-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      <div>
        <h3 class="font-bold text-lg mb-2">Tentang Kami</h3>
        <p class="text-sm text-gray-300">
          UMKM Rasa Lokal adalah usaha milik warga Karangpoh yang berfokus pada produk camilan sehat dan otentik.
        </p>
      </div>
      <div>
        <h3 class="font-bold text-lg mb-2">Navigasi</h3>
        <ul class="space-y-1 text-sm">
          <li><a href="{{ url('/') }}" class="hover:text-green-300">Beranda</a></li>
          <li><a href="{{ url('/produk') }}" class="hover:text-green-300">Produk</a></li>
          <li><a href="{{ url('/tentang') }}" class="hover:text-green-300">Tentang</a></li>
          <li><a href="{{ url('/kontak') }}" class="hover:text-green-300">Kontak</a></li>
        </ul>
      </div>
      <div>
        <h3 class="font-bold text-lg mb-2">Kontak</h3>
        <ul class="text-sm text-gray-300 space-y-1">
          <li>📍 Karangpoh, Tegalrejo</li>
          <li>📞 0857-1234-5678</li>
          <li>✉️ rasalokal@umkm.com</li>
          <li>📱 <a href="#" class="hover:underline">@rasalokal.id</a></li>
        </ul>
      </div>
    </div>
    <div class="text-center text-xs text-gray-400 py-4 border-t border-white/10">
      &copy; {{ date('Y') }} UMKM Karangpoh. Semua hak dilindungi.
    </div>
  </footer>

  {{-- Mobile menu toggle script --}}
  <script>
    document.getElementById('menuToggle')?.addEventListener('click', function () {
      const menu = document.getElementById('mobileMenu');
      menu.classList.toggle('hidden');
    });
  </script>

</body>
</html>
