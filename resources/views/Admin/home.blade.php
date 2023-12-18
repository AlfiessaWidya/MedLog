@extends('layouts.app')

@section('content')
<div class="container-md">
    <div class="row g-3">
        <div class="col-2">
            <button type="submit" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addStaff">
                <i class="fa fa-plus" style="padding-right: 5px"></i>Tambah Staff
            </button>
        </div>
        <div class="col-6">
        </div>
        <div class="col-4">
            <form method="GET" action="/admin/cari-staff" class="d-flex" role="search">
                <input name="cari_staff" class="form-control me-2 text-center" type="search" placeholder="Cari Staff" aria-label="Search">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </form>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-12">
            <table class="table">
                <thead class="table-primary">
                    <tr>
                        <th class="text-center" scope="col" style="width: 17rem">Id Staff</th>
                        <th scope="col" style="width: 29rem">Nama Staff</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admin as $ad)
                        <tr>
                            <td class="text-center" style="padding-top: 1rem">{{$ad->id_staff}}</td>
                            <td style="padding-top: 1rem">{{$ad->nama_staff}}</td>
                            <td>
                                <button class="btn btn-warning text-light" type="submit" data-bs-toggle="modal" data-bs-target="#editStaff{{ $ad->id_staff }}"><i class="fa fa-pen" style="padding-right: 5px"></i>Perbarui</button>

                                <!-- Edit Staff Modal -->
                                <div class="modal fade" id="editStaff{{ $ad->id_staff }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editStaff" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="POST" action="/admin/edit/{{ $ad->id_staff }}">
                                                @csrf
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="editStaff">Edit Staff</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <label for="FloatingNamaStaff" class="form-label fw-bolder">Nama Staff</label>
                                                    <div class="form-floating mb-4">
                                                        <input name="nama_staff" type="text" class="form-control" id="FloatingNamaStaff" value="{{ $ad->nama_staff }}" required>
                                                        <label for="floatingInput">Masukkan Nama Staff</label>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-trash" style="padding-right: 5px"></i>Hapus</button>
                                                    <button type="submit" class="btn btn-primary"><i class="fas fa-check" style="padding-right: 5px"></i>Perbarui</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-danger" type="submit" data-bs-toggle="modal" data-bs-target="#deleteStaff{{ $ad->id_staff }}"><i class="fa fa-trash" style="padding-right: 5px"></i>Hapus</button>

                                <!-- Hapus Staff Modal -->
                                <div class="modal fade" id="deleteStaff{{ $ad->id_staff }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteStaff" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="POST" action="/admin/hapus/{{ $ad->id_staff }}">
                                                @csrf
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="deleteStaff">Hapus Staff</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Yakin Untuk Menghapus Staff ?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i class="fas fa-times" style="padding-right: 5px"></i>Batal</button>
                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash" style="padding-right: 5px"></i>Hapus</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tambah Staff Modal -->
    <div class="modal fade" id="addStaff" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addStaff" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="/admin/add">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addStaff">Tambah Staff</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="FloatingNamaStaff" class="form-label fw-bolder">Nama Staff</label>
                        <div class="form-floating mb-3">
                            <input name="nama_staff" class="form-control" id="FloatingNamaStaff" placeholder="Masukkan Nama Staff" required>
                            <label for="floatingInput">Masukkan Nama Staff</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-trash" style="padding-right: 5px"></i>Batal</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-check" style="padding-right: 5px"></i>Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection