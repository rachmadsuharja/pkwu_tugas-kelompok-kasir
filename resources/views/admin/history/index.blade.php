@extends('admin.layouts.main')

@php
    use Carbon\Carbon;
@endphp

@section('container')
    <div class="card mb-4">
        <div class="card-header">Laporan Penjualan</div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No. Transaksi</th>
                                <th>Menu Terjual</th>
                                <th>Total Harga</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($histories as $history)
                                <tr>
                                    <td>{{ $history->no_transaksi }}</td>
                                    <td>{{ $history->nama_menu }}</td>
                                    <td>{{ $history->total_harga }}</td>
                                    <td>{{ Carbon::parse($history->created_at)->isoFormat('h:m A, DD-MM-YYYY') }}</td>
                                    <td class="d-flex flex-row">
                                        <a href="{{ route('history.show', $history->no_transaksi) }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-eye"></i></a>
                                        <button class="btn btn-warning btn-sm"><i class="fa-solid fa-print"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
