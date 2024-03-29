@extends('admin.layouts.main')

@section('style')
    <style>
        .table-striped th, .table-striped td {
            font-size: .8em;
        }
    </style>
@endsection

@section('container')
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between">
        Transaksi
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="collapse" data-bs-target="#menuList" aria-expanded="false">Lihat Menu</button>
    </div>
    <div class="card-body">
        <div class="row collapse mb-4" id="menuList">
            <div class="col">
                <h6>Daftar Menu</h6>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Nama Menu</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $menu)
                            <tr>
                                <td>{{ $menu->nama_menu }}</td>
                                <td>{{ $menu->kategori->nama_kategori }}</td>
                                <td>{{ $menu->harga }}</td>
                                <td>
                                    @if ($menu->status == 'Tersedia')
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#addToCart{{ $menu->id }}" class="btn btn-warning btn-sm">Masukkan Keranjang</button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="addToCart{{ $menu->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Masukkan ke Keranjang</h5>
                                                    </div>
                                                    @if ($carts->pluck('id_menu')->contains($menu->id))
                                                        <form action="{{ route('cart.update', $menu->id) }}" method="POST">
                                                            @csrf
                                                            @method('put')
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="">Jumlah Beli</label>
                                                                    <input class="form-control" id="jumlah_beli" name="jumlah_beli" type="number" placeholder="Jumlah Dibeli..." />
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                                                            </div>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('cart.store') }}" method="POST">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <input type="hidden" name="nama_menu" value="{{ $menu->nama_menu }}">
                                                                    <input type="hidden" name="id_menu" value="{{ $menu->id }}">
                                                                    <input type="hidden" name="harga_menu" value="{{ $menu->harga }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="">Jumlah Beli</label>
                                                                    <input class="form-control" id="jumlah_beli" name="jumlah_beli" type="number" placeholder="Jumlah Dibeli..." />
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                                                            </div>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @elseif ($menu->status == 'Tidak Tersedia')
                                        <button type="button" class="btn btn-warning btn-sm disabled">Masukkan Keranjang</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                <h6>Keranjang</h6>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama Menu</th>
                                <th>Harga Satuan</th>
                                <th>Jumlah Beli</th>
                                <th>Harga Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($carts as $cart)
                                <tr>
                                    <td>{{ $cart->nama_menu }}</td>
                                    <td>{{ $cart->harga_menu }}</td>
                                    <td>{{ $cart->jumlah_beli }}</td>
                                    <td>{{ $cart->total_harga }}</td>
                                    <td>
                                        <form action="{{ route('cart.destroy', $cart->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-transparent p-0 m-0 fs-4"><i class="fa-solid fa-circle-xmark text-danger"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('transaction.store') }}" id="confirmPayment" onsubmit="paymentConfirmation(event)" method="post">
                            @csrf
                            <div class="mb-2">
                                <label for="" class="form-label">Total Harga</label>
                                <input class="form-control" type="text" name="total_harga" value="{{ $priceTotal }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Total Bayar</label>
                                <input type="text" name="total_bayar" class="form-control" placeholder="Total Dibayar ...">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Bayar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        function paymentConfirmation(event) {
            event.preventDefault();

            Swal.fire({
                title: "Checkout",
                text: "Konfirmasi Pembayaran",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya",
                cancelButtonText: "Batal",
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('confirmPayment').submit();
                }
            });
        }
    </script>
@endsection
