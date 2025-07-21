<nav id="mobileMenu" class="fixed top-16 w-full hidden md:hidden bg-white shadow-lg transition-all duration-300">
  <ul class="flex flex-col gap-y-3 py-5 text-[15px] font-medium tracking-wide text-[#1E1E1E] sm:px-6 md:px-8">
    <li>
      <a href="{{ route('home') }}" class="block px-4 py-2 rounded hover:bg-[#F5F5F5] transition-all duration-200">
        Beranda
      </a>
    </li>
    <li>
      <a href="{{ route('about') }}" class="block px-4 py-2 rounded hover:bg-[#F5F5F5] transition-all duration-200">
        Tentang Kami
      </a>
    </li>
    <li>
      <a href="{{ route('merchants.list') }}" class="block px-4 py-2 rounded hover:bg-[#F5F5F5] transition-all duration-200">
        UMKM
      </a>
    </li>
    <li>
      <a href="{{ route('news.index') }}" class="block px-4 py-2 rounded hover:bg-[#F5F5F5] transition-all duration-200">
        Berita
      </a>
    </li>
    <li class="pt-2 px-4">
      <a href="{{ route('contact') }}" class="block w-full text-center bg-[#1E1E1E] text-white px-4 py-2.5 rounded-full hover:bg-black transition-all duration-200">
        Hubungi Kami
      </a>
    </li>
  </ul>
</nav>
