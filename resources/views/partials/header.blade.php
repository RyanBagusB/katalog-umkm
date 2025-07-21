<header class="sticky top-0 left-0 w-full z-50 bg-white shadow-sm" role="banner">
  <div class="flex items-center justify-between gap-4 px-4 py-4 sm:px-8 lg:px-16 xl:px-20">

    {{-- Logo --}}
    <a href="{{ route('home') }}"
       class="text-2xl font-extrabold tracking-tight text-[#1E1E1E] hover:text-black transition-all duration-200 whitespace-nowrap"
       title="Beranda Katalog UMKM Karangpoh">
      UMKM Karangpoh
    </a>

    {{-- Navigation (Desktop) --}}
    <nav class="hidden md:flex items-center gap-x-6 text-[15px] font-medium tracking-wide whitespace-nowrap"
         role="navigation" aria-label="Navigasi utama">
      <a href="{{ route('home') }}" class="hover:text-[#1E1E1E] transition"
         title="Halaman Beranda UMKM Karangpoh">
        Beranda
      </a>
      <a href="{{ route('about') }}" class="hover:text-[#1E1E1E] transition"
         title="Informasi Tentang Karangpoh">
        Tentang Kami
      </a>
      <a href="{{ route('merchants.list') }}" class="hover:text-[#1E1E1E] transition"
         title="Katalog Produk UMKM Karangpoh">
        UMKM
      </a>
      <a href="{{ route('news.index') }}" class="hover:text-[#1E1E1E] transition"
         title="Artikel dan Berita Karangpoh">
        Berita
      </a>
    </nav>

    {{-- CTA Button (Desktop) --}}
    <div class="hidden md:block flex-shrink-0">
      <a href="{{ route('contact') }}"
         class="bg-[#1E1E1E] text-white px-6 py-2.5 rounded-full text-sm font-semibold hover:bg-black transition"
         title="Hubungi Tim UMKM Karangpoh">
        Hubungi Kami
      </a>
    </div>

    {{-- Mobile Menu Button --}}
    <div class="md:hidden flex-shrink-0">
      <button id="mobileMenuButton" class="p-2 text-[#1E1E1E] focus:outline-none" aria-label="Buka menu navigasi">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
          <path d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
      </button>
    </div>
  </div>
</header>
