<?php

namespace App\Http\Controllers\Dashboard\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function __construct()
    {

        $this->middleware(['permission:orders_create'])->only('store');
        $this->middleware(['permission:orders_update'])->only('edit');

    }//end of constructor

    public function create(Client $client)
    {


        $categories = Category::all();

       $orders = $client->orders()->with('products')->paginate(5);

        return view('dashboard.page.client.order.create', compact('client', 'categories','orders'));

    }//end of create

    public function store(Request $request, Client $client)
    {

        $request->validate([
            'products' => 'required|array',
        ]);

        $this->attach_order($request, $client);

        toast('order add success', 'success');
        return redirect()->route('order.index');

    }//end of store

    public function edit(Client $client, Order $order)
    {
        $categories = Category::with('products')->get();
        $orders = $client->orders()->with('products')->paginate(5);
        return view('dashboard.page.client.order.edit', compact('client', 'order', 'categories', 'orders'));

    }//end of edit

    public function update(Request $request, Client $client, Order $order)
    {
        $request->validate([
            'products' => 'required|array',
        ]);

        $this->detach_order($order);

        $this->attach_order($request, $client);

        toast('order updated success', 'success');
        return redirect()->route('order.index');

    }//end of update


    private function attach_order($request, $client)
    {
        $order = $client->orders()->create([]);

        $order->products()->attach($request->products);

        $total_price = 0;

        foreach ($request->products as $id => $quantity) {

            $product = Product::FindOrFail($id);
            $total_price += $product->sale_price * $quantity['quantity'];

            $product->update([
                'stock' => $product->stock - $quantity['quantity']
            ]);

        }//end of foreach

        $order->update([
            'total_price' => $total_price
        ]);

    }//end of attach order



    private function detach_order($order)
    {
        foreach ($order->products as $product) {

            $product->update([
                'stock' => $product->stock + $product->pivot->quantity
            ]);

        }//end of for each

        $order->delete();

    }//end of detach order

}//end of controller
