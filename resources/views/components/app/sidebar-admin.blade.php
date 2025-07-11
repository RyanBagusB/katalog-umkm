<div>
    <!-- Section Title -->
    <h3 class="text-xs uppercase text-gray-400 dark:text-gray-500 font-semibold pl-3">
        <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6" aria-hidden="true">•••</span>
        <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Admin</span>
    </h3>

    <ul class="mt-3 space-y-1">
        <!-- Dashboard -->
        <li
            x-data="{ open: {{ Request::is('admin/dashboard*') ? 'true' : 'false' }} }"
            @class([
                'pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-linear-to-r',
                'from-violet-500/[0.12] dark:from-violet-500/[0.24] to-violet-500/[0.04]' => Request::is('admin/dashboard*')
            ])
        >
            <button class="block text-gray-800 dark:text-gray-100 truncate transition hover:text-gray-900 dark:hover:text-white cursor-pointer"
                @click.prevent="open = !open; sidebarExpanded = true">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <svg
                            @class([
                                'shrink-0 fill-current',
                                'text-violet-500' => Request::is('admin/dashboard*'),
                                'text-gray-400 dark:text-gray-500' => !Request::is('admin/dashboard*'),
                            ])
                            xmlns="http://www.w3.org/2000/svg"
                            width="16" height="16"
                            viewBox="0 0 20 20">
                            <path d="M10.707 1.293a1 1 0 00-1.414 0L2 8.586V13a1 1 0 001 1h3v-3a1 1 0 011-1h2a1 1 0 011 1v3h3a1 1 0 001-1V8.586l-7.293-7.293z" />
                        </svg>
                        <span class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                            Dashboard
                        </span>
                    </div>
                    <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-gray-400 dark:text-gray-500"
                            :class="open ? 'rotate-180' : 'rotate-0'"
                            viewBox="0 0 12 12">
                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"/>
                        </svg>
                    </div>
                </div>
            </button>
            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                <ul class="pl-8 mt-1" :class="open ? 'block' : 'hidden'">
                    <li class="mb-1 last:mb-0">
                        <a @class([
                            'block text-gray-500/90 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition truncate',
                            'text-violet-500!' => Route::is('admin.dashboard')
                        ]) href="{{ route('admin.dashboard') }}">
                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                Analytics
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Merchants -->
        <li
            x-data="{ open: {{ Request::is('admin/merchants*') ? 'true' : 'false' }} }"
            @class([
                'pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-linear-to-r',
                'from-violet-500/[0.12] dark:from-violet-500/[0.24] to-violet-500/[0.04]' => Request::is('admin/merchants*')
            ])
        >
            <button class="block text-gray-800 dark:text-gray-100 truncate transition hover:text-gray-900 dark:hover:text-white cursor-pointer"
                @click.prevent="open = !open; sidebarExpanded = true">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <svg
                            @class([
                                'shrink-0 fill-current',
                                'text-violet-500' => Request::is('admin/merchants*'),
                                'text-gray-400 dark:text-gray-500' => !Request::is('admin/merchants*'),
                            ])
                            xmlns="http://www.w3.org/2000/svg"
                            width="16" height="16"
                            viewBox="0 0 24 24">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 4.17 3.67 7.86 7.65 11.54.22.21.58.21.8 0C15.33 16.86 19 13.17 19 9c0-3.87-3.13-7-7-7zm0 9c-1.1 0-2-.9-2-2s.9-2 2-2
                            2 .9 2 2-.9 2-2 2z"/>
                        </svg>
                        <span class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                            Merchant
                        </span>
                    </div>
                    <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-gray-400 dark:text-gray-500"
                            :class="open ? 'rotate-180' : 'rotate-0'"
                            viewBox="0 0 12 12">
                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"/>
                        </svg>
                    </div>
                </div>
            </button>
            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                <ul class="pl-8 mt-1" :class="open ? 'block' : 'hidden'">
                    <li class="mb-1 last:mb-0">
                        <a @class([
                            'block text-gray-500/90 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition truncate',
                            'text-violet-500!' => Route::is('admin.merchants.index')
                        ]) href="{{ route('admin.merchants.index') }}">
                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                List Merchant
                            </span>
                        </a>
                    </li>
                    {{-- <li class="mb-1 last:mb-0">
                        <a @class([
                            'block text-gray-500/90 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition truncate',
                            'text-violet-500!' => Route::is('admin.merchants.create')
                        ]) href="{{ route('admin.merchants.create') }}">
                            <span class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                Tambah Merchant
                            </span>
                        </a>
                    </li> --}}
                </ul>
            </div>
        </li>

        <!-- Persetujuan Produk + Revisi -->
        {{-- <li
            x-data="{ open: {{ Request::is('admin/products*') || Request::is('admin/product-revisions*') ? 'true' : 'false' }} }"
            @class([
                'pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-linear-to-r',
                'from-violet-500/[0.12] dark:from-violet-500/[0.24] to-violet-500/[0.04]' => Request::is('admin/products*') || Request::is('admin/product-revisions*')
            ])
        >
            <button class="block text-gray-800 dark:text-gray-100 truncate transition hover:text-gray-900 dark:hover:text-white cursor-pointer"
                @click.prevent="open = !open; sidebarExpanded = true">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <svg
                            @class([
                                'shrink-0 fill-current',
                                'text-violet-500' => Request::is('admin/products*') || Request::is('admin/product-revisions*'),
                                'text-gray-400 dark:text-gray-500' => !Request::is('admin/products*') && !Request::is('admin/product-revisions*'),
                            ])
                            xmlns="http://www.w3.org/2000/svg"
                            width="16"
                            height="16"
                            viewBox="0 0 24 24">
                            <path d="M3 4h18v2H3V4zm0 14h18v2H3v-2zM3 10h18v2H3v-2zm0 4h18v2H3v-2z"/>
                        </svg>
                        <span class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                            Persetujuan Produk
                        </span>
                    </div>
                    <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-gray-400 dark:text-gray-500"
                            :class="open ? 'rotate-180' : 'rotate-0'"
                            viewBox="0 0 12 12">
                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"/>
                        </svg>
                    </div>
                </div>
            </button>
            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                <ul class="pl-8 mt-1" :class="open ? 'block' : 'hidden'">
                    <li class="mb-1 last:mb-0">
                        <a @class([
                            'block text-gray-500/90 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition truncate',
                            'text-violet-500!' => Route::is('admin.products.index')
                        ]) href="{{ route('admin.products.index') }}">
                            <span class="text-sm font-medium">Daftar Produk</span>
                        </a>
                    </li>
                    <li class="mb-1 last:mb-0">
                        <a @class([
                            'block text-gray-500/90 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition truncate',
                            'text-violet-500!' => Route::is('admin.product-revisions.index')
                        ]) href="{{ route('admin.product-revisions.index') }}">
                            <span class="text-sm font-medium">Daftar Revisi</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li> --}}
    </ul>
</div>
