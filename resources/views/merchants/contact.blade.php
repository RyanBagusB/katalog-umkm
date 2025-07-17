@extends('layouts.merchant')

@section('title', 'Kontak ' . $merchant->name)
@section('description', 'Hubungi ' . $merchant->name . ' untuk informasi produk, pemesanan, atau kerja sama lebih lanjut.')

@section('content')
<section class="px-4 md:px-8 lg:px-16 xl:px-20 py-10 md:py-16">

  {{-- Breadcrumb --}}
  <nav class="bg-white py-6 text-sm mb-8" aria-label="Breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
    <ol class="flex flex-wrap gap-1 text-gray-500">
      <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a href="{{ url('/') }}" itemprop="item" class="hover:text-gray-700">
          <span itemprop="name">Beranda</span>
        </a>
        <meta itemprop="position" content="1" />
        <span class="mx-2">/</span>
      </li>
      <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a href="{{ url('/umkm') }}" itemprop="item" class="hover:text-gray-700">
          <span itemprop="name">UMKM</span>
        </a>
        <meta itemprop="position" content="2" />
        <span class="mx-2">/</span>
      </li>
      <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <a href="{{ route('merchants.show', $merchant->slug) }}" itemprop="item" class="hover:text-gray-700">
          <span itemprop="name">{{ $merchant->name }}</span>
        </a>
        <meta itemprop="position" content="3" />
        <span class="mx-2">/</span>
      </li>
      <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
        <span itemprop="name" class="text-deepgreen font-medium">Kontak</span>
        <meta itemprop="position" content="4" />
      </li>
    </ol>
  </nav>

  {{-- Kontak Utama --}}
  <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    @if($merchant->contact_email)
    <div class="flex flex-col p-8 bg-[#ECECEC] rounded-3xl gap-y-4">
      <h2 class="text-2xl font-semibold flex items-center gap-x-2">
        📧 Email
      </h2>
      <p>{{ $merchant->contact_email }}</p>
    </div>
    @endif

    @if($merchant->contact_phone)
    <div class="flex flex-col p-8 bg-[#ECECEC] rounded-3xl gap-y-4">
      <h2 class="text-2xl font-semibold flex items-center gap-x-2">
        📞 Telepon
      </h2>
      <p>{{ $merchant->contact_phone }}</p>
    </div>
    @endif

    @if($merchant->contact_address)
    <div class="flex flex-col p-8 bg-[#ECECEC] rounded-3xl gap-y-4">
      <h2 class="text-2xl font-semibold flex items-center gap-x-2">
        📍 Alamat
      </h2>
      <p>{{ $merchant->contact_address }}</p>
    </div>
    @endif
  </div>

  {{-- Form Kontak dan Gambar --}}
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
    <div class="flex flex-col p-8 bg-[#ECECEC] rounded-[40px] gap-y-4 aspect-video">
      <h2 class="text-3xl font-semibold mb-4">
        Hubungi {{ $merchant->name }}
      </h2>
      <form id="waForm" class="flex flex-col gap-y-4" onsubmit="return sendToWhatsApp(event)">
        <div>
          <label for="nama" class="block text-sm font-medium">Nama</label>
          <input type="text" id="nama" name="nama" required
            class="w-full mt-1 px-4 py-2 rounded-3xl border border-transparent focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>

        <div>
          <label for="nomor" class="block text-sm font-medium">Nomor HP</label>
          <input type="tel" id="nomor" name="nomor" required
            class="w-full mt-1 px-4 py-2 rounded-3xl border border-transparent focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="08xxxxxxxxxx" />
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

    <div class="flex flex-col">
      <img
        src="{{ $merchant->contact_image ? asset('storage/'.$merchant->contact_image) : asset('images/auth-image.jpg') }}"
        alt="Kontak {{ $merchant->name }}"
        class="w-full h-full object-cover rounded-[40px] shadow aspect-video"
      />
    </div>
  </div>
</section>

<script>
  function sendToWhatsApp(event) {
    event.preventDefault();

    const nama = document.getElementById('nama').value.trim();
    const nomor = document.getElementById('nomor').value.trim();
    const pesan = document.getElementById('pesan').value.trim();

    const tujuan = '{{ $merchant->contact_phone ? preg_replace("/[^0-9]/", "", $merchant->contact_phone) : '' }}';

    if (!tujuan) {
      alert('Nomor WhatsApp tidak tersedia.');
      return false;
    }

    const text = `*Pesan untuk {{ $merchant->name }}*\n\n` +
                 `👤 Nama: ${nama}\n` +
                 `📞 Nomor HP: ${nomor}\n` +
                 `💬 Pesan:\n${pesan}`;

    const encoded = encodeURIComponent(text);
    const waUrl = `https://wa.me/${tujuan}?text=${encoded}`;

    window.open(waUrl, '_blank');
    return false;
  }
</script>
@endsection
