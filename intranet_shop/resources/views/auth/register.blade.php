<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label :value="__('Register as:')" />
            <div
                class="grid grid-cols-2 gap-1 mt-2 p-1 bg-gray-100 dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-700">

                <label class="relative cursor-pointer group">
                    <input type="radio" name="role_id" value="3" class="peer sr-only"
                        {{ old('role_id', '3') == '3' ? 'checked' : '' }}>
                    <div
                        class="w-full text-center py-2.5 px-4 text-sm font-semibold text-gray-600 dark:text-gray-400 bg-transparent rounded-lg transition-all duration-200 ease-in-out
                hover:bg-gray-200 dark:hover:bg-gray-800 
                active:scale-95
                peer-checked:bg-white dark:peer-checked:bg-gray-700 peer-checked:text-indigo-600 dark:peer-checked:text-indigo-400 peer-checked:shadow-md peer-checked:ring-1 peer-checked:ring-black/5">
                        {{ __('Employee') }}
                    </div>
                </label>

                <label class="relative cursor-pointer group">
                    <input type="radio" name="role_id" value="2" class="peer sr-only"
                        {{ old('role_id') == '2' ? 'checked' : '' }}>
                    <div
                        class="w-full text-center py-2.5 px-4 text-sm font-semibold text-gray-600 dark:text-gray-400 bg-transparent rounded-lg transition-all duration-200 ease-in-out
                hover:bg-gray-200 dark:hover:bg-gray-800 
                active:scale-95
                peer-checked:bg-white dark:peer-checked:bg-gray-700 peer-checked:text-indigo-600 dark:peer-checked:text-indigo-400 peer-checked:shadow-md peer-checked:ring-1 peer-checked:ring-black/5">
                        {{ __('Manager') }}
                    </div>
                </label>

            </div>
            <x-input-error :messages="$errors->get('role_id')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="departement_id" :value="__('Departement')" />
            <select id="departement_id" name="departement_id"
                class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option value="" selected disabled>Select Departement</option>
                @foreach ($departements as $departement)
                    <option value="{{ $departement->id }}">{{ $departement->title }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('departement_id')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required/>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-8 space-y-4">
            <x-primary-button class="w-full justify-center py-3">
                {{ __('Create Account') }}
            </x-primary-button>

            <div class="text-center">
                <a class="text-sm text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors duration-200"
                    href="{{ route('login') }}">
                    {{ __('Already have an account? Log in') }}
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>
