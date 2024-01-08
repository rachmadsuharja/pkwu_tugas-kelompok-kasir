@php
    use Carbon\Carbon;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafe Receipt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        p {
            margin: 0;
            padding: 0;
            font-size: .9rem;
        }
        .info tr td {
            padding: 3px;
            font-size: .9rem;
        }
        .table tfoot tr th {
            font-size: 1rem;
            padding: 0 .5rem;
            border: 0;
        }

        @media print {
            body {
                font-size: 12pt;
            }

            .hide-on-print {
                display: none;
            }

            .print-only {
                display: block;
            }

            /* Contoh pengaturan cetakan */
            @page {
                size: A4;
                margin: 2cm;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row mt-1 d-flex justify-content-center">
            <div class="col-sm-8 col-md-6 col-lg-4 col-xl-4 border border-black p-3">
                <header class="text-center">
                    <h5>Cafe/Resto</h5>
                    <p>Jl. H. O.S. Cokroaminoto No.161, Tompokersan, Lumajang, Jawa Timur, 67316</p>
                    <p>No. Telp: (0334) 881866</p>
                </header>
                <hr>
                <div class="info m-1">
                    <table class="border border-0">
                        <tr>
                            <td>No. Transaksi</td>
                            <td>:</td>
                            <td>{{ $history->no_transaksi }}</td>
                        </tr>
                        <tr>
                            <td>Waktu</td>
                            <td>:</td>
                            <td>{{ Carbon::parse($history->created_at)->isoFormat('h:m A, DD-MM-YYYY') }}</td>
                        </tr>
                        <tr>
                            <td>Nama Kasir</td>
                            <td>:</td>
                            <td>{{ $history->nama_kasir }}</td>
                        </tr>
                    </table>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>QTY</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($details as $detail)
                            <tr>
                                <td>{{ $detail->nama_menu }}</td>
                                <td>{{ number_format($detail->harga_menu) }}</td>
                                <td>{{ $detail->jumlah_beli }}</td>
                                <td>{{ number_format($detail->total_harga) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3">Total</th>
                            <th class="fw-normal">{{ number_format($history->total_harga) }}</th>
                        </tr>
                        <tr>
                            <th colspan="3">Bayar</th>
                            <th class="fw-normal">{{ number_format($history->total_bayar) }}</th>
                        </tr>
                        <tr>
                            <th colspan="3">Kembali</th>
                            <th class="fw-normal">{{ number_format($history->uang_kembali) }}</th>
                        </tr>
                    </tfoot>
                </table>
                <footer class="text-center">
                    <p>Terimakasih Telah Berkunjung</p>
                </footer>
            </div>
        </div>
    </div>
    <script>
        window.onload = function() {
            window.print();
        };
        window.addEventListener('afterprint', function() {
            window.location.href = `{{ route('transaction.index') }}`;
        });
    </script>
</body>
</html>
