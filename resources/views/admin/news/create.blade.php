<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-4xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Tambah Berita</h1>

        <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-6">
            <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
                @csrf

                {{-- Judul Berita --}}
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Judul</label>
                    <input id="title" name="title" type="text" required
                        value="{{ old('title') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 py-2 px-3 dark:bg-gray-700 dark:text-white focus:ring focus:ring-indigo-500">
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Gambar Utama --}}
                <div x-data="{
                    preview: '',
                    fileName: '',
                    updatePreview(e){
                        const file = e.target.files[0];
                        if(file){
                            if(file.size > 5 * 1024 * 1024){
                                alert('Ukuran file maksimal 5MB');
                                return;
                            }
                            this.preview = URL.createObjectURL(file);
                            this.fileName = file.name;
                        }
                    },
                    removeFile(){
                        this.preview = '';
                        this.fileName = '';
                        document.getElementById('image').value = '';
                    }
                }" class="space-y-4 mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Gambar Berita</label>

                    <div x-show="!preview"
                        class="flex flex-col items-center justify-center border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-6 text-center cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700 transition"
                        @click="$refs.input.click()"
                        @dragover.prevent="$event.dataTransfer.dropEffect = 'copy';"
                        @drop.prevent="
                            const file = $event.dataTransfer.files[0];
                            if(file && file.type.startsWith('image/')){
                                $refs.input.files = $event.dataTransfer.files;
                                updatePreview({ target: $refs.input });
                            }
                        ">
                        <svg class="w-12 h-12 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                        <p class="text-sm text-gray-600 dark:text-gray-300">
                            <span class="font-medium text-indigo-600 dark:text-indigo-400">Seret & Jatuhkan</span> atau <span class="font-medium text-indigo-600 dark:text-indigo-400">Jelajahi</span>
                        </p>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Format: JPG, PNG (Maks. 5MB)</p>
                        <input type="file" id="image" name="image" x-ref="input" @change="updatePreview" class="hidden" accept="image/*">
                    </div>

                    <div x-show="preview" class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                        <div class="flex items-center space-x-4">
                            <div class="w-16 h-16 rounded-md overflow-hidden bg-gray-100 dark:bg-gray-700 flex-shrink-0">
                                <img :src="preview" alt="Preview" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p x-text="fileName" class="text-sm font-medium text-gray-900 dark:text-white truncate"></p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Upload selesai</p>
                            </div>
                            <button type="button" @click="removeFile" class="text-red-500 hover:text-red-700">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="mt-2">
                            <button type="button" @click="$refs.input.click()" class="text-xs text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300">
                                Klik untuk mengganti
                            </button>
                        </div>
                    </div>

                    @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Konten Berita (Trix) --}}
                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Isi Berita</label>

                    <input id="content" type="hidden" name="content" value="{{ old('content') }}">
                    <trix-editor
                        input="content"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring focus:ring-indigo-500">
                    </trix-editor>

                    @error('content')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <button type="submit"
                        class="btn w-full flex items-center justify-center gap-x-2 bg-gray-900 text-white hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">
                        Simpan Berita
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
