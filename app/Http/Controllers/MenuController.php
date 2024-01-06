<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        $categories = Category::all();
        return view('admin.menu.index', compact('menus', 'categories'));
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
            'kategori' => 'required',
            'harga' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Gagal Menambah Menu', 'Gagal');
            return back();
        }

        Menu::create([
            'nama_menu' => $request->nama_menu,
            'id_kategori' => $request->kategori,
            'harga' => $request->harga,
            'status' => $request->status
        ]);

        toastr()->success('Berhasil Menambah Menu', 'Berhasil');
        return to_route('menu.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Menu::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'nama_menu' => 'required',
            'kategori' => 'required',
            'harga' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            toastr()->error('Gagal Mengubah Menu', 'Gagal');
            return back();
        }

        $data->update([
            'nama_menu' => $request->nama_menu,
            'id_kategori' => $request->kategori,
            'harga' => $request->harga,
            'status' => $request->status
        ]);

        toastr()->success('Berhasil Mengubah Menu', 'Berhasil');
        return to_route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Menu::findOrFail($id);
        $data->delete();
        toastr()->success('Berhasil Menghapus data', 'Berhasil');
        return to_route('menu.index');
    }
}
