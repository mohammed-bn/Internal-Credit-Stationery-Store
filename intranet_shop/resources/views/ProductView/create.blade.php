<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @extends('layouts.app')

    @section('slot')
        <div class="min-h-screen bg-slate-50">
            <div class="mx-auto max-w-3xl px-4 py-10">
                <div class="mb-6">
                    <h1 class="text-2xl font-semibold tracking-tight text-slate-900">Ajouter un produit</h1>
                    <p class="mt-1 text-sm text-slate-600">Remplis les informations ci-dessous pour créer un nouveau produit.
                    </p>
                </div>

                <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
                    {{-- Erreurs --}}
                    @if ($errors->any())
                        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-red-700">
                            <p class="font-medium">Oups ! Vérifie les champs :</p>
                            <ul class="mt-2 list-disc pl-5 text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('products.store') }}" method="POST" class="space-y-5">
                        @csrf

                        {{-- Nom --}}
                        <div>
                            <label class="block text-sm font-medium text-slate-700">Nom</label>
                            <input type="text" name="nom" value="{{ old('nom') }}" required
                                placeholder="Ex: iPhone 15 Pro"
                                class="mt-2 w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-slate-900
                               placeholder:text-slate-400 shadow-sm outline-none transition
                               focus:border-slate-400 focus:ring-4 focus:ring-slate-100">
                        </div>

                        {{-- Description --}}
                        <div>
                            <label class="block text-sm font-medium text-slate-700">Description</label>
                            <textarea name="description" rows="4" required placeholder="Décris le produit..."
                                class="mt-2 w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-slate-900
                               placeholder:text-slate-400 shadow-sm outline-none transition
                               focus:border-slate-400 focus:ring-4 focus:ring-slate-100">{{ old('description') }}</textarea>
                        </div>

                        {{-- Prix + Type --}}
                        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                            <div>
                                <label class="block text-sm font-medium text-slate-700">Prix</label>
                                <div class="relative mt-2">
                                    <span
                                        class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                                        MAD
                                    </span>
                                    <input type="number" step="0.01" name="prix" value="{{ old('prix') }}" required
                                        placeholder="0.00"
                                        class="w-full rounded-xl border border-slate-200 bg-white py-2.5 pl-14 pr-4 text-slate-900
                                       placeholder:text-slate-400 shadow-sm outline-none transition
                                       focus:border-slate-400 focus:ring-4 focus:ring-slate-100">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-700">Type</label>
                                <input type="text" name="type" value="{{ old('type') }}" required
                                    placeholder="Ex: Électronique"
                                    class="mt-2 w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-slate-900
                                   placeholder:text-slate-400 shadow-sm outline-none transition
                                   focus:border-slate-400 focus:ring-4 focus:ring-slate-100">
                            </div>
                        </div>

                        {{-- Produit (boolean) --}}
                        <div>
                            <label class="block text-sm font-medium text-slate-700">Produit ?</label>
                            <div class="mt-2 grid grid-cols-1 gap-3 sm:grid-cols-2">
                                <label
                                    class="flex cursor-pointer items-center gap-3 rounded-xl border border-slate-200 bg-white p-3 shadow-sm
                                      transition hover:border-slate-300">
                                    <input type="radio" name="produit" value="1" class="h-4 w-4"
                                        {{ old('produit') === '1' ? 'checked' : '' }} required>
                                    <div>
                                        <p class="text-sm font-medium text-slate-900">Oui</p>
                                        <p class="text-xs text-slate-500">C’est un produit actif.</p>
                                    </div>
                                </label>

                                <label
                                    class="flex cursor-pointer items-center gap-3 rounded-xl border border-slate-200 bg-white p-3 shadow-sm
                                      transition hover:border-slate-300">
                                    <input type="radio" name="produit" value="0" class="h-4 w-4"
                                        {{ old('produit') === '0' ? 'checked' : '' }} required>
                                    <div>
                                        <p class="text-sm font-medium text-slate-900">Non</p>
                                        <p class="text-xs text-slate-500">Pas un produit (désactivé).</p>
                                    </div>
                                </label>
                            </div>
                        </div>

                        {{-- Actions --}}
                        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-end">
                            <a href="{{ route('products.index') }}"
                                class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-4 py-2.5
                              text-sm font-medium text-slate-700 shadow-sm transition hover:bg-slate-50">
                                Annuler
                            </a>

                            <button type="submit"
                                class="inline-flex items-center justify-center rounded-xl bg-slate-900 px-4 py-2.5
                                   text-sm font-semibold text-white shadow-sm transition hover:bg-slate-800
                                   focus:outline-none focus:ring-4 focus:ring-slate-200">
                                Ajouter
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

</body>

</html>
