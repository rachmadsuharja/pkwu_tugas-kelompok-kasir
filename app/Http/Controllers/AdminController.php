<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index() {
        return view("admin.index");
    }

    public function dashboard() {
        $menu = Menu::all();
        $terlaris = TransactionDetail::select('nama_menu', DB::raw('SUM(jumlah_beli) as total_terjual'))
        ->whereMonth('created_at', now()->month)
        ->whereYear('created_at', now()->year)
        ->groupBy('nama_menu')
        ->orderByDesc('total_terjual')
        ->limit(1)
        ->first();
        $order = TransactionDetail::sum('jumlah_beli');
        $pendapatan = TransactionDetail::sum('total_harga');
        return view('admin.dashboard', compact('menu','terlaris','order','pendapatan'));
    }
}
