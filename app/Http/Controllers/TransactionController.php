<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Menu;
use App\Models\History;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        $categories = Category::all();
        $carts = Cart::all();
        $priceTotal = Cart::sum('total_harga');
        return view("admin.transaction.index", compact('menus', 'categories', 'carts', 'priceTotal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $harga = $request->total_harga;
        $bayar = $request->total_bayar;
        $validator = Validator::make($request->all(), [
            'total_harga' => 'required|gt:0',
            'total_bayar' => 'required|gt:0'
        ]);
        if ($validator->fails()) {
            toastr()->error('Gagal Checkout', 'Gagal');
            return to_route('transaction.index');
        }
        if ($bayar < $harga) {
            toastr()->error('Uang Tidak Cukup', 'Gagal');
            return to_route('transaction.index');
        }
        $now = Carbon::now();
        $nomorTransaksi = $now->format('d'.'m'.'y').rand(100000, 999999);
        $kasir = Auth::user()->nama;
        $allDataInCart = Cart::pluck('nama_menu')->toArray();
        $cart = collect($allDataInCart)->take(4)->all();
        if (count($allDataInCart) > 4) {
            $item = implode(', ', $cart).', dll';
        } else {
            $item = implode(', ', $cart);
        }
        $kembalian = $bayar - $harga;
        History::create([
            'no_transaksi' => $nomorTransaksi,
            'nama_menu' => $item,
            'nama_kasir' => $kasir,
            'total_harga' => $harga,
            'total_bayar' => $bayar,
            'uang_kembali' => $kembalian
        ]);
        $data = Cart::all();
        foreach ($data as $item) {
            $details = new TransactionDetail();
            $details->no_transaksi = $nomorTransaksi;
            $details->nama_menu = $item->nama_menu;
            $details->harga_menu = $item->harga_menu;
            $details->jumlah_beli = $item->jumlah_beli;
            $details->total_harga = $item->total_harga;
            $details->save();
        }
        Cart::truncate();
        toastr()->success('Berhasil');
        return to_route('print-invoice', $nomorTransaksi);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
