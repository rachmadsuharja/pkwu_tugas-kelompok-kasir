<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required'
        ]);

        if ($validator->fails()) {
            toastr()->error('Gagal Menambahkan Kategori', 'Gagal');
            return back();
        }

        Category::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        toastr()->success('Berhasil Menambahkan Kategori', 'Berhasil');
        return to_route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Category::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required'
        ]);

        if ($validator->fails()) {
            toastr()->error('Gagal Mengubah Kategori', 'Gagal');
            return back();
        }

        $data->update([
            'nama_kategori' => $request->nama_kategori
        ]);

        toastr()->success('Berhasil Mengubah Kategori', 'Berhasil');
        return to_route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Category::findOrFail($id);
        $data->delete();
        toastr()->success('Berhasil Menghapus Data', 'Berhasil');
        return to_route('category.index');
    }
}
