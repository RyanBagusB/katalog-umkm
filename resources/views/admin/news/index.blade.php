<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        {{-- Header --}}
        <div class="sm:flex sm:justify-between sm:items-center mb-8">
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">News</h1>
            </div>
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
                <a href="{{ route('admin.news.create') }}"
                    class="btn flex gap-x-2 items-center bg-gray-900 text-white hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">
                    <svg class="fill-current shrink-0" width="16" height="16" viewBox="0 0 16 16">
                        <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                    </svg>
                    <span class="max-xs:sr-only">Tambah Berita</span>
                </a>
            </div>
        </div>

        {{-- Table --}}
        <div class="bg-white dark:bg-gray-800 shadow-xs rounded-xl">
            <header class="px-5 py-4 border-b border-gray-100 dark:border-gray-700/60">
                <h2 class="font-semibold text-gray-800 dark:text-gray-100">Daftar Berita</h2>
            </header>
            <div class="p-3 overflow-x-auto">
                <table class="table-auto w-full">
                    <thead class="text-xs font-semibold uppercase text-gray-400 dark:text-gray-500 bg-gray-50 dark:bg-gray-700/50">
                        <tr>
                            <th class="p-2 text-center">No</th>
                            <th class="p-2 text-left">Judul</th>
                            <th class="p-2 text-left">Tanggal</th>
                            <th class="p-2 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-gray-100 dark:divide-gray-700/60">
                        @forelse ($news as $index => $item)
                            <tr>
                                <td class="p-2 text-center">{{ $news->firstItem() + $index }}</td>
                                <td class="p-2">{{ $item->title }}</td>
                                <td class="p-2">{{ $item->published_at->format('d M Y') }}</td>
                                <td class="p-2 text-center flex justify-center gap-2">

                                    {{-- Edit Button --}}
                                    <a href="{{ route('admin.news.edit', $item) }}"
                                        class="btn flex gap-x-2 items-center bg-white border-gray-200 text-gray-800 hover:bg-gray-100 dark:bg-gray-800 dark:text-gray-100 dark:hover:bg-gray-700">
                                        <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16">
                                            <path d="M15.7 2.3l-2-2c-.4-.4-1-.4-1.4 0L1 11.6V15h3.4L15.7 3.7c.4-.4.4-1 0-1.4zM4.3 13H3v-1.3l7.6-7.6 1.3 1.3L4.3 13z"/>
                                        </svg>
                                        Edit
                                    </a>

                                    {{-- Delete Button with Modal --}}
                                    <div x-data="{ modalOpen: false }">
                                        <button @click="modalOpen = true" type="button"
                                            class="btn flex gap-x-2 items-center bg-white border-gray-200 hover:bg-red-100 text-red-600 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700">
                                            <svg class="fill-current shrink-0" width="16" height="16" viewBox="0 0 16 16" fill="currentColor">
                                                <path d="M5 7h2v6H5V7zm4 0h2v6H9V7zm3-6v2h4v2h-1v10c0 .6-.4 1-1 1H2c-.6 0-1-.4-1-1V5H0V3h4V1c0-.6.4-1 1-1h6c.6 0 1 .4 1 1zM6 2v1h4V2H6zm7 3H3v9h10V5z"></path>
                                            </svg>
                                            Hapus
                                        </button>

                                        <div x-show="modalOpen" x-cloak
                                            class="fixed inset-0 z-50 flex items-center justify-center bg-black/25 whitespace-normal">
                                            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md"
                                                @click.outside="modalOpen = false" @keydown.escape.window="modalOpen = false">
                                                <div class="flex items-start space-x-4 text-start">
                                                    <div class="rounded-full flex items-center justify-center bg-red-100 text-red-600 p-2">
                                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-1">Hapus berita ini?</h2>
                                                        <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
                                                            Apakah kamu yakin ingin menghapus berita ini? Tindakan ini tidak dapat dibatalkan.
                                                        </p>
                                                        <div class="flex justify-end space-x-2">
                                                            <button type="button"
                                                                class="btn border-gray-200 text-gray-800 bg-white hover:bg-gray-100"
                                                                @click="modalOpen = false">
                                                                Batal
                                                            </button>
                                                            <form action="{{ route('admin.news.destroy', $item) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn bg-red-600 text-white hover:bg-red-700">
                                                                    Ya, Hapus
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-gray-500">Tidak ada berita.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $news->links() }}
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
