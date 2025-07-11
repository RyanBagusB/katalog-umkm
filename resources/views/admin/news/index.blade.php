<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <div class="sm:flex sm:justify-between sm:items-center mb-8">
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Berita</h1>
            </div>

            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
                {{-- <button class="btn flex gap-x-2 items-center bg-gray-900 text-white hover:bg-gray-800">
                    <svg class="fill-current shrink-0" width="16" height="16" viewBox="0 0 16 16">
                        <path d="M15 7H9V1a1 1 0 1 0-2 0v6H1a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0V9h6a1 1 0 1 0 0-2z" />
                    </svg>
                    Tambah Berita
                </button> --}}
                <button id="openModal"
                    class="btn flex gap-x-2 items-center bg-gray-900 text-white hover:bg-gray-800 px-4 py-2 rounded">
                    <svg class="fill-current shrink-0" width="16" height="16" viewBox="0 0 16 16">
                        <path d="M15 7H9V1a1 1 0 1 0-2 0v6H1a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0V9h6a1 1 0 1 0 0-2z" />
                    </svg>
                    Tambah Berita
                </button>

            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow-xs rounded-xl">
            <div class="p-3">
                <div class="overflow-x-auto">
                    <table id="newsTable" class="table-auto w-full">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50 dark:bg-gray-700/50">
                            <tr>
                                <th class="p-2 text-center">No</th>
                                <th class="p-2 text-left">Judul</th>
                                <th class="p-2 text-left">Deskripsi</th>
                                <th class="p-2 text-left">Gambar</th>
                                <th class="p-2 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100 dark:divide-gray-700/60">
                            @foreach ($news as $index => $item)
                                <tr>
                                    <td class="p-2 text-center">{{ $news->firstItem() + $index }}</td>
                                    <td class="p-2">{{ $item->title }}</td>
                                    <td class="p-2 line-clamp-2">{{ Str::limit(strip_tags($item->description), 50) }}
                                    </td>
                                    <td class="p-2">
                                        @if ($item->image)
                                            <img src="{{ asset('storage/' . $item->image) }}" alt="Gambar"
                                                class="w-16 h-16 object-cover rounded">
                                        @else
                                            <span class="italic text-gray-500">Tidak ada</span>
                                        @endif
                                    </td>
                                    <td class="p-2 text-center flex justify-center gap-2">
                                        <a href="{{ route('news.edit', $item) }}"
                                            class="btn bg-white border border-gray-200 hover:bg-gray-100 text-gray-800">
                                            Edit
                                        </a>
                                        <form action="{{ route('news.destroy', $item) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn bg-red-600 text-white hover:bg-red-700">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $news->links() }}
                </div>
            </div>
        </div>



                <!-- Modal -->
                <div id="newsModal"
                    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
                    <div class="bg-white w-full max-w-lg rounded-lg shadow-lg p-6 relative">
                        <!-- Close Button -->
                        <button id="closeModal" class="absolute top-3 right-3 text-gray-600 hover:text-red-600">
                            ✕
                        </button>

                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Tambah Berita</h2>

                        <form action="#" method="POST" enctype="multipart/form-data" class="space-y-4">
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
                                <input type="text" name="title" id="title"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200"
                                    required>
                            </div>

                            <div>
                                <label for="description"
                                    class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                <textarea name="description" id="description" rows="4"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" required></textarea>
                            </div>

                            <div>
                                <label for="image" class="block text-sm font-medium text-gray-700">Gambar</label>
                                <input type="file" name="image" id="image"
                                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:border file:rounded file:text-sm file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                            </div>

                            <div class="flex justify-end gap-2">
                                <button type="button" id="cancelModal"
                                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Batal</button>
                                <button type="submit"
                                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
    </div>

    <script>
        $(document).ready(function() {
            // Buka modal
            $('#openModal').click(function() {
                $('#newsModal').removeClass('hidden');
            });

            // Tutup modal
            $('#closeModal, #cancelModal').click(function() {
                $('#newsModal').addClass('hidden');
            });
        });
    </script>

</x-app-layout>
