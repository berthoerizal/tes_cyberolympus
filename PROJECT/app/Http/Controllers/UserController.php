<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function customer()
    {
        $title = "Customer page";
        $sub_title = 'user';
        $users = DB::table('users')->where('account_role', 'customer')->get();
        return view('user.index', ['title' => $title, 'users' => $users, 'sub_title' => $sub_title]);
    }

    public function agent()
    {
        $title = "Agent page";
        $sub_title = 'user';
        $users = DB::table('users')->where('account_role', 'agent')->get();
        return view('user.index', ['title' => $title, 'users' => $users, 'sub_title' => $sub_title]);
    }
}
