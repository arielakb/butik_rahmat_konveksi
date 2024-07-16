<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $product_count = Product::count();
        $order_success = Order::where('status', 'completed')->count();
        $order_cancel = Order::where('status', 'cancelled')->count();
        $order = Order::count();

        return view('admin.index', compact('product_count','order_success', 'order_cancel','order'));
    }
}
