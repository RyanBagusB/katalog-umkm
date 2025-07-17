<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto" x-data="{ openCreateModal: false, openEditModalId: null }">

        {{-- Header --}}
        <div class="sm:flex sm:justify-between sm:items-center mb-8">
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Merchants</h1>
            </div>
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
                <button @click="openCreateModal = true"
                    class="btn flex gap-x-2 items-center bg-gray-900 text-white hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">
                    <svg class="fill-current shrink-0" width="16" height="16" viewBox="0 0 16 16">
                        <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                    </svg>
                    <span class="max-xs:sr-only">Add Merchant</span>
                </button>
            </div>
        </div>

        {{-- Table --}}
        <div class="bg-white dark:bg-gray-800 shadow-xs rounded-xl">
            <header class="px-5 py-4 border-b border-gray-100 dark:border-gray-700/60">
                <h2 class="font-semibold text-gray-800 dark:text-gray-100">Merchant List</h2>
            </header>
            <div class="p-3 overflow-x-auto">
                <table class="table-auto w-full">
                    <thead class="text-xs font-semibold uppercase text-gray-400 dark:text-gray-500 bg-gray-50 dark:bg-gray-700/50">
                        <tr>
                            <th class="p-2 text-center">No</th>
                            <th class="p-2 text-left">Username</th>
                            <th class="p-2 text-left">Merchant Name</th>
                            <th class="p-2 text-left">Status</th>
                            <th class="p-2 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-gray-100 dark:divide-gray-700/60">
                        @forelse ($merchants as $index => $merchant)
                            <tr>
                                <td class="p-2 text-center">{{ $merchants->firstItem() + $index }}</td>
                                <td class="p-2">{{ $merchant->user->username ?? '-' }}</td>
                                <td class="p-2">{{ $merchant->name ?? 'Belum dilengkapi' }}</td>
                                <td class="p-2">
                                    @if($merchant->is_active)
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">Aktif</span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-200 text-gray-800">Nonaktif</span>
                                    @endif
                                </td>
                                <td class="p-2 text-center flex justify-center gap-2">

                                    {{-- Edit Button --}}
                                    <button @click="openEditModalId = {{ $merchant->id }}"
                                        class="btn flex gap-x-2 items-center bg-white border-gray-200 text-gray-800 hover:bg-gray-100 dark:bg-gray-800 dark:text-gray-100 dark:hover:bg-gray-700">
                                        <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16">
                                            <path d="M15.7 2.3l-2-2c-.4-.4-1-.4-1.4 0L1 11.6V15h3.4L15.7 3.7c.4-.4.4-1 0-1.4zM4.3 13H3v-1.3l7.6-7.6 1.3 1.3L4.3 13z"/>
                                        </svg>
                                        Edit
                                    </button>

                                    {{-- Delete Button --}}
                                    <form action="{{ route('admin.merchants.destroy', $merchant) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            class="btn bg-white border-gray-200 text-red-600 hover:bg-red-100 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            {{-- Edit Modal --}}
                            <div x-show="openEditModalId === {{ $merchant->id }}" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/25">
                                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-full max-w-lg"
                                    @click.outside="openEditModalId = null" @keydown.escape.window="openEditModalId = null">
                                    <div class="mb-6">
                                        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Edit Merchant</h2>
                                        <p class="text-sm text-gray-600 dark:text-gray-300">Update merchant data 📝</p>
                                    </div>
                                    <form method="POST" action="{{ route('admin.merchants.update', $merchant) }}">
                                        @csrf @method('PUT')
                                        <div class="space-y-4">
                                            <div>
                                                <label for="username_{{ $merchant->id }}" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                                    Username
                                                </label>
                                                <input id="username_{{ $merchant->id }}" name="username" type="text" value="{{ $merchant->user->username ?? '' }}" required
                                                    class="w-full mt-1 rounded-md border border-gray-300 dark:border-gray-600 px-3 py-2 dark:bg-gray-700 dark:text-gray-100 focus:ring focus:ring-indigo-500">
                                            </div>
                                            <div>
                                                <label for="password_{{ $merchant->id }}" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                                    Password Baru <span class="text-gray-500 text-xs">(Opsional)</span>
                                                </label>
                                                <input id="password_{{ $merchant->id }}" name="password" type="password"
                                                    placeholder="Kosongkan jika tidak ingin diubah"
                                                    class="w-full mt-1 rounded-md border border-gray-300 dark:border-gray-600 px-3 py-2 dark:bg-gray-700 dark:text-gray-100 focus:ring focus:ring-indigo-500">
                                            </div>
                                            <div>
                                                <label for="is_active_{{ $merchant->id }}" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                                    Status
                                                </label>
                                                <select name="is_active" id="is_active_{{ $merchant->id }}"
                                                    class="w-full mt-1 rounded-md border border-gray-300 dark:border-gray-600 px-3 py-2 dark:bg-gray-700 dark:text-gray-100 focus:ring focus:ring-indigo-500">
                                                    <option value="1" {{ $merchant->is_active ? 'selected' : '' }}>Aktif</option>
                                                    <option value="0" {{ !$merchant->is_active ? 'selected' : '' }}>Nonaktif</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mt-6 flex justify-end gap-2">
                                            <button type="button" @click="openEditModalId = null"
                                                class="btn bg-white border-gray-200 text-gray-800 hover:bg-gray-100">
                                                Cancel
                                            </button>
                                            <button type="submit"
                                                class="btn bg-gray-900 text-white hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">
                                                Save
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-gray-500">No merchants available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $merchants->links() }}
                </div>
            </div>
        </div>

        {{-- Create Modal --}}
        <div x-show="openCreateModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/25">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-full max-w-lg"
                @click.outside="openCreateModal = false" @keydown.escape.window="openCreateModal = false">
                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Tambah Merchant</h2>
                    <p class="text-sm text-gray-600 dark:text-gray-300">Tambahkan akun merchant baru 🛒</p>
                </div>
                <form method="POST" action="{{ route('admin.merchants.store') }}">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label for="username_create" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Username</label>
                            <input id="username_create" name="username" type="text" required
                                class="w-full mt-1 rounded-md border border-gray-300 dark:border-gray-600 px-3 py-2 dark:bg-gray-700 dark:text-gray-100 focus:ring focus:ring-indigo-500">
                        </div>
                        <div>
                            <label for="password_create" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Password</label>
                            <input id="password_create" name="password" type="password" required
                                class="w-full mt-1 rounded-md border border-gray-300 dark:border-gray-600 px-3 py-2 dark:bg-gray-700 dark:text-gray-100 focus:ring focus:ring-indigo-500">
                        </div>
                    </div>
                    <div class="mt-6 flex justify-end gap-2">
                        <button type="button" @click="openCreateModal = false"
                            class="btn bg-white border-gray-200 text-gray-800 hover:bg-gray-100">
                            Cancel
                        </button>
                        <button type="submit"
                            class="btn bg-gray-900 text-white hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-app-layout>
