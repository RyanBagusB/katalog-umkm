<div>
    <!-- Section Title -->
    <h3 class="text-xs uppercase text-gray-400 dark:text-gray-500 font-semibold pl-3">
        <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6" aria-hidden="true">•••</span>
        <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Admin</span>
    </h3>

    <ul class="mt-3 space-y-1">
        <!-- Dashboard -->
        <li
            @class([
                'pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-linear-to-r',
                'from-violet-500/[0.12] dark:from-violet-500/[0.24] to-violet-500/[0.04]' => Request::is('admin/dashboard')
            ])
        >
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center text-gray-800 dark:text-gray-100 hover:text-gray-900 dark:hover:text-white transition truncate">
                <svg
                    @class([
                        'shrink-0 fill-current',
                        'text-violet-500' => Request::is('admin/dashboard'),
                        'text-gray-400 dark:text-gray-500' => !Request::is('admin/dashboard'),
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

        <!-- Merchant -->
        <li
            @class([
                'pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-linear-to-r',
                'from-violet-500/[0.12] dark:from-violet-500/[0.24] to-violet-500/[0.04]' => Request::is('admin/merchants*')
            ])
        >
            <a href="{{ route('admin.merchants.index') }}"
               class="flex items-center text-gray-800 dark:text-gray-100 hover:text-gray-900 dark:hover:text-white transition truncate">
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
            </a>
        </li>

        <!-- News -->
        <li
            @class([
                'pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-linear-to-r',
                'from-violet-500/[0.12] dark:from-violet-500/[0.24] to-violet-500/[0.04]' => Request::is('admin/news*')
            ])
        >
            <a href="{{ route('admin.news.index') }}"
               class="flex items-center text-gray-800 dark:text-gray-100 hover:text-gray-900 dark:hover:text-white transition truncate">
                <svg
                    @class([
                        'shrink-0 fill-current',
                        'text-violet-500' => Request::is('admin/news*'),
                        'text-gray-400 dark:text-gray-500' => !Request::is('admin/news*'),
                    ])
                    xmlns="http://www.w3.org/2000/svg"
                    width="16" height="16"
                    viewBox="0 0 24 24">
                    <path d="M3 4h18c1.1 0 1.99.9 1.99 2L21 18c0 1.1-.9 1.99-2 1.99H5c-1.1 0-1.99-.9-1.99-2L3 6c0-1.1.9-2 2-2zm0 14h18V6H3v12zm4-2h2v-2H7v2zm4 0h2v-2h-2v2zm4 0h2v-2h-2v2z"/>
                </svg>
                <span class="text-sm font-medium ml-4 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                    News
                </span>
            </a>
        </li>
    </ul>
</div>
