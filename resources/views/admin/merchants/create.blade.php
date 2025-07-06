<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Tambah Merchant</h1>
            <p class="text-gray-600 dark:text-gray-300">Tambahkan akun merchant baru 🛒</p>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-6">
            <form method="POST" action="{{ route('admin.merchants.store') }}">
                @csrf

                <div class="space-y-4">

                    {{-- Username --}}
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Username <span class="text-red-500">*</span>
                        </label>
                        <input id="username" name="username" type="text" required
                               placeholder="Username merchant"
                               value="{{ old('username') }}"
                               class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md py-2 px-3 dark:bg-gray-700 dark:text-gray-100 focus:outline-none focus:ring focus:ring-indigo-500">
                        @error('username')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Password <span class="text-red-500">*</span>
                        </label>
                        <input id="password" name="password" type="password" required
                               placeholder="Password akun"
                               class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md py-2 px-3 dark:bg-gray-700 dark:text-gray-100 focus:outline-none focus:ring focus:ring-indigo-500">
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Tombol --}}
                <div class="mt-6">
                    <button type="submit"
                            class="btn w-full flex items-center justify-center gap-x-2 bg-gray-900 text-white hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">
                        Simpan Merchant
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
