<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Dashboard</h1>
            </div>

            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                {{-- <x-dropdown-filter align="right" />
                <x-datepicker />
                <button class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">
                    <svg class="fill-current shrink-0 xs:hidden" width="16" height="16" viewBox="0 0 16 16">
                        <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                  </svg>
                  <span class="max-xs:sr-only">Add View</span>
                </button> --}}
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-blue-100 p-6 rounded-lg text-center shadow-md">
                    <h3 class="text-lg font-semibold text-blue-700">Total Merchants</h3>
                    <p class="text-4xl font-bold text-blue-800">{{$merchantsTotal}}</p>
                    <div class="mt-4">
                        <i class="fas fa-users text-blue-500 text-4xl"></i>
                    </div>
                </div>

                <div class="bg-green-100 p-6 rounded-lg text-center shadow-md">
                    <h3 class="text-lg font-semibold text-green-700">Total Products</h3>
                    <p class="text-4xl font-bold text-green-800">{{$productsTotal}}</p>
                    <div class="mt-4">
                        <i class="fas fa-box text-green-500 text-4xl"></i>
                    </div>
                </div>

                <div class="bg-yellow-100 p-6 rounded-lg text-center shadow-md">
                    <h3 class="text-lg font-semibold text-yellow-700">Total News</h3>
                    <p class="text-4xl font-bold text-yellow-800">{{$newsTotal ?? 0}}</p>
                    <div class="mt-4">
                        <i class="fas fa-newspaper text-yellow-500 text-4xl"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap gap-8">
            <div class="flex-1 min-w-[300px] bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">New Products</h2>
                <ul class="space-y-4">
                    @foreach($productNewer as $product)
                        <li class="flex justify-between items-center text-gray-600 hover:text-gray-900 transition-colors duration-300">
                            <span class="font-medium">{{$product->name}}</span>
                            <span class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($product->created_at)->diffForHumans() }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="flex-1 min-w-[300px] bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">New Merchants</h2>
                <ul class="space-y-4">
                    @foreach($merchNewer as $merchant)
                        <li class="flex justify-between items-center text-gray-600 hover:text-gray-900 transition-colors duration-300">
                            <span class="font-medium">{{$merchant->username}}</span>
                            <span class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($merchant->created_at)->diffForHumans() }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
