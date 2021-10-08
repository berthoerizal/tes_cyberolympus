<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = "Home";
        $sub_title = 'home';
        $products = DB::table('order_detail')
            ->leftJoin('product', 'order_detail.product_id', '=', 'product.id')
            ->select('order_detail.*', 'product.product_name', DB::raw('count(*) as count_product'))
            ->groupBy('product_id')
            ->orderBy('count_product', 'desc')
            ->paginate(5);

        $customers = DB::table('orders')
            ->leftJoin('users', 'orders.customer_id', '=', 'users.id')
            ->select('orders.*', 'users.first_name', 'users.last_name', DB::raw('count(*) as count_buy'))
            ->groupBy('customer_id')
            ->orderBy('count_buy', 'desc')
            ->paginate(5);
        return view('home', ['title' => $title, 'sub_title' => $sub_title, 'products' => $products, 'customers' => $customers]);
    }
}
