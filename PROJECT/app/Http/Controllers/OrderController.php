<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $title = 'Order page';
        $sub_title = 'order';
        return view('order.index', ['title' => $title, 'sub_title' => $sub_title]);
    }
}
