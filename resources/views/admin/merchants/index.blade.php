<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl md:text-2xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Dashboard Merchant') }}
        </h2>
    </x-slot>

    <div class="py-6 md:py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            {{-- Informasi Merchant --}}
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6 md:p-8">
                <h1 class="text-lg md:text-2xl font-bold text-gray-800 dark:text-gray-100 mb-4">Informasi Merchant</h1>
                <div class="flex flex-col md:flex-row items-start gap-6">
                    @if($merchant->banner_image)
                        <img src="{{ asset('storage/'.$merchant->banner_image) }}" 
                             class="w-full md:w-40 md:h-40 object-cover rounded-lg shadow-sm" alt="Banner">
                    @endif
                    <div class="text-sm md:text-base space-y-2">
                        <h2 class="text-lg md:text-xl font-semibold text-gray-800 dark:text-gray-100">
                            {{ $merchant->name }}
                        </h2>
                        <p class="text-gray-600 dark:text-gray-300">{{ $merchant->tagline }}</p>
                        <p class="text-gray-600 dark:text-gray-300">{{ $merchant->banner_description }}</p>
                        <p class="text-gray-600 dark:text-gray-300">
                            Status:
                            @if($merchant->is_active)
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">
                                    Aktif
                                </span>
                            @else
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800">
                                    Nonaktif
                                </span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            {{-- Daftar Produk --}}
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6 md:p-8">
                <h1 class="text-lg md:text-2xl font-bold text-gray-800 dark:text-gray-100 mb-4">Produk Anda</h1>

                @if($merchant->products->count())
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full text-left text-sm md:text-base">
                            <thead class="bg-gray-100 dark:bg-gray-700/50 text-gray-600 dark:text-gray-300 uppercase text-xs md:text-sm">
                                <tr>
                                    <th class="p-3 whitespace-nowrap">Nama Produk</th>
                                    <th class="p-3 whitespace-nowrap">Harga</th>
                                    <th class="p-3 whitespace-nowrap">Status</th>
                                    <th class="p-3 whitespace-nowrap">Gambar</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($merchant->products as $product)
                                    <tr>
                                        <td class="p-3 whitespace-nowrap text-gray-800 dark:text-gray-100 font-medium">
                                            {{ $product->name }}
                                        </td>
                                        <td class="p-3 whitespace-nowrap text-gray-800 dark:text-gray-100">
                                            Rp {{ number_format($product->price,0,',','.') }}
                                        </td>
                                        <td class="p-3 whitespace-nowrap">
                                            @if($product->status === 'visible')
                                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">
                                                    Tampil
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-200 text-gray-800">
                                                    Tersembunyi
                                                </span>
                                            @endif
                                        </td>
                                        <td class="p-3 whitespace-nowrap">
                                            @if($product->image)
                                                <img src="{{ asset('storage/'.$product->image) }}" 
                                                     alt="produk" class="w-16 h-16 object-cover rounded shadow-sm">
                                            @else
                                                <span class="text-gray-500">-</span>
                                            @endif
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
