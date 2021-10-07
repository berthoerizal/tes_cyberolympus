<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $title = 'Laporan';
        $sub_title = 'laporan';
        return view('laporan.index', ['title' => $title, 'sub_title' => $sub_title]);
    }
}
