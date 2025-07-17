<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-4xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Edit Profil Toko</h1>

        <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-6">
            <form method="POST" action="{{ route('merchant.profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Nama --}}
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Nama Toko</label>
                    <input id="name" name="name" type="text" required
                        value="{{ old('name', $merchant->name) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 py-2 px-3 dark:bg-gray-700 dark:text-white focus:ring focus:ring-indigo-500">
                </div>

                <div x-data="{
                    bannerPreview: '{{ $merchant->banner_image ? asset('storage/' . $merchant->banner_image) : '' }}',
                    bannerFileName: '{{ $merchant->banner_image ? basename($merchant->banner_image) : '' }}',
                    bannerUploaded: {{ $merchant->banner_image ? 'true' : 'false' }},
                    updateBanner(e) {
                        const file = e.target.files[0];
                        if (file) {
                            if (file.size > 5 * 1024 * 1024) {
                                alert('Ukuran file maksimal 5MB');
                                return;
                            }
                            this.bannerPreview = URL.createObjectURL(file);
                            this.bannerFileName = file.name;
                            this.bannerUploaded = true;
                        }
                    },
                    removeBanner() {
                        this.bannerPreview = '';
                        this.bannerFileName = '';
                        this.bannerUploaded = false;
                        document.getElementById('banner_image').value = '';
                    },
                    init() {
                        if (this.bannerPreview) {
                            this.bannerUploaded = true;
                        }
                    }
                }" class="space-y-4 mb-4">

                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Banner Image</label>

                    <!-- Area kosong untuk upload -->
                    <div x-show="!bannerUploaded"
                        class="flex flex-col items-center justify-center border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-6 text-center cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700 transition"
                        @click="$refs.bannerInput.click()"
                        @dragover.prevent="$event.dataTransfer.dropEffect = 'copy';"
                        @drop.prevent="
                            const file = $event.dataTransfer.files[0];
                            if (file && file.type.startsWith('image/')) {
                                $refs.bannerInput.files = $event.dataTransfer.files;
                                updateBanner({ target: $refs.bannerInput });
                            }
                        ">
                        <svg class="w-12 h-12 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                        <p class="text-sm text-gray-600 dark:text-gray-300">
                            <span class="font-medium text-indigo-600 dark:text-indigo-400">Seret & Jatuhkan</span> atau <span class="font-medium text-indigo-600 dark:text-indigo-400">Jelajahi</span>
                        </p>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                            Format: JPG, PNG (Maks. 5MB)
                        </p>
                        <input type="file" id="banner_image" name="banner_image" x-ref="bannerInput" @change="updateBanner" class="hidden" accept="image/*">
                    </div>

                    <!-- Area preview ketika sudah upload -->
                    <div x-show="bannerUploaded" class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                        <div class="flex items-center space-x-4">
                            <div class="w-16 h-16 rounded-md overflow-hidden bg-gray-100 dark:bg-gray-700 flex-shrink-0">
                                <img x-bind:src="bannerPreview" alt="Preview" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p x-text="bannerFileName" class="text-sm font-medium text-gray-900 dark:text-white truncate"></p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Upload selesai</p>
                            </div>
                            <button type="button" @click="removeBanner" class="text-red-500 hover:text-red-700">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="mt-2">
                            <button type="button" @click="$refs.bannerInput.click()" class="text-xs text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300">
                                Klik untuk mengganti
                            </button>
                        </div>
                    </div>

                    @error('banner_image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tagline --}}
                <div class="mb-4">
                    <label for="tagline" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Tagline</label>
                    <input id="tagline" name="tagline" type="text"
                        value="{{ old('tagline', $merchant->tagline) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 py-2 px-3 dark:bg-gray-700 dark:text-white focus:ring focus:ring-indigo-500">
                </div>

                {{-- Banner Description --}}
                <div class="mb-4">
                    <label for="banner_description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Banner Description</label>
                    <textarea id="banner_description" name="banner_description" rows="3"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 py-2 px-3 dark:bg-gray-700 dark:text-white focus:ring focus:ring-indigo-500">{{ old('banner_description', $merchant->banner_description) }}</textarea>
                </div>

                {{-- Feature 1 --}}
                <div class="mb-4">
                    <label for="feature_1_title" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Feature 1 Title</label>
                    <input id="feature_1_title" name="feature_1_title" type="text"
                        value="{{ old('feature_1_title', $merchant->feature_1_title) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 py-2 px-3 dark:bg-gray-700 dark:text-white focus:ring focus:ring-indigo-500">
                </div>
                <div class="mb-4">
                    <label for="feature_1_desc" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Feature 1 Description</label>
                    <textarea id="feature_1_desc" name="feature_1_desc" rows="3"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 py-2 px-3 dark:bg-gray-700 dark:text-white focus:ring focus:ring-indigo-500">{{ old('feature_1_desc', $merchant->feature_1_desc) }}</textarea>
                </div>

                {{-- Feature 2 --}}
                <div class="mb-4">
                    <label for="feature_2_title" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Feature 2 Title</label>
                    <input id="feature_2_title" name="feature_2_title" type="text"
                        value="{{ old('feature_2_title', $merchant->feature_2_title) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 py-2 px-3 dark:bg-gray-700 dark:text-white focus:ring focus:ring-indigo-500">
                </div>
                <div class="mb-4">
                    <label for="feature_2_desc" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Feature 2 Description</label>
                    <textarea id="feature_2_desc" name="feature_2_desc" rows="3"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 py-2 px-3 dark:bg-gray-700 dark:text-white focus:ring focus:ring-indigo-500">{{ old('feature_2_desc', $merchant->feature_2_desc) }}</textarea>
                </div>

                {{-- Feature 3 --}}
                <div class="mb-4">
                    <label for="feature_3_title" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Feature 3 Title</label>
                    <input id="feature_3_title" name="feature_3_title" type="text"
                        value="{{ old('feature_3_title', $merchant->feature_3_title) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 py-2 px-3 dark:bg-gray-700 dark:text-white focus:ring focus:ring-indigo-500">
                </div>
                <div class="mb-4">
                    <label for="feature_3_desc" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Feature 3 Description</label>
                    <textarea id="feature_3_desc" name="feature_3_desc" rows="3"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 py-2 px-3 dark:bg-gray-700 dark:text-white focus:ring focus:ring-indigo-500">{{ old('feature_3_desc', $merchant->feature_3_desc) }}</textarea>
                </div>

                {{-- Feature 4 --}}
                <div class="mb-4">
                    <label for="feature_4_title" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Feature 4 Title</label>
                    <input id="feature_4_title" name="feature_4_title" type="text"
                        value="{{ old('feature_4_title', $merchant->feature_4_title) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 py-2 px-3 dark:bg-gray-700 dark:text-white focus:ring focus:ring-indigo-500">
                </div>
                <div class="mb-4">
                    <label for="feature_4_desc" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Feature 4 Description</label>
                    <textarea id="feature_4_desc" name="feature_4_desc" rows="3"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 py-2 px-3 dark:bg-gray-700 dark:text-white focus:ring focus:ring-indigo-500">{{ old('feature_4_desc', $merchant->feature_4_desc) }}</textarea>
                </div>

                {{-- About Description --}}
                <div class="mb-4">
                    <label for="about_description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">About Description</label>
                    <textarea id="about_description" name="about_description" rows="3"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 py-2 px-3 dark:bg-gray-700 dark:text-white focus:ring focus:ring-indigo-500">{{ old('about_description', $merchant->about_description) }}</textarea>
                </div>

                {{-- About Image --}}
                <div x-data="{
                    aboutPreview: '{{ $merchant->about_image ? asset('storage/' . $merchant->about_image) : '' }}',
                    aboutFileName: '{{ $merchant->about_image ? basename($merchant->about_image) : '' }}',
                    aboutUploaded: {{ $merchant->about_image ? 'true' : 'false' }},
                    updateAboutPreview(e){
                        const file = e.target.files[0];
                        if(file){
                            if(file.size > 5 * 1024 * 1024){
                                alert('Ukuran file maksimal 5MB');
                                return;
                            }
                            this.aboutPreview = URL.createObjectURL(file);
                            this.aboutFileName = file.name;
                            this.aboutUploaded = true;
                        }
                    },
                    removeAboutFile(){
                        this.aboutPreview = '';
                        this.aboutFileName = '';
                        this.aboutUploaded = false;
                        document.getElementById('about_image').value = '';
                    },
                    init(){
                        if(this.aboutPreview){
                            this.aboutUploaded = true;
                        }
                    }
                }" class="space-y-4">

                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">About Image</label>

                    {{-- Area upload jika belum ada file --}}
                    <div x-show="!aboutUploaded"
                        class="flex flex-col items-center justify-center border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-6 text-center cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700 transition"
                        @click="$refs.aboutInput.click()"
                        @dragover.prevent="$event.dataTransfer.dropEffect = 'copy';"
                        @drop.prevent="
                            const file = $event.dataTransfer.files[0];
                            if(file && file.type.startsWith('image/')){
                                $refs.aboutInput.files = $event.dataTransfer.files;
                                updateAboutPreview({ target: $refs.aboutInput });
                            }
                        ">
                        <svg class="w-12 h-12 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                        <p class="text-sm text-gray-600 dark:text-gray-300">
                            <span class="font-medium text-indigo-600 dark:text-indigo-400">Seret & Jatuhkan</span> atau <span class="font-medium text-indigo-600 dark:text-indigo-400">Jelajahi</span>
                        </p>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                            Format: JPG, PNG (Maks. 5MB)
                        </p>
                        <input type="file" id="about_image" name="about_image" x-ref="aboutInput" @change="updateAboutPreview" class="hidden" accept="image/*">
                    </div>

                    {{-- Area preview jika sudah ada file --}}
                    <div x-show="aboutUploaded" class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                        <div class="flex items-center space-x-4">
                            <div class="w-16 h-16 rounded-md overflow-hidden bg-gray-100 dark:bg-gray-700 flex-shrink-0">
                                <img x-bind:src="aboutPreview" alt="About Preview" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p x-text="aboutFileName" class="text-sm font-medium text-gray-900 dark:text-white truncate"></p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Upload selesai</p>
                            </div>
                            <button type="button" @click="removeAboutFile" class="text-red-500 hover:text-red-700">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="mt-2">
                            <button type="button" @click="$refs.aboutInput.click()" class="text-xs text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300">
                                Klik untuk mengganti
                            </button>
                        </div>
                    </div>

                    @error('about_image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Contact Description --}}
                <div class="mb-4">
                    <label for="contact_description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Contact Description</label>
                    <textarea id="contact_description" name="contact_description" rows="3"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 py-2 px-3 dark:bg-gray-700 dark:text-white focus:ring focus:ring-indigo-500">{{ old('contact_description', $merchant->contact_description) }}</textarea>
                </div>

                {{-- Contact Image --}}
                <div x-data="{
                    contactPreview: '{{ $merchant->contact_image ? asset('storage/' . $merchant->contact_image) : '' }}',
                    contactFileName: '{{ $merchant->contact_image ? basename($merchant->contact_image) : '' }}',
                    contactUploaded: {{ $merchant->contact_image ? 'true' : 'false' }},
                    updateContactPreview(e){
                        const file = e.target.files[0];
                        if(file){
                            if(file.size > 5 * 1024 * 1024){
                                alert('Ukuran file maksimal 5MB');
                                return;
                            }
                            this.contactPreview = URL.createObjectURL(file);
                            this.contactFileName = file.name;
                            this.contactUploaded = true;
                        }
                    },
                    removeContactFile(){
                        this.contactPreview = '';
                        this.contactFileName = '';
                        this.contactUploaded = false;
                        document.getElementById('contact_image').value = '';
                    },
                    init(){
                        if(this.contactPreview){
                            this.contactUploaded = true;
                        }
                    }
                }" class="space-y-4">

                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Contact Image</label>

                    {{-- Area upload jika belum ada file --}}
                    <div x-show="!contactUploaded"
                        class="flex flex-col items-center justify-center border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-6 text-center cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700 transition"
                        @click="$refs.contactInput.click()"
                        @dragover.prevent="$event.dataTransfer.dropEffect = 'copy';"
                        @drop.prevent="
                            const file = $event.dataTransfer.files[0];
                            if(file && file.type.startsWith('image/')){
                                $refs.contactInput.files = $event.dataTransfer.files;
                                updateContactPreview({ target: $refs.contactInput });
                            }
                        ">
                        <svg class="w-12 h-12 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                        <p class="text-sm text-gray-600 dark:text-gray-300">
                            <span class="font-medium text-indigo-600 dark:text-indigo-400">Seret & Jatuhkan</span> atau <span class="font-medium text-indigo-600 dark:text-indigo-400">Jelajahi</span>
                        </p>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                            Format: JPG, PNG (Maks. 5MB)
                        </p>
                        <input type="file" id="contact_image" name="contact_image" x-ref="contactInput" @change="updateContactPreview" class="hidden" accept="image/*">
                    </div>

                    {{-- Area preview jika sudah ada file --}}
                    <div x-show="contactUploaded" class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                        <div class="flex items-center space-x-4">
                            <div class="w-16 h-16 rounded-md overflow-hidden bg-gray-100 dark:bg-gray-700 flex-shrink-0">
                                <img x-bind:src="contactPreview" alt="Contact Preview" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p x-text="contactFileName" class="text-sm font-medium text-gray-900 dark:text-white truncate"></p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Upload selesai</p>
                            </div>
                            <button type="button" @click="removeContactFile" class="text-red-500 hover:text-red-700">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="mt-2">
                            <button type="button" @click="$refs.contactInput.click()" class="text-xs text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300">
                                Klik untuk mengganti
                            </button>
                        </div>
                    </div>

                    @error('contact_image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Contact Address --}}
                <div class="mb-4">
                    <label for="contact_address" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Contact Address</label>
                    <input id="contact_address" name="contact_address" type="text"
                        value="{{ old('contact_address', $merchant->contact_address) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 py-2 px-3 dark:bg-gray-700 dark:text-white focus:ring focus:ring-indigo-500">
                </div>

                {{-- Contact Phone --}}
                <div class="mb-4">
                    <label for="contact_phone" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Contact Phone</label>
                    <input id="contact_phone" name="contact_phone" type="text"
                        value="{{ old('contact_phone', $merchant->contact_phone) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 py-2 px-3 dark:bg-gray-700 dark:text-white focus:ring focus:ring-indigo-500">
                </div>

                {{-- Contact Email --}}
                <div class="mb-4">
                    <label for="contact_email" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Contact Email</label>
                    <input id="contact_email" name="contact_email" type="email"
                        value="{{ old('contact_email', $merchant->contact_email) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 py-2 px-3 dark:bg-gray-700 dark:text-white focus:ring focus:ring-indigo-500">
                </div>

                {{-- Contact Instagram --}}
                <div class="mb-4">
                    <label for="contact_instagram" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Contact Instagram</label>
                    <input id="contact_instagram" name="contact_instagram" type="text"
                        value="{{ old('contact_instagram', $merchant->contact_instagram) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 py-2 px-3 dark:bg-gray-700 dark:text-white focus:ring focus:ring-indigo-500">
                </div>

                <div class="mt-6">
                    <button type="submit"
                        class="btn w-full flex items-center justify-center gap-x-2 bg-gray-900 text-white hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
