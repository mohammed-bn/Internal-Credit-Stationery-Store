<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 p-8">
                
                <div class="mb-8">
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Product Details</h1>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Fill in the information below to add a new item.</p>
                </div>

                {{-- Error Handling --}}
                @if ($errors->any())
                    <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-red-700 dark:bg-red-900/30 dark:text-red-300 dark:border-red-800">
                        <p class="font-medium">Please correct the following errors:</p>
                        <ul class="mt-2 list-disc pl-5 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('products.store') }}" method="POST" class="space-y-6">
                    @csrf

                    {{-- 1. Name --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Product Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" required placeholder="e.g. Wireless Mouse"
                            class="w-full rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    {{-- 2. Price --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Price ($)</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500 dark:text-gray-400">$</span>
                            <input type="number" step="0.01" name="price" value="{{ old('price') }}" required placeholder="0.00"
                                class="w-full pl-7 rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                    </div>

                    {{-- 3. Premium Status --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Is this a Premium Product?</label>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            {{-- Yes Option --}}
                            <label class="relative flex cursor-pointer rounded-xl border p-4 shadow-sm focus:outline-none hover:border-indigo-500 dark:hover:border-indigo-400 bg-white dark:bg-gray-700 border-gray-200 dark:border-gray-600">
                                <input type="radio" name="is_premium" value="1" class="sr-only peer" {{ old('is_premium') == '1' ? 'checked' : '' }} required>
                                <span class="flex flex-1">
                                    <span class="flex flex-col">
                                        <span class="block text-sm font-medium text-gray-900 dark:text-white">Premium</span>
                                        <span class="mt-1 flex items-center text-xs text-gray-500 dark:text-gray-400">Highlighted in store</span>
                                    </span>
                                </span>
                                <svg class="h-5 w-5 text-indigo-600 invisible peer-checked:visible" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="pointer-events-none absolute -inset-px rounded-xl border-2 border-transparent peer-checked:border-indigo-500" aria-hidden="true"></span>
                            </label>

                            {{-- No Option --}}
                            <label class="relative flex cursor-pointer rounded-xl border p-4 shadow-sm focus:outline-none hover:border-indigo-500 dark:hover:border-indigo-400 bg-white dark:bg-gray-700 border-gray-200 dark:border-gray-600">
                                <input type="radio" name="is_premium" value="0" class="sr-only peer" {{ old('is_premium') == '0' ? 'checked' : '' }} required>
                                <span class="flex flex-1">
                                    <span class="flex flex-col">
                                        <span class="block text-sm font-medium text-gray-900 dark:text-white">Standard</span>
                                        <span class="mt-1 flex items-center text-xs text-gray-500 dark:text-gray-400">Regular listing</span>
                                    </span>
                                </span>
                                <svg class="h-5 w-5 text-indigo-600 invisible peer-checked:visible" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="pointer-events-none absolute -inset-px rounded-xl border-2 border-transparent peer-checked:border-indigo-500" aria-hidden="true"></span>
                            </label>
                        </div>
                    </div>

                    {{-- Actions --}}
                    <div class="flex items-center justify-end gap-4 pt-4 border-t border-gray-100 dark:border-gray-700">
                        <a href="{{ route('products.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                            Cancel
                        </a>
                        <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-indigo-600 px-8 py-3 text-sm font-bold text-white shadow-lg shadow-indigo-200 dark:shadow-none transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Create Product
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>