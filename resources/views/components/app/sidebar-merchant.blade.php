<div>
    <!-- Section Title -->
    <h3 class="text-xs uppercase text-gray-400 dark:text-gray-500 font-semibold pl-3">
        <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6" aria-hidden="true">•••</span>
        <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Merchant</span>
    </h3>

    <ul class="mt-3 space-y-1">
        <!-- Dashboard -->
        <li
            @class([
                'pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-linear-to-r',
                'from-violet-500/[0.12] dark:from-violet-500/[0.24] to-violet-500/[0.04]' => Request::is('merchant/dashboard')
            ])
        >
            <a href="{{ route('merchant.dashboard') }}"
               class="flex items-center text-gray-800 dark:text-gray-100 hover:text-gray-900 dark:hover:text-white transition truncate">
                <svg
                    @class([
                        'shrink-0 fill-current',
                        'text-violet-500' => Request::is('merchant/dashboard'),
                        'text-gray-400 dark:text-gray-500' => !Request::is('merchant/dashboard'),
                    ])
                    xmlns="http://www.w3.org/2000/svg"
                    width="16" height="16"
                    viewBox="0 0 20 20">
                    <path d="M10.707 1.293a1 1 0 00-1.414 0L2 8.586V13a1 1 0 001 1h3v-3a1 1 0 011-1h2a1 1 0 011 1v3h3a1 1 0 001-1V8.586l-7.293-7.293z" />
                </svg>
                <span class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                    Dashboard
                </span>
            </a>
        </li>
        <!-- Edit Profil -->
        <li
        @class([
            'pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-linear-to-r',
            'from-violet-500/[0.12] dark:from-violet-500/[0.24] to-violet-500/[0.04]' => Request::is('merchant/profile/edit')
        ])
        >
        <a href="{{ route('merchant.profile.edit') }}"
        class="flex items-center text-gray-800 dark:text-gray-100 hover:text-gray-900 dark:hover:text-white transition truncate">
            <svg
                @class([
                    'shrink-0 fill-current',
                    'text-violet-500' => Request::is('merchant/profile/edit'),
                    'text-gray-400 dark:text-gray-500' => !Request::is('merchant/profile/edit'),
                ])
                xmlns="http://www.w3.org/2000/svg"
                width="16" height="16"
                viewBox="0 0 24 24">
                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
            </svg>
            <span class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                Edit Profil
            </span>
        </a>
        </li>

        <!-- Produk -->
        <li
            @class([
                'pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-linear-to-r',
                'from-violet-500/[0.12] dark:from-violet-500/[0.24] to-violet-500/[0.04]' => Request::is('merchant/products*')
            ])
        >
            <a href="{{ route('merchant.products.index') }}"
            class="flex items-center text-gray-800 dark:text-gray-100 hover:text-gray-900 dark:hover:text-white transition truncate">
                <svg
                    @class([
                        'shrink-0 fill-current',
                        'text-violet-500' => Request::is('merchant/products*'),
                        'text-gray-400 dark:text-gray-500' => !Request::is('merchant/products*'),
                    ])
                    xmlns="http://www.w3.org/2000/svg"
                    width="16" height="16"
                    viewBox="0 0 24 24">
                    <path d="M3 4v16h18V4H3zm2 2h14v12H5V6zm4 2v2h6V8H9zm0 4v2h6v-2H9z"/>
                </svg>
                <span class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                    Produk
                </span>
            </a>
        </li>
    </ul>
</div>
