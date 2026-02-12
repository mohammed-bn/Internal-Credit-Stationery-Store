<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Employee Market') }}
            </h2>
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800 dark:bg-indigo-900/50 dark:text-indigo-300">
                {{ $orders->count() }} Active Orders
            </span>
        </div>
        <a href="{{ route('store.list') }}"
            class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-lg shadow-sm transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 w-full md:w-auto">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
            Visit Store
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Toolbar: Search + Store Button --}}
            <div class="flex flex-col md:flex-row gap-4 mb-8 items-center justify-between">

                {{-- Search Bar --}}
                <div class="relative w-full md:w-96">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" placeholder="Search orders..."
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-gray-800 text-gray-300 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                {{-- NEW: Visit Store Button --}}


            </div>

            {{-- Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($orders as $order)
                    <div
                        class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-md transition-shadow duration-300">
                        <div
                            class="p-5 border-b border-gray-50 dark:border-gray-700/50 flex justify-between items-start">
                            <div class="p-3 bg-indigo-50 dark:bg-indigo-900/30 rounded-xl">
                                <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                            </div>
                            <span
                                class="text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded-md 
                                {{ $order->status === 'completed' ? 'bg-green-100 text-green-700 dark:bg-green-900/40 dark:text-green-400' : 'bg-amber-100 text-amber-700 dark:bg-amber-900/40 dark:text-amber-400' }}">
                                {{ $order->status }}
                            </span>
                        </div>

                        <div class="p-5">
                            <h4 class="text-lg font-bold text-gray-900 dark:text-white truncate">
                                {{ $order->product->name ?? 'Premium Item' }}
                            </h4>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1 line-clamp-1">
                                Order #{{ $order->id }} • {{ $order->created_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div
                        class="col-span-full py-20 text-center bg-white dark:bg-gray-800 rounded-2xl border-2 border-dashed border-gray-200 dark:border-gray-700">
                        <div class="text-gray-400 mb-2">No active orders found</div>
                        <a href="{{ route('store.list') }}" class="text-indigo-600 font-bold hover:underline">Browse the
                            catalog</a>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>
