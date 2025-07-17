<x-app-layout>
    <style>
        @import url('https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css');

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translate(-50%, -60%);
            }

            to {
                opacity: 1;
                transform: translate(-50%, -50%);
            }
        }

        .modal-overlay {
            animation: fadeIn 0.3s ease;
        }

        .modal-container {
            animation: slideIn 0.3s ease;
        }

        .fade-in {
            animation: fadeIn 0.3s ease;
        }

        .fade-out {
            animation: fadeOut 0.3s ease;
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }

            to {
                opacity: 0;
            }
        }
    </style>

    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <div class="sm:flex sm:justify-between sm:items-center mb-8">
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Berita</h1>
            </div>

            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
                <button
                    class="inline-flex items-center gap-2 bg-gray-900 text-white px-4 py-2 rounded-lg hover:bg-gray-800 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
                    id="openModalButton">
                    <svg class="fill-current flex-shrink-0 w-4 h-4" viewBox="0 0 16 16">
                        <path d="M15 7H9V1a1 1 0 1 0-2 0v6H1a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0V9h6a1 1 0 1 0 0-2z" />
                    </svg>
                    Tambah Berita Baru
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
                                    <td class="p-2 text-center flex justify-center gap-4">
                                        <button onclick="editNews({{ $item->id }})"
                                            class="btn bg-white border border-gray-200 hover:bg-gray-100 text-gray-800 px-4 py-2 rounded-md transition-all duration-200 ease-in-out">
                                            Edit
                                        </button>
                                        <form action="{{ route('admin.news.destroy', $item) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn bg-red-600 text-white hover:bg-red-700 active:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 px-4 py-2 rounded-md transition-all duration-200 ease-in-out"
                                                aria-label="Delete News">
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

        <div id="newsModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden modal-overlay">
            <div class="fixed inset-0 flex items-center justify-center p-4">
                <div class="bg-white rounded-xl shadow-2xl w-full max-w-md max-h-[90vh] overflow-y-auto modal-container"
                    style="transform: translate(-50%, -50%); position: absolute; top: 50%; left: 50%;">
                    <div class="flex items-center justify-between p-6 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-900 modal-title">Tambah Berita Baru</h2>
                        <button
                            class="text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg p-1 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500"
                            id="closeModalButton">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-6">
                        <form id="newsForm" class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2" for="newsTitle">
                                    Judul Berita <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="newsTitle"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors duration-200"
                                    placeholder="Masukkan judul berita" required>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2" for="newsDescription">
                                    Deskripsi <span class="text-red-500">*</span>
                                </label>
                                <textarea id="newsDescription" rows="4"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors duration-200 resize-vertical"
                                    placeholder="Masukkan deskripsi berita" required></textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2" for="newsImage">
                                    Gambar
                                </label>
                                <input type="file" id="newsImage"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                                    accept="image/*">

                                <div id="imagePreview" class="hidden mt-3 text-center">
                                    <img id="previewImg" class="max-w-full max-h-48 rounded-lg shadow-md mx-auto"
                                        alt="Preview">
                                    <p id="previewName" class="mt-2 text-sm text-gray-500"></p>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="flex justify-end gap-3 p-6 border-t border-gray-200">
                        <button type="button"
                            class="px-4 py-2 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
                            id="cancelButton">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                            id="saveButton">
                            Simpan Berita
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            let editingIndex = -1;

            $('#openModalButton').click(function() {
                resetForm();
                $('#newsModal').removeClass('hidden').addClass('fade-in');
                $('#newsTitle').focus();
            });

            $('#closeModalButton, #cancelButton').click(function() {
                closeModal();
            });

            $('#newsModal').click(function(e) {
                if (e.target === this) {
                    closeModal();
                }
            });

            function closeModal() {
                $('#newsModal').addClass('fade-out');
                setTimeout(() => {
                    $('#newsModal').addClass('hidden').removeClass('fade-in fade-out');
                }, 300);
            }

            $('#newsImage').change(function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#previewImg').attr('src', e.target.result);
                        $('#previewName').text(file.name);
                        $('#imagePreview').removeClass('hidden');
                    };
                    reader.readAsDataURL(file);
                } else {
                    $('#imagePreview').addClass('hidden');
                }
            });

            window.editNews = function(id) {
                $.ajax({
                    url: '{{ route('admin.news.edit', ':id') }}'.replace(':id', id),
                    type: 'GET',
                    success: function(response) {
                        $('#newsModal').removeClass('hidden').addClass('fade-in');
                        $('#newsTitle').val(response.title);
                        $('#newsDescription').val(response.description);

                        if (response.image) {
                            $('#previewImg').attr('src', '/storage/' + response.image);
                            $('#previewName').text(response.image);
                            $('#imagePreview').removeClass('hidden');
                        } else {
                            $('#imagePreview').addClass('hidden');
                        }

                        $('.modal-title').text('Edit Berita');
                        $('#saveButton').text('Update Berita').removeClass(
                            'bg-blue-600 hover:bg-blue-700').addClass(
                            'bg-green-600 hover:bg-green-700');
                        editingIndex = id;
                    },
                    error: function(xhr, status, error) {
                        alert('Terjadi kesalahan: ' + xhr.responseText);
                    }
                });
            };

            $('#saveButton').click(function(e) {
                e.preventDefault();
                let title = $('#newsTitle').val();
                let description = $('#newsDescription').val();
                let image = $('#newsImage')[0].files[0];

                // if (!title || !description || !image) {
                //     alert('Judul, deskripsi, dan gambar harus diisi!');
                //     return;
                // }

                let formData = new FormData();
                formData.append('title', title);
                formData.append('description', description);
                formData.append('image', image);
                formData.append('_token', '{{ csrf_token() }}');

                if (editingIndex === -1) {
                    $.ajax({
                        url: '{{ route('admin.news.store') }}',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            alert('Berita berhasil ditambahkan!');
                            window.location.reload();
                        },
                        error: function(xhr, status, error) {
                            alert('Terjadi kesalahan: ' + xhr.responseText);
                        }
                    });
                } else {
                    formData.append('_method', 'PUT');
                    $.ajax({
                        url: '{{ route('admin.news.update', ':id') }}'.replace(':id',
                            editingIndex),
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            alert('Berita berhasil diperbarui!');
                            window.location.reload();
                        },
                        error: function(xhr, status, error) {
                            alert('Terjadi kesalahan: ' + xhr.responseText);
                        }
                    });
                }
            });

            function resetForm() {
                $('#newsForm')[0].reset();
                $('#imagePreview').addClass('hidden');
                $('#successMessage').addClass('hidden');
                editingIndex = -1;
                $('.modal-title').text('Tambah Berita Baru');
                $('#saveButton').text('Simpan Berita').removeClass('bg-green-600 hover:bg-green-700').addClass(
                    'bg-blue-600 hover:bg-blue-700');
            }
        });
    </script>
</x-app-layout>
