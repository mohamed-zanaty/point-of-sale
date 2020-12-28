<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        $categories = Category::count();
        $brands = Brand::count();
        $products = Product::count();
        $clients = Client::count();
        $posts = Blog::count();
        $admins = Admin::whereRoleIs('admin')->count();
        $orders = Order::count();

        $sales_data = Order::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(total_price) as sum')
        )->groupBy('month')->get();

        return view('dashboard.dashboard',compact('categories','brands','posts','admins','clients','orders','sales_data',
        'products'));
    }
}
