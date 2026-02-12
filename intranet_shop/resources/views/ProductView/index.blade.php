<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Grid Container --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach ($products as $product)
                    <div
                        class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden flex flex-col">

                        {{-- UPDATE FORM --}}
                        <form action="{{ route('products.update', $product->id) }}" method="POST" class="p-6 flex-grow">
                            @csrf
                            @method('PUT')

                            {{-- 1. Name Input --}}
                            <div class="mb-4">
                                <label
                                    class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Product
                                    Name</label>
                                <input type="text" name="name" value="{{ $product->name }}"
                                    class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 font-bold text-lg">
                            </div>

                            <div class="grid grid-cols-2 gap-4 mb-6">
                                {{-- 2. Price Input --}}
                                <div>
                                    <label
                                        class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Price
                                        ($)</label>
                                    <input type="number" name="price" value="{{ $product->price }}" step="0.01"
                                        class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                {{-- 3. Premium Select --}}
                                <div>
                                    <label
                                        class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Type</label>
                                    <select name="is_premium"
                                        class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-indigo-500 focus:border-indigo-500">
                                        <option value="0" {{ !$product->is_premium ? 'selected' : '' }}>Standard
                                        </option>
                                        <option value="1" {{ $product->is_premium ? 'selected' : '' }}>Premium
                                        </option>
                                    </select>
                                </div>
                            </div>

                            {{-- Update Button --}}
                            <button type="submit"
                                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg transition duration-200">
                                Update Product
                            </button>
                        </form>

                        {{-- CARD FOOTER: Date & Delete --}}
                        <div
                            class="bg-gray-50 dark:bg-gray-700/30 px-6 py-4 border-t border-gray-100 dark:border-gray-700 flex justify-between items-center">

                            {{-- Created At --}}
                            <span class="text-xs text-gray-400">
                                {{ $product->created_at->format('M d, Y') }}
                            </span>

                            {{-- DELETE FORM --}}
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this product?');">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="text-sm font-semibold text-red-600 hover:text-red-800 dark:hover:text-red-400 transition-colors">
                                    Delete
                                </button>
                            </form>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>
