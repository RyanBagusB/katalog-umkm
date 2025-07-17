<section class="px-6 sm:px-8 lg:px-16 xl:px-20 py-20 bg-white">
    <div class="flex flex-col lg:flex-row gap-8 items-center lg:items-stretch mx-auto">

        <div class="lg:w-1/2 flex flex-col bg-gray-100 rounded-2xl p-8 sm:p-12 h-[35rem] justify-center">
            <div class="flex flex-col gap-6 items-center">
                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-semibold text-gray-900">
                    Dukung Produk Lokal Hari Ini!
                </h2>
                <p class="text-base sm:text-lg text-gray-700 leading-relaxed">
                    Mari bersama memajukan perekonomian warga dengan mencintai dan menggunakan produk UMKM Karangpoh.
                    Temukan usaha terbaik, beli langsung dari pelaku lokal, dan jadilah bagian dari gerakan ekonomi
                    mandiri di lingkungan kita.
                </p>
            </div>
            <div class="pt-6">
                <a href="{{ url('/kontak') }}"
                    class="inline-block bg-gray-800 text-white text-base font-medium px-8 py-4 rounded-full hover:bg-gray-900 transition duration-300 ease-in-out">
                    Hubungi Kami
                </a>
            </div>
        </div>


        <!-- Image -->
        <div class="lg:w-1/2 mt-8 lg:mt-0 h-[35rem] flex items-stretch">
            <img src="{{ asset('images/food/cont.jpg') }}" alt="UMKM Karangpoh"
                class="w-full object-cover rounded-2xl shadow-xl" loading="lazy" />
        </div>
    </div>
</section>
