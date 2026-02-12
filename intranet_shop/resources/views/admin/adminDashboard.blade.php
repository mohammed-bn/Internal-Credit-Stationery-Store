<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Admin Dashboard') }}
            </h2>
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800 dark:bg-purple-900/50 dark:text-purple-300">
                Administrator
            </span>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Main Action Container --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- CARD 1: Product Inventory (Manage Existing) --}}
                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-md transition-shadow duration-300 relative group">
                    <div class="p-8">
                        {{-- Icon --}}
                        <div
                            class="w-14 h-14 bg-indigo-50 dark:bg-indigo-900/30 rounded-2xl flex items-center justify-center mb-6 text-indigo-600 dark:text-indigo-400 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>

                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
                            Product Inventory
                        </h3>
                        <p class="text-gray-500 dark:text-gray-400 mb-8">
                            Access the full product catalog. Update prices, manage stock, or remove outdated products.
                        </p>

                        <a href="{{ route('products.index') }}"
                            class="inline-flex items-center justify-center w-full px-5 py-3 bg-indigo-600 hover:bg-indigo-700 text-white text-base font-semibold rounded-xl shadow-lg shadow-indigo-200 dark:shadow-none transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Manage Products
                            <svg class="w-5 h-5 ml-2 -mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- CARD 2: Create New Product (Add) --}}
                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-md transition-shadow duration-300 relative group">
                    <div class="p-8">

                        {{-- Icon --}}
                        <div
                            class="w-14 h-14 bg-green-50 dark:bg-green-900/30 rounded-2xl flex items-center justify-center mb-6 text-green-600 dark:text-green-400 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                        </div>

                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
                            Add New Product
                        </h3>
                        <p class="text-gray-500 dark:text-gray-400 mb-8">
                            Expand your inventory by listing new items. Set names, prices, and premium status.
                        </p>

                        {{-- Action Button --}}
                        <a href="{{ route('products.create') }}"
                            class="inline-flex items-center justify-center w-full px-5 py-3 bg-white border-2 border-green-600 text-green-700 hover:bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700 text-base font-bold rounded-xl transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                            Create Product
                            <svg class="w-5 h-5 ml-2 -mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                        </a>

                    </div>

                    {{-- Decorative Background Blob --}}
                    <div
                        class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-green-50 dark:bg-green-900/10 rounded-full blur-xl opacity-50 pointer-events-none">
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
