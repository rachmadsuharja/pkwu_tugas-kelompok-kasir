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
                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <input class="form-control" id="nama_kategori" name="nama_kategori" type="text" placeholder="Nama Kategori ..." />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
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
                                <form action="{{ route('category.destroy', $category->id) }}" id="deleteCategory{{ $category->id }}" onsubmit="deleteCategory(event, {{ $category->id }})" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#editCategory{{ $category->id }}" class="btn btn-primary btn-sm">Edit</button>
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        <div class="modal fade" id="editCategory{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('category.update', $category->id) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <input class="form-control" id="nama_kategori" name="nama_kategori" type="text" value="{{ $category->nama_kategori }}" placeholder="Nama Kategori ..." />
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function deleteCategory(event, id) {
            event.preventDefault();
            Swal.fire({
                title: "Hapus",
                text: "Apakah Anda yakin ingin menghapus data?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                if (result.isConfirmed) {

                }
            });
        }
    </script>
@endsection
