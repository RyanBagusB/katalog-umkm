<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-4xl mx-auto">
        {{-- Breadcrumb --}}
        <nav class="text-sm mb-4 text-gray-500 dark:text-gray-400">
            <a href="{{ route('merchant.products.index') }}" class="hover:underline">Produk</a>
            <span class="mx-2">/</span>
            <span>{{ $product->name }}</span>
        </nav>

        {{-- Header --}}
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
                Detail Produk
            </h1>
        </div>

        {{-- Card --}}
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6">
            <div class="flex flex-col md:flex-row gap-6">
                @if($product->image)
                    <div class="flex-shrink-0 w-full md:w-56">
                        <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="rounded-md w-full h-auto object-cover">
                    </div>
                @endif

                <div class="flex-1 space-y-4">
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">
                        {{ $product->name }}
                    </h2>

                    <p class="text-base text-gray-700 dark:text-gray-300 leading-relaxed">
                        {{ $product->description ?: 'Tidak ada deskripsi.' }}
                    </p>

                    <p class="text-xl font-bold text-gray-800 dark:text-gray-100">
                        Rp{{ number_format($product->price, 0, ',', '.') }}
                    </p>

                    <div>
                        @if ($product->status === 'pending')
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800">
                                Menunggu Persetujuan
                            </span>
                        @elseif ($product->status === 'approved')
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">
                                Disetujui
                            </span>
                        @else
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800">
                                Ditolak
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Riwayat Revisi --}}
        <div class="mt-10">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">Riwayat Revisi</h2>

            @if($revisions->count())
                <div class="space-y-4">
                    @foreach($revisions as $revision)
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-4 flex flex-col md:flex-row gap-4">
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-1">
                                    <h3 class="font-medium text-gray-800 dark:text-gray-100">
                                        {{ $revision->name }}
                                    </h3>
                                    @if($revision->status === 'pending')
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800">
                                            Menunggu Persetujuan
                                        </span>
                                    @elseif($revision->status === 'approved')
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">
                                            Disetujui
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800">
                                            Ditolak
                                        </span>
                                    @endif
                                </div>
                                <p class="text-sm text-gray-700 dark:text-gray-300">
                                    {{ $revision->description ?: 'Tidak ada deskripsi.' }}
                                </p>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                    Harga: Rp{{ number_format($revision->price,0,',','.') }}
                                </p>
                            </div>
                            @if($revision->image)
                                <div class="w-full md:w-24 flex-shrink-0">
                                    <img src="{{ asset('storage/'.$revision->image) }}" alt="Revisi" class="rounded-md w-full h-auto object-cover">
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 dark:text-gray-400">Belum ada revisi.</p>
            @endif
        </div>
    </div>
</x-app-layout>
