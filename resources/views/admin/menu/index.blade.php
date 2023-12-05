@extends('admin.layouts.main')

@section('container')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            Data Menu
            <button type="button" data-bs-toggle="modal" data-bs-target="#addMenu" class="btn btn-outline-primary btn-sm">Tambah</button>
            <!-- Modal -->
            <div class="modal fade" id="addMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('menu.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="">Nama</label>
                                    <input class="form-control" id="nama_menu" name="nama_menu" type="text" placeholder="Nama Menu ..." />
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmailAddress">Kategori</label>
                                    <select name="kategori" class="form-control" id="kategori">
                                        <option value="" selected disabled>Pilih Kategori</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">Harga</label>
                                    <input class="form-control" id="harga" name="harga" type="number" placeholder="Harga Menu ..." />
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
                                <form action="{{ route('menu.destroy', $menu->id) }}" id="deleteCategory{{ $menu->id }}" onsubmit="deleteCategory(event, {{ $menu->id }})" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#editMenu{{ $menu->id }}" class="btn btn-primary btn-sm">Edit</button>
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        <div class="modal fade" id="editMenu{{ $menu->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Menu</h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('menu.update', $menu->id) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="">Nama</label>
                                                <input class="form-control" id="nama_menu" name="nama_menu" type="text" value="{{ $menu->nama_menu }}" placeholder="Nama Menu ..." />
                                            </div>
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputEmailAddress">Kategori</label>
                                                <select name="kategori" class="form-control" id="kategori">
                                                    <option value="{{ $menu->id_kategori }}" selected disabled>{{ $menu->kategori->nama_kategori }}</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Harga</label>
                                                <input class="form-control" id="harga" name="harga" type="number" value="{{ $menu->harga }}" placeholder="Harga Menu ..." />
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
