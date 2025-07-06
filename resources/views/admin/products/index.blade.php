<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <div class="sm:flex sm:justify-between sm:items-center mb-8">
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Persetujuan Produk</h1>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow-xs rounded-xl">
            <header class="px-5 py-4 border-b border-gray-100 dark:border-gray-700/60">
                <h2 class="font-semibold text-gray-800 dark:text-gray-100">Daftar Produk Pending</h2>
            </header>
            <div class="p-3">
                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead class="text-xs font-semibold uppercase text-gray-400 dark:text-gray-500 bg-gray-50 dark:bg-gray-700/50">
                            <tr>
                                <th class="p-2 text-center">No</th>
                                <th class="p-2 text-left">Nama Produk</th>
                                <th class="p-2 text-left">Merchant</th>
                                <th class="p-2 text-left">Harga</th>
                                <th class="p-2 text-left">Status</th>
                                <th class="p-2 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100 dark:divide-gray-700/60">
                            @forelse ($products as $index => $product)
                                <tr>
                                    <td class="p-2 text-center">{{ $products->firstItem() + $index }}</td>
                                    <td class="p-2">
                                        {{ $product->name }}
                                    </td>
                                    <td class="p-2">
                                        {{ $product->merchant->name ?? '-' }}
                                    </td>
                                    <td class="p-2">
                                        Rp{{ number_format($product->price, 0, ',', '.') }}
                                    </td>
                                    <td class="p-2">
                                        @if($product->status === 'pending')
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800">Pending</span>
                                        @elseif($product->status === 'approved')
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">Disetujui</span>
                                        @elseif($product->status === 'rejected')
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800">Ditolak</span>
                                        @endif
                                    </td>
                                    <td class="p-2 text-center">
                                        <a href="{{ route('admin.products.show', $product) }}"
                                            class="btn flex gap-x-2 items-center bg-white border-gray-200 text-gray-800 hover:bg-gray-100 dark:bg-gray-800 dark:text-gray-100 dark:hover:bg-gray-700">
                                            <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16">
                                                <path d="M8 3C5.8 3 3.9 4.3 3.2 6.2c-.1.3-.1.6 0 .8C3.9 9.7 5.8 11 8 11s4.1-1.3 4.8-4c.1-.3.1-.6 0-.8C12.1 4.3 10.2 3 8 3zm0 6c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z"/>
                                                <path d="M0 8c0 4.4 3.6 8 8 8s8-3.6 8-8-3.6-8-8-8S0 3.6 0 8zm8-6c3.3 0 6 2.7 6 6s-2.7 6-6 6-6-2.7-6-6 2.7-6 6-6z"/>
                                            </svg>
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="p-2 text-center text-gray-500">Belum ada produk pending.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
