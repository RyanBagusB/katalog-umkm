<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        {{-- Header --}}
        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-100">Dashboard</h1>
            <p class="text-gray-500 dark:text-gray-400 mt-1">Selamat datang kembali, pantau data bisnismu di sini.</p>
        </div>

        {{-- Overview Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-10">
            {{-- Total UMKM --}}
            <div class="flex items-center p-5 bg-white dark:bg-gray-800 rounded-xl shadow">
                <div class="p-3 rounded-full bg-indigo-100 text-indigo-600 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7l1.664-2.5A1 1 0 015.507 4h12.986a1 1 0 01.843.5L21 7M4 7h16v11a1 1 0 01-1 1H5a1 1 0 01-1-1V7z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Total UMKM</p>
                    <p class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ $totalMerchants }}</p>
                </div>
            </div>

            {{-- Total Produk --}}
            <div class="flex items-center p-5 bg-white dark:bg-gray-800 rounded-xl shadow">
                <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 13V9a1 1 0 00-1-1h-3l-2-3H10L8 8H5a1 1 0 00-1 1v4m16 0h-3m-10 0H4m6 0v6m4-6v6" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Total Produk</p>
                    <p class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ $totalProducts }}</p>
                </div>
            </div>

            {{-- Total Berita --}}
            <div class="flex items-center p-5 bg-white dark:bg-gray-800 rounded-xl shadow">
                <div class="p-3 rounded-full bg-yellow-100 text-yellow-600 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l6 6v8a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Total Berita</p>
                    <p class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ $totalNews }}</p>
                </div>
            </div>
        </div>

        {{-- Data Terbaru --}}
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
            {{-- UMKM Terbaru --}}
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow">
                <header class="px-5 py-4 border-b border-gray-100 dark:border-gray-700/60">
                    <h2 class="font-semibold text-gray-800 dark:text-gray-100">UMKM Terbaru</h2>
                </header>
                <div class="p-3 overflow-x-auto">
                    <table class="table-auto w-full text-sm">
                        <thead class="text-xs font-semibold uppercase text-gray-400 dark:text-gray-500 bg-gray-50 dark:bg-gray-700/50">
                            <tr>
                                <th class="p-2 text-left">Nama</th>
                                <th class="p-2 text-left">Status</th>
                                <th class="p-2 text-left">Dibuat</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-700/60">
                            @forelse($latestMerchants as $merchant)
                                <tr>
                                    <td class="p-2 font-medium text-gray-800 dark:text-gray-100">{{ $merchant->name }}</td>
                                    <td class="p-2">
                                        @if($merchant->is_active)
                                            <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700">Aktif</span>
                                        @else
                                            <span class="px-2 py-1 text-xs rounded-full bg-gray-200 text-gray-700">Nonaktif</span>
                                        @endif
                                    </td>
                                    <td class="p-2 text-gray-500 dark:text-gray-400">{{ $merchant->created_at->format('d M Y') }}</td>
                                </tr>
                            @empty
                                <tr><td class="p-3 text-center text-gray-500" colspan="3">Belum ada data.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Produk Terbaru --}}
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow">
                <header class="px-5 py-4 border-b border-gray-100 dark:border-gray-700/60">
                    <h2 class="font-semibold text-gray-800 dark:text-gray-100">Produk Terbaru</h2>
                </header>
                <div class="p-3 overflow-x-auto">
                    <table class="table-auto w-full text-sm">
                        <thead class="text-xs font-semibold uppercase text-gray-400 dark:text-gray-500 bg-gray-50 dark:bg-gray-700/50">
                            <tr>
                                <th class="p-2 text-left">Nama Produk</th>
                                <th class="p-2 text-left">UMKM</th>
                                <th class="p-2 text-left">Harga</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-700/60">
                            @forelse($latestProducts as $product)
                                <tr>
                                    <td class="p-2 font-medium text-gray-800 dark:text-gray-100">{{ $product->name }}</td>
                                    <td class="p-2 text-gray-600 dark:text-gray-400">{{ $product->merchant->name ?? '-' }}</td>
                                    <td class="p-2 text-gray-800 dark:text-gray-100">Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                                </tr>
                            @empty
                                <tr><td class="p-3 text-center text-gray-500" colspan="3">Belum ada data.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
