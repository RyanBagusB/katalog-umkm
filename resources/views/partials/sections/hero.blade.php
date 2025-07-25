<section class="px-4 sm:px-8 lg:px-16 xl:px-20 py-8 sm:py-12 md:py-20 lg:py-28 bg-white">
    <!-- Heading & Description -->
    <div class="flex flex-col lg:flex-row gap-y-5 md:gap-y-10 md:gap-x-20 mb-10 sm:max-w-xl md:max-w-full">
        <div class="flex-1">
            <h2 class="font-semibold text-4xl sm:text-5xl lg:text-[52px] leading-tight tracking-tight text-[#1E1E1E]">
                Jelajahi UMKM Unggulan Karangpoh
            </h2>
        </div>
        <div class="flex-1 md:flex-[1.2] lg:flex-1">
            <p class="text-[17px] leading-relaxed text-[#1E1E1E] md:max-w-xl">
                Temukan berbagai produk lokal dari pelaku UMKM Karangpoh mulai dari kuliner khas hingga kerajinan
                kreatif. Kami hadir untuk mendukung pengusaha lokal tumbuh melalui inovasi dan digitalisasi.
            </p>
        </div>
    </div>

    <!-- Image Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-y-4 md:gap-x-4 mx-auto">
        <div>
            <img src="{{ asset('images/food/getuk.webp') }}" alt="UMKM unggulan Karangpoh"
                class="w-full aspect-[6/4] lg:aspect-[7/8] object-cover rounded-2xl sm:rounded-3xl shadow-lg sm:shadow-xl"
                loading="lazy" />
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="md:col-span-2">
                <img src="{{ asset('images/food/sinom.jpg') }}" alt="Kegiatan UMKM Karangpoh"
                    class="w-full aspect-[16/9] md:aspect-[6/4] lg:aspect-[16/9] object-cover rounded-2xl sm:rounded-3xl shadow-lg sm:shadow-xl"
                    loading="lazy" />
            </div>
            <img src="{{ asset('images/food/sosis.jpg') }}" alt="Produk lokal UMKM"
                class="w-full aspect-[16/9] lg:aspect-[7/8] object-cover rounded-2xl sm:rounded-3xl shadow-lg sm:shadow-xl"
                loading="lazy" />
            <div class="relative bg-cover bg-center aspect-[16/9] lg:aspect-[7/8] rounded-2xl sm:rounded-3xl p-6 flex flex-col group"
                style="background-image: url('{{ asset('images/food/kue1.webp') }}');">
                <div class="absolute inset-0 bg-black opacity-50 rounded-2xl sm:rounded-3xl group-hover:opacity-60 transition-opacity duration-300"></div>
                <div class="relative z-20 group-hover:text-yellow-500 transition-colors duration-300">
                    <h2 class="text-4xl font-bold text-white mb-2 group-hover:text-white">140+</h2>
                    <p class="text-lg text-white mb-4 group-hover:text-white">UMKM Terdaftar</p>
                    <p class="text-white text-sm leading-relaxed group-hover:text-white">
                        UMKM Karangpoh berkembang melalui pelatihan, digitalisasi, dan promosi. Ayo dukung dan cintai
                        produk lokal!
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
