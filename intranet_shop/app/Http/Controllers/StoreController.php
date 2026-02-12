<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    public function list()
    {
        $products = Product::latest()->paginate(9);

        return view('store', compact('products'));
    }
}