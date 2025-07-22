<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg md:text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Merchant') }}
        </h2>
    </x-slot>

    <div class="py-8 md:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            {{-- Informasi Merchant --}}
            <div class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg p-4 md:p-6">
                <h1 class="text-xl md:text-2xl font-bold text-gray-800 dark:text-gray-100 mb-4">Informasi Merchant</h1>
                <div class="flex flex-col md:flex-row items-start gap-4 md:gap-6">
                    @if($merchant->banner_image)
                        <img src="{{ asset('storage/'.$merchant->banner_image) }}" class="w-32 h-32 md:w-40 md:h-40 object-cover rounded-lg" alt="Banner">
                    @endif
                    <div class="space-y-2 text-sm md:text-base">
                        <h2 class="text-lg md:text-xl font-semibold text-gray-800 dark:text-gray-100">{{ $merchant->name }}</h2>
                        <p class="text-gray-600 dark:text-gray-300">{{ $merchant->tagline }}</p>
                        <p class="text-gray-600 dark:text-gray-300">{{ $merchant->banner_description }}</p>
                        <p class="text-gray-600 dark:text-gray-300">
                            Status:
                            @if($merchant->is_active)
                                <span class="inline-block px-2 py-0.5 text-xs font-medium bg-green-100 text-green-700 rounded-full">
                                    Aktif
                                </span>
                            @else
                                <span class="inline-block px-2 py-0.5 text-xs font-medium bg-red-100 text-red-700 rounded-full">
                                    Nonaktif
                                </span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            {{-- Daftar Produk --}}
            <div class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg p-4 md:p-6">
                <h1 class="text-xl md:text-2xl font-bold text-gray-800 dark:text-gray-100 mb-4">Produk Anda</h1>
                @if($merchant->products->count())
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full text-left text-sm md:text-base">
                            <thead class="bg-gray-100 dark:bg-gray-700/50 text-gray-600 dark:text-gray-300 uppercase text-xs md:text-sm">
                                <tr>
                                    <th class="p-3 whitespace-nowrap">Nama Produk</th>
                                    <th class="p-3 whitespace-nowrap">Harga</th>
                                    <th class="p-3 whitespace-nowrap">Status</th>
                                    <th class="p-3 whitespace-nowrap">Gambar</th>
                                    <th class="p-3 whitespace-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($merchant->products as $product)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/30">
                                        <td class="p-3 whitespace-nowrap text-gray-800 dark:text-gray-100 font-medium">
                                            {{ $product->name }}
                                        </td>
                                        <td class="p-3 whitespace-nowrap text-gray-800 dark:text-gray-100">
                                            Rp {{ number_format($product->price,0,',','.') }}
                                        </td>
                                        <td class="p-3 whitespace-nowrap">
                                            @if($product->status === 'visible')
                                                <span class="inline-block px-2 py-0.5 text-xs font-medium bg-green-100 text-green-700 rounded-full">
                                                    Tampil
                                                </span>
                                            @else
                                                <span class="inline-block px-2 py-0.5 text-xs font-medium bg-red-100 text-red-700 rounded-full">
                                                    Tersembunyi
                                                </span>
                                            @endif
                                        </td>
                                        <td class="p-3 whitespace-nowrap">
                                            @if($product->image)
                                                <img src="{{ asset('storage/'.$product->image) }}" alt="produk" class="w-16 h-16 object-cover rounded">
                                            @else
                                                <span class="text-gray-500">-</span>
                                            @endif
                                        </td>
                                        <td class="p-3 whitespace-nowrap">
                                            <a href="#" class="text-blue-500 hover:underline">Edit</a>
                                            <span class="text-gray-400 mx-1">|</span>
                                            <a href="#" class="text-red-500 hover:underline">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-gray-500 text-sm md:text-base">Belum ada produk yang ditambahkan.</p>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
