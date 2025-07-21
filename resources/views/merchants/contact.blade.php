@extends('layouts.merchant')

@section('title', 'Kontak ' . $merchant->name . ' - Katalog UMKM Karangpoh')
@section('description', 'Hubungi ' . $merchant->name . ' untuk informasi produk, layanan, dan penawaran terbaik dari UMKM ini.')

@section('content')
<section class="px-4 md:px-8 lg:px-16 xl:px-20 py-10 md:py-16">
    {{-- Breadcrumbs --}}
    <nav class="text-sm mb-6" aria-label="breadcrumb">
        <ol class="flex items-center space-x-2">
            <li>
                <a href="{{ route('home') }}" class="text-[#1E1E1E] hover:underline" itemprop="item">
                    <span itemprop="name">Beranda</span>
                </a>
                <meta itemprop="position" content="1">
            </li>
            <li>
                <span class="text-gray-400">/</span>
            </li>
            <li>
                <a href="{{ route('merchants.list') }}" class="text-[#1E1E1E] hover:underline" itemprop="item">
                    <span itemprop="name">UMKM</span>
                </a>
                <meta itemprop="position" content="2">
            </li>
            <li>
                <span class="text-gray-400">/</span>
            </li>
                <li class="text-gray-500" aria-current="page" itemprop="item">
                <span itemprop="name">Kontak {{ $merchant->name }}</span>
                <meta itemprop="position" content="3">
            </li>
        </ol>
    </nav>

    {{-- Informasi Kontak --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="flex flex-col p-8 bg-[#ECECEC] rounded-3xl gap-y-4">
            <h2 class="text-2xl font-semibold flex items-center gap-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                </svg>
                Email
            </h2>
            <p>{{ $merchant->contact_email ?? 'Tidak tersedia' }}</p>
        </div>

        <div class="flex flex-col p-8 bg-[#ECECEC] rounded-3xl gap-y-4">
            <h2 class="text-2xl font-semibold flex items-center gap-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                </svg>
                Telepon
            </h2>
            <p>{{ $merchant->contact_phone ?? 'Tidak tersedia' }}</p>
        </div>

        <div class="flex flex-col p-8 bg-[#ECECEC] rounded-3xl gap-y-4">
            <h2 class="text-2xl font-semibold flex items-center gap-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                </svg>
                Alamat
            </h2>
            <p>{{ $merchant->contact_address ?? 'Alamat belum diisi' }}</p>
        </div>
    </div>

    {{-- Form Kontak dan Gambar --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
        {{-- Form Kontak --}}
        <div class="flex flex-col p-8 bg-[#ECECEC] rounded-[40px] gap-y-4 aspect-video">
            <h2 class="text-4xl font-semibold flex items-center gap-x-2">
                Hubungi {{ $merchant->name }}
            </h2>
            <form id="waForm" class="flex flex-col gap-y-4" onsubmit="return sendToWhatsApp(event)">
                <div>
                    <label for="nama" class="block text-sm font-medium">Nama Anda</label>
                    <input type="text" id="nama" name="nama" required
                        class="w-full mt-1 px-4 py-2 rounded-3xl border border-transparent focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>

                <div>
                    <label for="pesan" class="block text-sm font-medium">Pesan</label>
                    <textarea id="pesan" name="pesan" rows="6" required
                        class="w-full mt-1 px-4 py-2 rounded-3xl border border-transparent focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>

                <button type="submit"
                    class="bg-[#2C2C2C] text-white px-6 py-3 rounded-full text-base transition hover:opacity-90">
                    Kirim via WhatsApp
                </button>
            </form>
        </div>

        {{-- Gambar UMKM (pakai banner atau photo) --}}
        <div class="flex flex-col">
            <img src="{{ $merchant->banner_image ? asset('storage/'.$merchant->banner_image) : asset('images/default-umkm.jpg') }}"
                alt="Gambar dari {{ $merchant->name }}"
                class="w-full h-full object-cover rounded-[40px] shadow aspect-video" />
        </div>
    </div>
</section>

<script>
    function sendToWhatsApp(event) {
        event.preventDefault();

        const nama = document.getElementById('nama').value.trim();
        const pesan = document.getElementById('pesan').value.trim();
        const tujuan = '{{ preg_replace("/[^0-9]/", "", $merchant->contact_phone) ?: "6281234567890" }}';

        const text = `*Kontak UMKM {{ $merchant->name }}*\n\n` +
            `Nama: ${nama}\n` +
            `Pesan:\n${pesan}`;

        const encoded = encodeURIComponent(text);
        const waUrl = `https://wa.me/${tujuan}?text=${encoded}`;
        window.open(waUrl, '_blank');
        return false;
    }
</script>
@endsection
