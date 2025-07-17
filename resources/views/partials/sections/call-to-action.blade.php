<section class="px-4 sm:px-8 lg:px-16 xl:px-20 py-20 bg-white">
  <div class="flex flex-col lg:flex-row gap-4 items-stretch mx-auto">
    
    <!-- CTA Box -->
    <div class="lg:w-1/2 flex flex-col bg-[#ECECEC] rounded-[40px] px-6 sm:px-10 py-12 sm:py-16">
      <div class="flex flex-col gap-y-6">
        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-semibold leading-tight text-[#1E1E1E]">
          Dukung Produk Lokal Hari Ini!
        </h2>
        <p class="text-[#1E1E1E] text-base leading-relaxed">
          Mari bersama memajukan perekonomian warga dengan mencintai dan menggunakan produk UMKM Karangpoh. Temukan usaha terbaik, beli langsung dari pelaku lokal, dan jadilah bagian dari gerakan ekonomi mandiri di lingkungan kita.
        </p>
      </div>
      <div class="pt-6">
        <a href="{{ url('/kontak') }}"
           class="inline-block bg-[#2C2C2C] text-white text-sm sm:text-base font-medium px-6 py-3 rounded-full hover:bg-black transition">
          Hubungi Kami
        </a>
      </div>
    </div>

    <!-- Image -->
    <div class="lg:w-1/2">
      <img
        src="{{ asset('images/auth-image.jpg') }}"
        alt="UMKM Karangpoh"
        class="w-full aspect-video lg:aspect-auto h-full object-cover rounded-[40px] shadow-lg"
        loading="lazy"
      />
    </div>
  </div>
</section>
