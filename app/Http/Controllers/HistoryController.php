<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\History;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\StoreHistoryRequest;
use App\Http\Requests\UpdateHistoryRequest;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $histories = History::all();
        $details = TransactionDetail::all();
        return view('admin.history.index', compact('histories', 'details'));
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
    public function store(StoreHistoryRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $history =  History::where('no_transaksi', $id)->first();
        $details = TransactionDetail::where('no_transaksi', $id)->get();
        return view('admin.history.detail', compact('history','details'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(History $history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHistoryRequest $request, History $history)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $history = History::findOrFail($id);
        $history->delete();
        toastr()->success('Berhasil','Berhasil menghapus data');
        return to_route('history.index');
    }

    public function printInvoice($id) {
        $history =  History::where('no_transaksi', $id)->first();
        $details = TransactionDetail::where('no_transaksi', $id)->get();
        return view('admin.history.invoice', compact('history','details'));
}
}
