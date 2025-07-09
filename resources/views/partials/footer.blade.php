<footer class="text-white px-4 sm:px-8 lg:px-16 xl:px-20 py-16">
  <div class="bg-[#1E1E1E] p-10 rounded-[30px]">

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Logo & Deskripsi -->
      <div class="sm:col-span-2 lg:col-span-1">
        <a href="{{ url('/') }}" class="text-2xl font-bold tracking-wide text-white">Karangpoh</a>
        <p class="text-sm text-white mt-4 leading-relaxed max-w-sm">
          Menghubungkan Anda dengan properti impian dan solusi UMKM terbaik di sekitar Anda. Kami berkomitmen menghadirkan layanan profesional dan terpercaya.
        </p>
      </div>

      <!-- Navigasi -->
      <div>
        <h4 class="text-base font-semibold mb-4">Navigasi</h4>
        <ul class="flex flex-col gap-2">
          <li><a href="{{ url('/') }}" class="text-sm text-gray-300 hover:text-white transition">Beranda</a></li>
          <li><a href="{{ url('/tentang') }}" class="text-sm text-gray-300 hover:text-white transition">Tentang Kami</a></li>
          <li><a href="{{ url('/umkm') }}" class="text-sm text-gray-300 hover:text-white transition">UMKM</a></li>
          <li><a href="{{ url('/artikel') }}" class="text-sm text-gray-300 hover:text-white transition">Artikel</a></li>
          <li><a href="{{ url('/kontak') }}" class="text-sm text-gray-300 hover:text-white transition">Kontak</a></li>
        </ul>
      </div>

      <!-- Kontak -->
      <div>
        <h4 class="text-base font-semibold mb-4">Kontak</h4>
        <ul class="flex flex-col gap-2 text-sm text-gray-300">
          <li>Karangpoh, Tegalrejo, Magelang</li>
          <li>Telp: 0821-0000-0000</li>
          <li>Email: info@karangpoh.com</li>
        </ul>
      </div>
    </div>
    
    <!-- Copyright -->
    <div class="mt-10 text-sm text-gray-400">
      © {{ date('Y') }} Karangpoh. All rights reserved.
    </div>
  </div>
</footer>
