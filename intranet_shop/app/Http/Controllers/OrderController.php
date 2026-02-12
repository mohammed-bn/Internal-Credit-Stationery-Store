<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $product = Product::findOrFail($request->product_id);

        Order::create([
            'user_id'    => Auth::id(),
            'product_id' => $product->id,
            'price'      => $product->price,
            'status'     => 'pending',
        ]);

        $user = Auth::user();

        $targetRoute = match ($user->role_id) {
            3 => 'employee.employeeDashboard',
            2  => 'manager.managerDashboard',
            1    => 'admin.adminDashboard',
            default    => 'dashboard',
        };

        return redirect()->route($targetRoute)
            ->with('success', 'Order placed successfully!');
    }
    public function index()
    {
        return view('orders.index');
    }
    public function create() {}
    public function show(Order $order)
    { /* ... */
    }
    public function edit(Order $order)
    { /* ... */
    }
    public function update(Request $request, Order $order)
    { /* ... */
    }
    public function destroy(Order $order)
    { /* ... */
    }
}
