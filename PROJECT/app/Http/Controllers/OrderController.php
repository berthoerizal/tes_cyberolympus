<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $title = 'Order';
        $sub_title = 'order';
        $orders = DB::table('orders')
            ->leftJoin('users', 'orders.agent_id', '=', 'users.id')
            ->leftJoin('order_detail', 'orders.id', '=', 'order_detail.order_id')
            ->select(
                'orders.*',
                'users.first_name',
                'users.last_name',
                DB::raw('sum(order_detail.qty) as sum_qty'),
                DB::raw('count(order_detail.id) as count_item')
            )
            ->groupBy('invoice_id')
            ->paginate(5);


        return view('order.index', ['title' => $title, 'sub_title' => $sub_title, 'orders' => $orders]);
    }
}
