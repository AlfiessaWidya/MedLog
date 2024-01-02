@extends('layouts.navbar')

@section('content')
<div class="container-md">
    <div class="row g-3">
        <div class="col-2">
            <button type="submit" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addObat">
                <i class="fa fa-plus"></i>
                Tambah Obat
            </button>
        </div>
        <div class="col-6 text-end">
            <button type="button" class="btn btn-primary mb-3">
                <i class="fa fa-print"></i>
                <a class="link-offset-2 link-underline link-underline-opacity-0 text-light" href="/print" target="_blank">Print</a>
            </button>
        </div>
        <div class="col-4">
            <form method="GET" action="/warehouse/cari-obat" class="d-flex" role="search">
                <input name="cari_obat" class="form-control me-2 text-center" type="search" placeholder="Cari Obat" aria-label="Search">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </form>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-12 ">
            <div class="card shadow-sm border-0 rounded-lg">
                <table class="table">
                    <thead class="table-primary">
                        <tr>
                            <th class="text-center" scope="col" style="width: 17rem">Jumlah/Pack</th>
                            <th scope="col" style="width: 19rem">Nama Obat</th>
                            <th scope="col" style="width: 16rem">Jenis Obat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($obat as $st)
                            <tr>
                                <td class="text-center" style="padding-top: 1rem">{{$st->jumlah_obat}}</td>
                                <td style="padding-top: 1rem">{{$st->nama_obat}}</td>
                                <td style="padding-top: 1rem">{{$st->jenis_obat}}</td>
                                <td>
                                    <button class="btn btn-warning text-light" type="submit" data-bs-toggle="modal" data-bs-target="#editObat{{ $st->id_obat }}"><i class="fa fa-pen" style="padding-right: 5px"></i>Perbarui</button>
    
                                    <!-- Edit Obat Modal -->
                                    <div class="modal fade" id="editObat{{ $st->id_obat }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editObat" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form method="POST" action="/warehouse/edit/{{ $st->id_obat }}">
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="editObat">Edit Obat</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label for="FloatingUsername" class="form-label fw-bolder">Jumlah Obat</label>
                                                        <div class="form-floating mb-4">
                                                            <input name="jumlah_obat" type="text" class="form-control" id="FloatingJumlahObat" value="{{$st->jumlah_obat}}" required>
                                                            <label for="floatingInput">Masukkan Jumlah Obat</label>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-trash" style="padding-right: 5px"></i>Batal</button>
                                                        <button type="submit" class="btn btn-primary"><i class="fas fa-check" style="padding-right: 5px"></i>Perbarui</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
    
                                    <button class="btn btn-danger" type="submit" data-bs-toggle="modal" data-bs-target="#deleteObat{{ $st->id_obat }}"><i class="fas fa-trash" style="padding-right: 5px"></i>Hapus</button>
    
                                    <!-- Hapus Obat Modal -->
                                    <div class="modal fade" id="deleteObat{{$st->id_obat}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteObat" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form method="POST" action="/warehouse/hapus/{{$st->id_obat}}">
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="deleteObat">Hapus Obat</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Yakin Untuk Menghapus Obat ?</p>
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
    </div>
  
    <!-- Tambah Obat Modal -->
    <div class="modal fade" id="addObat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addObat" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="/warehouse/add">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addObat">Tambah Obat</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="FloatingNamaObat" class="form-label fw-bolder">Nama Obat</label>
                        <div class="form-floating mb-3">
                            <input name="nama_obat" class="form-control" id="FloatingNamaObat" placeholder="Masukkan Nama Obat" required>
                            <label for="floatingInput">Masukkan Nama Obat</label>
                        </div>
                        <label for="FloatingJumlahObat" class="form-label fw-bolder">Jumlah Obat</label>
                        <div class="form-floating mb-3">
                            <input name="jumlah_obat" class="form-control" id="FloatingJumlahObat" placeholder="Masukkan Jumlah Obat" required>
                            <label for="floatingInput">Masukkan Jumlah Obat</label>
                        </div>
                        <label for="FloatingJenisObat" class="form-label fw-bolder">Jenis Obat</label>
                        <select name="jenis_obat" class="form-select" aria-label="Default select example" placeholder="Pilih Jenis Obat" required>
                            <option value="kapsul">Kapsul</option>
                            <option value="pil">Pil</option>
                            <option value="cair">Cair</option>
                        </select> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-trash" style="padding-right: 5px"></i>Batal</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-check" style="padding-right: 5px"></i>Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection