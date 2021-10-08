<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $title = "Create User";
        $sub_title = "user";
        return view('user.create', ['title' => $title, 'sub_title' => $sub_title]);
    }

    public function customer()
    {
        $title = "Customer";
        $sub_title = 'user';
        $users = DB::table('users')
            ->leftJoin('customer', 'users.id', '=', 'customer.id')
            ->where('account_role', 'customer')
            ->select('users.*', 'customer.kota')
            ->paginate(5);
        return view('user.index', ['title' => $title, 'users' => $users, 'sub_title' => $sub_title]);
    }

    public function agent()
    {
        $title = "Agent";
        $sub_title = 'user';
        $users = DB::table('users')
            ->leftJoin('agent', 'users.id', '=', 'agent.id')
            ->where('account_role', 'agent')
            ->select('users.*', 'agent.kota')
            ->paginate(5);
        return view('user.index', ['title' => $title, 'users' => $users, 'sub_title' => $sub_title]);
    }
}
