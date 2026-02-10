<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Store') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($products as $product)
                    <div
                        class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-md transition-shadow duration-300 flex flex-col h-full">

                        {{-- 1. NAME & 3. IS_PREMIUM --}}
                        <div
                            class="p-5 border-b border-gray-50 dark:border-gray-700/50 flex justify-between items-start">

                            {{-- Name --}}
                            <h4 class="text-lg font-bold text-gray-900 dark:text-white truncate pr-4">
                                {{ $product->name }}
                            </h4>

                            {{-- Premium Status (Visualized) --}}
                            @if ($product->is_premium)
                                <span
                                    class="shrink-0 bg-indigo-100 text-indigo-700 dark:bg-indigo-900/40 dark:text-indigo-300 text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded-md">
                                    Premium
                                </span>
                            @endif
                        </div>

                        {{-- 2. PRICE --}}
                        <div class="p-5 flex-grow">
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Price</p>
                            <span class="text-3xl font-bold text-gray-900 dark:text-white">
                                ${{ $product->price }}
                            </span>
                        </div>

                        {{-- 4. CREATED_AT & BUY BUTTON --}}
                        <div
                            class="p-5 pt-0 mt-auto bg-gray-50 dark:bg-gray-700/20 border-t border-gray-100 dark:border-gray-700">
                            <div class="flex justify-between items-center py-4">
                                {{-- Date --}}
                                <p class="text-xs text-gray-400">
                                    Listed: {{ $product->created_at->format('M d, Y') }}
                                </p>

                                {{-- Buy Action --}}
                                <form action="{{ route('orders.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                                    <button type="submit"
                                        class="text-sm font-semibold text-indigo-600 hover:text-indigo-500 hover:underline">
                                        Buy Now &rarr;
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

            {{-- Pagination (Optional) --}}
            <div class="mt-8">
                {{ $products->links() }}
            </div>

        </div>
    </div>
</x-app-layout>
