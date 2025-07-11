<x-app-layout>
    <div class="max-w-xl mx-auto p-6 mt-6 bg-white dark:bg-gray-900 rounded-xl shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6">Update User Merchant</h1>

        <form action="{{ route('admin.merchants.update', $merchant) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Username</label>
                <input
                    type="text"
                    name="username"
                    id="username"
                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    value="{{ old('username', $merchant->user->username ?? '') }}"
                    required
                >
                @error('username')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password (opsional)</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    placeholder="Biarkan kosong jika tidak diubah"
                >
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-start gap-3 pt-4">
                <button
                    type="submit"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Update
                </button>

                <a
                    href="{{ route('admin.merchants.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 text-sm font-medium rounded-md hover:bg-gray-300 dark:hover:bg-gray-600"
                >
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
