<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view("admin.index");
    }
    public function transaksi() {
        return view("admin.transaksi");
    }

    public function dashboard() {
        return view('admin.dashboard');
    }
}
