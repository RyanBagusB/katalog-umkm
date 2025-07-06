<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Dashboard Merchant</h1>

        @if($merchant)
            <div class="bg-white shadow p-4 rounded-lg">
                <h2 class="text-xl font-semibold">{{ $merchant->name }}</h2>
                <p class="text-gray-600 mt-2">{{ $merchant->address ?? 'Alamat belum diisi.' }}</p>
                <p class="mt-2">
                    Status:
                    @if($merchant->is_active)
                        <span class="text-green-600 font-medium">Aktif</span>
                    @else
                        <span class="text-red-600 font-medium">Nonaktif</span>
                    @endif
                </p>
            </div>
        @else
            <p class="text-gray-500">Detail merchant belum dilengkapi.</p>
        @endif
    </div>
</x-app-layout>
