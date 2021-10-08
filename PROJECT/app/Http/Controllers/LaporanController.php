<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cari_customer()
    {
        $title = "Cari Customer";
        $sub_title = 'laporan';

        $total_order = DB::table('orders')
            ->leftJoin('order_detail', 'orders.id', '=', 'order_detail.order_id')
            ->select(
                'orders.*',
                DB::raw('count(invoice_id) as total_order')
            )
            ->first();

        $total_item = DB::table('orders')
            ->leftJoin('order_detail', 'orders.id', '=', 'order_detail.order_id')
            ->select(
                'orders.*',
                DB::raw('count(order_detail.product_id) as total_item')
            )
            ->first();

        $jumlah_qty = DB::table('orders')
            ->leftJoin('order_detail', 'orders.id', '=', 'order_detail.order_id')
            ->select(
                'orders.*',
                DB::raw('sum(order_detail.qty) as jumlah_qty')
            )
            ->first();

        $total_bayar = DB::table('orders')
            ->leftJoin('order_detail', 'orders.id', '=', 'order_detail.order_id')
            ->select(
                'orders.*',
                DB::raw('sum(order_detail.total_price) as total_bayar')
            )
            ->first();


        if ((request('start_date') && request('finish_date')) && request('customer_name')) {
            $total_order = DB::table('orders')
                ->leftJoin('order_detail', 'orders.id', '=', 'order_detail.order_id')
                ->select(
                    'orders.*',
                    DB::raw('count(invoice_id) as total_order')
                )
                ->whereBetween('orders.payment_date', [request('start_date'), request('finish_date')])
                ->where('orders.name', request('customer_name'))
                ->first();

            $total_item = DB::table('orders')
                ->leftJoin('order_detail', 'orders.id', '=', 'order_detail.order_id')
                ->select(
                    'orders.*',
                    DB::raw('count(order_detail.product_id) as total_item')
                )
                ->whereBetween('orders.payment_date', [request('start_date'), request('finish_date')])
                ->where('orders.name', request('customer_name'))
                ->first();

            $jumlah_qty = DB::table('orders')
                ->leftJoin('order_detail', 'orders.id', '=', 'order_detail.order_id')
                ->select(
                    'orders.*',
                    DB::raw('sum(order_detail.qty) as jumlah_qty')
                )
                ->whereBetween('orders.payment_date', [request('start_date'), request('finish_date')])
                ->where('orders.name', request('customer_name'))
                ->first();

            $total_bayar = DB::table('orders')
                ->leftJoin('order_detail', 'orders.id', '=', 'order_detail.order_id')
                ->select(
                    'orders.*',
                    DB::raw('sum(order_detail.total_price) as total_bayar')
                )
                ->whereBetween('orders.payment_date', [request('start_date'), request('finish_date')])
                ->where('orders.name', request('customer_name'))
                ->first();
        }

        return view('laporan.cari_customer', ['title' => $title, 'sub_title' => $sub_title, 'total_order' => $total_order, 'total_item' => $total_item, 'jumlah_qty' => $jumlah_qty, 'total_bayar' => $total_bayar]);
    }

    public function cari_order()
    {

        $title = 'Cari Order';
        $sub_title = 'laporan';

        $total_order = DB::table('orders')
            ->leftJoin('order_detail', 'orders.id', '=', 'order_detail.order_id')
            ->select(
                'orders.*',
                DB::raw('count(invoice_id) as total_order')
            )
            ->first();

        $total_item = DB::table('orders')
            ->leftJoin('order_detail', 'orders.id', '=', 'order_detail.order_id')
            ->select(
                'orders.*',
                DB::raw('count(order_detail.product_id) as total_item')
            )
            ->first();

        $jumlah_qty = DB::table('orders')
            ->leftJoin('order_detail', 'orders.id', '=', 'order_detail.order_id')
            ->select(
                'orders.*',
                DB::raw('sum(order_detail.qty) as jumlah_qty')
            )
            ->first();

        $total_bayar = DB::table('orders')
            ->leftJoin('order_detail', 'orders.id', '=', 'order_detail.order_id')
            ->select(
                'orders.*',
                DB::raw('sum(order_detail.total_price) as total_bayar')
            )
            ->first();


        if (request('start_date') && request('finish_date')) {
            $total_order = DB::table('orders')
                ->leftJoin('order_detail', 'orders.id', '=', 'order_detail.order_id')
                ->select(
                    'orders.*',
                    DB::raw('count(invoice_id) as total_order')
                )
                ->whereBetween('orders.payment_date', [request('start_date'), request('finish_date')])
                ->first();

            $total_item = DB::table('orders')
                ->leftJoin('order_detail', 'orders.id', '=', 'order_detail.order_id')
                ->select(
                    'orders.*',
                    DB::raw('count(order_detail.product_id) as total_item')
                )
                ->whereBetween('orders.payment_date', [request('start_date'), request('finish_date')])
                ->first();

            $jumlah_qty = DB::table('orders')
                ->leftJoin('order_detail', 'orders.id', '=', 'order_detail.order_id')
                ->select(
                    'orders.*',
                    DB::raw('sum(order_detail.qty) as jumlah_qty')
                )
                ->whereBetween('orders.payment_date', [request('start_date'), request('finish_date')])
                ->first();

            $total_bayar = DB::table('orders')
                ->leftJoin('order_detail', 'orders.id', '=', 'order_detail.order_id')
                ->select(
                    'orders.*',
                    DB::raw('sum(order_detail.total_price) as total_bayar')
                )
                ->whereBetween('orders.payment_date', [request('start_date'), request('finish_date')])
                ->first();
        }

        return view('laporan.cari_order', ['title' => $title, 'sub_title' => $sub_title, 'total_order' => $total_order, 'total_item' => $total_item, 'jumlah_qty' => $jumlah_qty, 'total_bayar' => $total_bayar]);
    }
}
