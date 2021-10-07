<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $title = 'Product';
        $sub_title = 'product';
        $products = DB::table('product')
            ->leftJoin('product_category', 'product.category', '=', 'product_category.id')
            ->select('product.*', 'product_category.name')
            ->paginate(5);
        return view('product.index', ['title' => $title, 'sub_title' => $sub_title, 'products' => $products]);
    }
}
