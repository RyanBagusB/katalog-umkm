<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Tambah Produk</h1>
            <p class="text-gray-600 dark:text-gray-300">Tambahkan produk baru untuk merchant Anda 📦</p>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-6">
            <form method="POST" action="{{ route('merchant.products.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="space-y-4">
                    {{-- Nama Produk --}}
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Nama Produk <span class="text-red-500">*</span>
                        </label>
                        <input id="name" name="name" type="text" required
                               placeholder="Nama produk"
                               value="{{ old('name') }}"
                               class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md py-2 px-3 dark:bg-gray-700 dark:text-gray-100 focus:outline-none focus:ring focus:ring-indigo-500">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Deskripsi
                        </label>
                        <textarea id="description" name="description" rows="4"
                                  placeholder="Deskripsi produk (opsional)"
                                  class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md py-2 px-3 dark:bg-gray-700 dark:text-gray-100 focus:outline-none focus:ring focus:ring-indigo-500">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Harga --}}
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Harga (Rp) <span class="text-red-500">*</span>
                        </label>
                        <input id="price" name="price" type="number" required min="0"
                               placeholder="Harga produk"
                               value="{{ old('price') }}"
                               class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md py-2 px-3 dark:bg-gray-700 dark:text-gray-100 focus:outline-none focus:ring focus:ring-indigo-500">
                        @error('price')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Gambar --}}
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Gambar Produk
                        </label>
                        <input id="image" name="image" type="file" accept="image/*"
                               class="mt-1 block w-full text-gray-700 dark:text-gray-100">
                        @error('image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Tombol --}}
                <div class="mt-6">
                    <button type="submit"
                            class="btn w-full flex items-center justify-center gap-x-2 bg-gray-900 text-white hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">
                        Simpan Produk
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
