<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;

class OrderController extends Controller
{
    public function showOrders()
    {
        $orders = Order::with(['user', 'assignedTo'])->get(); // Load both user relationships
        return view('pages.orders.orders', compact('orders'));
    }
}
