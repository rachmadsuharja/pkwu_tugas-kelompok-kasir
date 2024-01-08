@extends('admin.layouts.main')

@php
    use Carbon\Carbon;
@endphp

@section('container')
<div class="card mb-4">
    <div class="card-header fw-bold">
        Detail Penjualan
        <small class="d-grid mt-1 text-black-50">No. Transaksi: {{ $history->no_transaksi }}</small>
    </div>
    <div class="card-body">
        <div class="row mb-4">
            <div class="col">
                <table class="w-50">
                    <tr>
                        <th>Tanggal Transaksi</th>
                        <td>:</td>
                        <td>{{ Carbon::parse($history->created_at)->isoFormat('h:m A, DD-MM-YYYY') }}</td>
                    </tr>
                    <tr>
                        <th>Nama Kasir</th>
                        <td>:</td>
                        <td>{{ $history->nama_kasir }}</td>
                    </tr>
                    <tr>
                        <th>Total Harga (Keseluruhan)</th>
                        <td>:</td>
                        <td>{{ $history->total_harga }}</td>
                    </tr>
                    <tr>
                        <th>Total Bayar</th>
                        <td>:</td>
                        <td>{{ $history->total_bayar }}</td>
                    </tr>
                    <tr>
                        <th>Kembalian</th>
                        <td>:</td>
                        <td>{{ $history->uang_kembali }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama Menu</th>
                            <th>Harga Satuan</th>
                            <th>Jumlah Beli</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($details as $detail)
                            <tr>
                                <td>{{ $detail->nama_menu }}</td>
                                <td>{{ $detail->harga_menu }}</td>
                                <td>{{ $detail->jumlah_beli }}</td>
                                <td>{{ $detail->total_harga }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a href="{{ route('history.index') }}" class="btn btn-primary btn-sm">Kembali</a>
    </div>
@endsection
