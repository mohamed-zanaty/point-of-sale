<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:orders_read'])->only(['index','products']);
        $this->middleware(['permission:orders_delete'])->only('destroy');

    }//end of constructor

    public function index()
    {
        $orders = Order::paginate(5);

        return view('dashboard.page.order.index', compact('orders'));

    }//end of index

    public function products(Order $order)
    {
        $products = $order->products;
        return view('dashboard.page.order._products', compact('order', 'products'));

    }//end of products

    public function destroy(Order $order)
    {
        foreach ($order->products as $product) {

            $product->update([
                'stock' => $product->stock + $product->pivot->quantity
            ]);

        }//end of for each

        $order->delete();
        toast('deleted success', 'success');
        return redirect()->route('order.index');

    }//end of order
}
