<section class="px-4 sm:px-8 lg:px-16 xl:px-20 py-20 bg-white flex flex-col gap-y-12">
  <!-- Header -->
  <div class="flex justify-between items-center">
    <p class="text-2xl sm:text-3xl lg:text-4xl font-semibold text-[#1E1E1E]">Berita Terbaru</p>
    <a
      href="{{ url('/berita') }}"
      class="text-sm sm:text-base px-5 py-2 border border-[#CCC] rounded-full hover:bg-gray-100 transition-all"
    >
      Lihat Semua
    </a>
  </div>

  <!-- Content Grid -->
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 max-w-screen-xl mx-auto">
    <!-- Left Featured Article -->
    <a href="{{ url('/artikel/unggulan') }}" class="group block">
      <div class="flex flex-col gap-y-4">
        <div class="overflow-hidden rounded-2xl shadow-lg">
          <img
            src="{{ asset('images/auth-image.jpg') }}"
            alt="Berita unggulan"
            class="w-full aspect-[3/2] object-cover transform group-hover:scale-105 transition duration-500"
          />
        </div>
        <div>
          <h3 class="text-xl font-semibold text-[#1E1E1E]">Pelatihan Digitalisasi UMKM Karangpoh</h3>
          <p class="text-gray-500 mt-2">Kelurahan Karangpoh mengadakan pelatihan digital marketing untuk mendukung UMKM go online dan meningkatkan daya saing usaha lokal.</p>
        </div>
      </div>
    </a>

    <!-- Right Article List -->
    <div class="flex flex-col gap-4">
      @for ($i = 1; $i <= 3; $i++)
      <a href="{{ url('/artikel/' . $i) }}" class="group block">
        <div class="md:grid grid-cols-3 gap-4 items-start md:items-center lg:items-start">
          <div class="col-span-1 overflow-hidden rounded-2xl shadow-md">
            <img
              src="{{ asset('images/auth-image.jpg') }}"
              alt="Berita {{ $i }}"
              class="w-full aspect-[3/2] sm:aspect-[4/3] object-cover transform group-hover:scale-105 transition duration-500"
            />
          </div>
          <div class="col-span-2 flex flex-col justify-center">
            <h3 class="text-xl font-semibold text-[#1E1E1E]">Judul Berita UMKM {{ $i }}</h3>
            <p class="text-gray-500 text-sm sm:text-base mt-1">Deskripsi singkat berita UMKM yang menjelaskan kegiatan atau informasi terkait usaha warga Karangpoh.</p>
          </div>
        </div>
      </a>
      @endfor
    </div>
  </div>
</section>
