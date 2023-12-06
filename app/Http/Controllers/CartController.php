<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateCartRequest;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validator = Validator::make($request->all(), [
            'nama_menu' => 'required',
            'harga_menu' => 'required',
            'jumlah_beli' => 'required'
        ]);

        if ($validator->fails()) {
            toastr()->error('Gagal Menambahkan Ke Keranjang', 'Gagal');
            return to_route('transaction.index');
        }

        $totalHarga = $request->harga_menu * $request->jumlah_beli;

        Cart::create([
            'nama_menu' => $request->nama_menu,
            'harga_menu' => $request->harga_menu,
            'jumlah_beli' => $request->jumlah_beli,
            'total_harga' => $totalHarga
        ]);

        toastr()->success('Berhasil Ditambahkan ke Keranjang');
        return to_route('transaction.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = Cart::findOrFail($id);
        $item->delete();
        return to_route('transaction.index');
    }
}
