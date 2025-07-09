<section class="px-4 sm:px-8 lg:px-16 xl:px-20 py-14 bg-white flex flex-col gap-8">
  <!-- Judul Bagian -->
  <div class="flex justify-between items-center">
    <p class="text-2xl sm:text-3xl lg:text-4xl font-semibold text-[#1E1E1E]">
      Daftar UMKM Terbaru
    </p>
    <a
      href="{{ url('/umkm') }}"
      class="text-sm sm:text-base px-5 py-2 border border-[#CCC] rounded-full hover:bg-gray-100 transition-all"
    >
      Lihat Semua
    </a>
  </div>

  <!-- Grid UMKM -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 max-w-screen-xl mx-auto">
    @for ($i = 0; $i < 4; $i++)
      <a href="{{ url('/umkm/' . $i) }}" class="group block">
        <div class="flex flex-col gap-y-4">
          <div class="overflow-hidden rounded-2xl shadow-md group-hover:shadow-lg transition duration-300">
            <img
              src="{{ asset('images/auth-image.jpg') }}"
              alt="UMKM Karangpoh {{ $i + 1 }}"
              class="w-full aspect-[6/4] md:aspect-square object-cover transform group-hover:scale-105 transition duration-500"
              loading="lazy"
            />
          </div>
          <p class="text-lg font-medium text-[#1E1E1E] truncate">UMKM Karangpoh {{ $i + 1 }}</p>
        </div>
      </a>
    @endfor
  </div>
</section>
