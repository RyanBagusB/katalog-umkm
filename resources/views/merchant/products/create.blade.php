<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Tambah Produk</h1>
            <p class="text-gray-600 dark:text-gray-300">Tambahkan produk baru untuk merchant Anda 📦</p>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-6">
            <form method="POST" action="{{ route('merchant.products.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="space-y-6">
                    {{-- Nama Produk --}}
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Nama Produk <span class="text-red-500">*</span>
                        </label>
                        <input id="name" name="name" type="text" required
                               value="{{ old('name') }}"
                               class="mt-1 block w-full rounded-md border border-gray-300 dark:border-gray-600 py-2 px-3 dark:bg-gray-700 dark:text-gray-100 focus:ring focus:ring-indigo-500">
                        @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Deskripsi</label>
                        <textarea id="description" name="description" rows="3"
                                  class="mt-1 block w-full rounded-md border border-gray-300 dark:border-gray-600 py-2 px-3 dark:bg-gray-700 dark:text-gray-100 focus:ring focus:ring-indigo-500">{{ old('description') }}</textarea>
                        @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Harga --}}
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Harga (Rp) <span class="text-red-500">*</span></label>
                        <input id="price" name="price" type="number" min="0" required
                               value="{{ old('price') }}"
                               class="mt-1 block w-full rounded-md border border-gray-300 dark:border-gray-600 py-2 px-3 dark:bg-gray-700 dark:text-gray-100 focus:ring focus:ring-indigo-500">
                        @error('price') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Upload Gambar --}}
                    <div x-data="{
                        photoPreview: '',
                        fileName: '',
                        isUploaded: false,
                        updatePreview(event) {
                            const file = event.target.files[0];
                            if (file) {
                                if (file.size > 5 * 1024 * 1024) {
                                    alert('Ukuran file maksimal 5MB');
                                    return;
                                }
                                this.photoPreview = URL.createObjectURL(file);
                                this.fileName = file.name;
                                this.isUploaded = true;
                            }
                        },
                        removeFile() {
                            this.photoPreview = '';
                            this.fileName = '';
                            this.isUploaded = false;
                            document.getElementById('photo').value = '';
                        }
                    }" class="space-y-4">

                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Gambar Produk</label>

                        <div x-show="!isUploaded"
                             class="flex flex-col items-center justify-center border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-6 text-center cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700 transition"
                             @click="$refs.fileInput.click()"
                             @dragover.prevent="$event.dataTransfer.dropEffect = 'copy';"
                             @drop.prevent="
                                 const file = $event.dataTransfer.files[0];
                                 if (file && file.type.startsWith('image/')) {
                                     $refs.fileInput.files = $event.dataTransfer.files;
                                     updatePreview({ target: $refs.fileInput });
                                 }
                             ">
                            <svg class="w-12 h-12 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                            </svg>
                            <p class="text-sm text-gray-600 dark:text-gray-300">
                                <span class="font-medium text-indigo-600 dark:text-indigo-400">Seret & Jatuhkan</span> atau <span class="font-medium text-indigo-600 dark:text-indigo-400">Klik untuk unggah</span>
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Format: JPG, PNG. Maks: 5MB</p>
                            <input type="file" id="photo" name="image" x-ref="fileInput" @change="updatePreview" class="hidden" accept="image/*">
                        </div>

                        <div x-show="isUploaded" class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                            <div class="flex items-center space-x-4">
                                <div class="w-16 h-16 rounded-md overflow-hidden bg-gray-100 dark:bg-gray-700 flex-shrink-0">
                                    <img :src="photoPreview" alt="Preview" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p x-text="fileName" class="text-sm font-medium text-gray-900 dark:text-white truncate"></p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Upload selesai</p>
                                </div>
                                <button type="button" @click="removeFile" class="text-red-500 hover:text-red-700">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="mt-2">
                                <button type="button" @click="$refs.fileInput.click()"
                                        class="text-xs text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300">
                                    Klik untuk mengganti
                                </button>
                            </div>
                        </div>

                        @error('photo') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Tombol Submit --}}
                    <div class="pt-4">
                        <button type="submit"
                            class="btn w-full justify-center bg-gray-900 text-white hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">
                            Simpan Produk
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
