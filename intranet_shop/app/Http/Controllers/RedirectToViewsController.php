<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class RedirectToViewsController extends Controller
{
    //
public function employee()
{
    $orders = auth()->user()->orders()->with('product')->get();
    return view('employee.employeeDashboard', compact('orders'));
}
}
