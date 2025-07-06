<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-4xl mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-100">
                Detail Produk
            </h1>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <dl class="divide-y divide-gray-200 dark:divide-gray-700">
                <div class="py-4 flex flex-col sm:flex-row sm:justify-between">
                    <dt class="font-medium text-gray-500 dark:text-gray-400">Nama Produk</dt>
                    <dd class="text-gray-900 dark:text-gray-100">{{ $product->name }}</dd>
                </div>
                <div class="py-4 flex flex-col sm:flex-row sm:justify-between">
                    <dt class="font-medium text-gray-500 dark:text-gray-400">Deskripsi</dt>
                    <dd class="text-gray-900 dark:text-gray-100">{{ $product->description ?? '-' }}</dd>
                </div>
                <div class="py-4 flex flex-col sm:flex-row sm:justify-between">
                    <dt class="font-medium text-gray-500 dark:text-gray-400">Harga</dt>
                    <dd class="text-gray-900 dark:text-gray-100">Rp {{ number_format($product->price, 0, ',', '.') }}</dd>
                </div>
                <div class="py-4 flex flex-col sm:flex-row sm:justify-between">
                    <dt class="font-medium text-gray-500 dark:text-gray-400">Status</dt>
                    <dd class="text-gray-900 dark:text-gray-100 capitalize">{{ $product->status }}</dd>
                </div>
                <div class="py-4 flex flex-col sm:flex-row sm:justify-between">
                    <dt class="font-medium text-gray-500 dark:text-gray-400">Merchant</dt>
                    <dd class="text-gray-900 dark:text-gray-100">{{ $product->merchant->name ?? '-' }}</dd>
                </div>
                @if ($product->rejection_reason)
                <div class="py-4 flex flex-col sm:flex-row sm:justify-between">
                    <dt class="font-medium text-red-500">Alasan Penolakan</dt>
                    <dd class="text-red-600">{{ $product->rejection_reason }}</dd>
                </div>
                @endif
            </dl>
        </div>

        <div class="mt-6 flex gap-4">
            <!-- Approve form -->
            @if($product->status !== 'approved')
                <form action="{{ route('admin.products.approve', $product) }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="btn bg-green-600 text-white hover:bg-green-700">
                        Setujui Produk
                    </button>
                </form>
            @endif

            <!-- Reject modal trigger -->
            @if($product->status !== 'rejected')
                <div x-data="{ open: false }">
                    <button @click="open = true"
                        class="btn bg-red-600 text-white hover:bg-red-700">
                        Tolak Produk
                    </button>

                    <!-- Modal -->
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
                                        class="btn border-gray-200 text-gray-800 dark:text-gray-100 bg-white hover:bg-gray-100">
                                        Batal
                                    </button>
                                    <button type="submit"
                                        class="btn bg-red-600 text-white hover:bg-red-700">
                                        Tolak Produk
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div class="mt-4">
            <a href="{{ route('admin.products.index') }}"
                class="inline-flex items-center text-sm text-gray-600 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-200">
                &larr; Kembali ke daftar produk
            </a>
        </div>
    </div>
</x-app-layout>
