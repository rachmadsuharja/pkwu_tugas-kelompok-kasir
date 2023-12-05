@extends('admin.layouts.main')

@section('container')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            Data Kategori
            <button type="button" data-bs-toggle="modal" data-bs-target="#addCategory" class="btn btn-outline-primary btn-sm">Tambah</button>
            <!-- Modal -->
            <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('category.update') }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <input class="form-control" id="nama_kategori" name="nama_kategori" type="text" placeholder="Nama Kategori ..." />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary btn-sm">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->nama_kategori }}</td>
                            <td>
                                <button class="btn btn-datatable btn-icon btn-transparent-dark"><i class="fa-regular fa-trash-can"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
