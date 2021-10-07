<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $title = 'Product page';
        $sub_title = 'product';
        return view('product.index', ['title' => $title, 'sub_title' => $sub_title]);
    }
}
