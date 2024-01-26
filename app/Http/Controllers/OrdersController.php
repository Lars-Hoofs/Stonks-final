<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

use Illuminate\Support\Facades\Auth;



class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::all(); 
        return view('dashboard', ['orders' => $orders]);
    }
    public function updateStatus(Request $request, $orderId)
    {

        $request->validate([
            'status' => 'required|in:pending,processing,completed,canceled',
        ]);


        $order = Order::findOrFail($orderId);

        $order->update(['status' => $request->status]);


        return redirect()->route('admin.orders.index')->with('success', 'Order status updated successfully.');
    }
}
