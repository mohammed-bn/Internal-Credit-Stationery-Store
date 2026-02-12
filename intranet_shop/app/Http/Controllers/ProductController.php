<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('ProductView.index', compact('products'));
    }

    public function create()
    {
        return view('ProductView.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:45',
            'price'      => 'required|numeric|min:0',
            'is_premium' => 'required|boolean',
        ]);

        Product::create($validated);

        return redirect()->route('products.index')
            ->with('success', 'Produit ajouté avec succès');
    }

    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('ProductView.show', compact('product'));
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('ProductView.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:45',
            'price'      => 'required|numeric|min:0',
            'is_premium' => 'required|boolean',
            // We removed description/type here so the form doesn't fail
        ]);

        $product->update($validated);

        return redirect()->route('products.index')
            ->with('success', 'Produit modifié avec succès');
    }

public function destroy(Product $product)
{
    $product->orders()->delete();

    $product->delete();

    return back()->with('success', 'Product and related orders deleted');
}
}
