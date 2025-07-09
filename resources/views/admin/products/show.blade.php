<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-4xl mx-auto">

        {{-- Breadcrumb --}}
        <nav class="flex items-center text-sm mb-6 space-x-1 text-gray-500 dark:text-gray-400">
            <a href="{{ route('admin.products.index') }}" class="hover:underline">Persetujuan Produk</a>
            <svg class="w-4 h-4 mx-1 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path d="M7.05 4.05a1 1 0 0 1 1.414 0L14 9.586a2 2 0 0 1 0 2.828l-5.536 5.536a1 1 0 1 1-1.414-1.414L12.172 11 7.05 5.879a1 1 0 0 1 0-1.414z"/></svg>
            <span>{{ $product->name }}</span>
        </nav>

        {{-- Header --}}
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-extrabold text-gray-800 dark:text-gray-100">
                Detail Produk
            </h1>
        </div>

        {{-- Card --}}
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow divide-y divide-gray-200 dark:divide-gray-700">
            <div class="flex flex-col md:flex-row gap-6 p-6">
                @if($product->image)
                    <div class="flex-shrink-0 w-full md:w-56">
                        <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="rounded-lg w-full h-auto object-cover ring-1 ring-gray-200 dark:ring-gray-700">
                    </div>
                @endif

                <div class="flex-1 space-y-4">
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">
                        {{ $product->name }}
                    </h2>

                    <p class="text-base text-gray-700 dark:text-gray-300 leading-relaxed whitespace-pre-line">
                        {{ $product->description ?: 'Tidak ada deskripsi.' }}
                    </p>

                    <p class="text-xl font-bold text-gray-800 dark:text-gray-100">
                        Rp{{ number_format($product->price, 0, ',', '.') }}
                    </p>

                    <div class="flex items-center gap-2 flex-wrap">
                        @if ($product->status === 'pending')
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-yellow-50 text-yellow-800 border border-yellow-200">
                                Menunggu Persetujuan
                            </span>
                        @elseif ($product->status === 'approved')
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-50 text-green-800 border border-green-200">
                                Disetujui
                            </span>
                        @else
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-50 text-red-800 border border-red-200">
                                Ditolak
                            </span>
                        @endif

                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-50 text-gray-700 dark:bg-gray-700 dark:text-gray-200 border border-gray-200 dark:border-gray-600">
                            Merchant: {{ $product->merchant->name ?? '-' }}
                        </span>
                    </div>

                    @if ($product->rejection_reason)
                        <div class="mt-2">
                            <p class="text-sm text-red-600 dark:text-red-400">
                                <strong>Alasan Penolakan:</strong> {{ $product->rejection_reason }}
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Action Buttons --}}
        <div class="mt-6 flex gap-4 flex-wrap">
            @if($product->status !== 'approved')
                <form action="{{ route('admin.products.approve', $product) }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-md bg-green-600 hover:bg-green-700 text-white text-sm font-medium shadow">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                        Setujui Produk
                    </button>
                </form>
            @endif

            @if($product->status !== 'rejected')
                <div x-data="{ open: false }">
                    <button @click="open = true"
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-md bg-red-600 hover:bg-red-700 text-white text-sm font-medium shadow">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        Tolak Produk
                    </button>

                    {{-- Modal --}}
                    <div x-show="open" x-cloak
                        class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-lg"
                            @click.outside="open = false" @keydown.escape.window="open = false">
                            <h2 class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-100">
                                Alasan Penolakan
                            </h2>
                            <form action="{{ route('admin.products.reject', $product) }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <textarea name="rejection_reason" rows="4" required
                                        class="w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm dark:bg-gray-700 dark:text-white focus:ring focus:ring-violet-500"
                                        placeholder="Tuliskan alasan penolakan..."></textarea>
                                    @error('rejection_reason')
                                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="flex justify-end space-x-2">
                                    <button type="button" @click="open = false"
                                        class="inline-flex items-center px-4 py-2 rounded-md bg-white border border-gray-300 dark:border-gray-600 text-gray-800 dark:text-gray-100 hover:bg-gray-50 text-sm font-medium">
                                        Batal
                                    </button>
                                    <button type="submit"
                                        class="inline-flex items-center px-4 py-2 rounded-md bg-red-600 hover:bg-red-700 text-white text-sm font-medium">
                                        Tolak Produk
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        {{-- Back link --}}
        <div class="mt-4">
            <a href="{{ route('admin.products.index') }}"
                class="inline-flex items-center text-sm text-gray-600 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-200">
                &larr; Kembali ke daftar produk
            </a>
        </div>
    </div>
</x-app-layout>
