<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Menu;
use App\Models\History;
use App\Models\Category;
use App\Models\Finance;
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
        $modal = Finance::findOrFail(1);
        $terlaris = TransactionDetail::select('nama_menu', DB::raw('SUM(jumlah_beli) as total_terjual'))
        ->whereMonth('created_at', now()->month)
        ->whereYear('created_at', now()->year)
        ->groupBy('nama_menu')
        ->orderByDesc('total_terjual')
        ->limit(1)
        ->first();

        $now = Carbon::now();
        $order = DB::table('transaction_details')->whereMonth('created_at', $now)->sum('jumlah_beli');
        $pendapatan = DB::table('transaction_details')->whereMonth('created_at', $now)->sum('total_harga');

        //chart
        $jan = DB::table('histories')->whereMonth('created_at', 1)->sum('total_harga');
        $feb = DB::table('histories')->whereMonth('created_at', 2)->sum('total_harga');
        $mar = DB::table('histories')->whereMonth('created_at', 3)->sum('total_harga');
        $apr = DB::table('histories')->whereMonth('created_at', 4)->sum('total_harga');
        $may = DB::table('histories')->whereMonth('created_at', 5)->sum('total_harga');
        $jun = DB::table('histories')->whereMonth('created_at', 6)->sum('total_harga');
        $jul = DB::table('histories')->whereMonth('created_at', 7)->sum('total_harga');
        $aug = DB::table('histories')->whereMonth('created_at', 8)->sum('total_harga');
        $sep = DB::table('histories')->whereMonth('created_at', 9)->sum('total_harga');
        $oct = DB::table('histories')->whereMonth('created_at', 10)->sum('total_harga');
        $nov = DB::table('histories')->whereMonth('created_at', 11)->sum('total_harga');
        $dec = DB::table('histories')->whereMonth('created_at', 12)->sum('total_harga');
        $incomeChart = [
            'Jan' => $jan,
            'Feb' => $feb,
            'Mar' => $mar,
            'Apr' => $apr,
            'May' => $may,
            'Jun' => $jun,
            'Jul' => $jul,
            'Aug' => $aug,
            'Sep' => $sep,
            'Oct' => $oct,
            'Nov' => $nov,
            'Dec' => $dec,
        ];

        return view('admin.dashboard', compact('menu','terlaris','order','pendapatan','incomeChart', 'modal'));
    }

    public function updateCapital(Request $request, $id) {
        $this->validate($request, [
            'modal' => 'nullable|numeric|gt:0'
        ]);
        $todaysCapital = Finance::findOrFail($id);
        $todaysCapital->update([
            'modal' => $request->modal
        ]);

        toastr()->success('Berhasil memperbarui modal', 'Berhasil');
        return to_route('dashboard');
    }
}
