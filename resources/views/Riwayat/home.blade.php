@extends('layouts.navbar')

@section('content')
<div class="container-md">
    <div class="row g-3">
        <div class="col-12">
            <table class="table table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th class="text-center" scope="col" style="width: 10rem">Jumlah/Pack</th>
                        <th scope="col" style="width: 15rem">Nama Obat</th>
                        <th scope="col" style="width: 15rem">Masuk</th>
                        <th scope="col" style="width: 15rem">Perbarui</th>
                        <th scope="col" style="width: 15rem">Keluar</th>
                    </tr>
                </thead>
                @foreach ($riwayat as $rwt)
                    <tbody>
                        <tr>
                            <td class="text-center">{{$rwt->jumlah_obat}}</td>
                            <td>{{$rwt->nama_obat}}</td>
                            <td class="text-success fw-bold">{{$rwt->created_at}}</td>
                            <td class="text-warning fw-bold">{{$rwt->updated_at}}</td>
                            <td class="text-danger fw-bold">{{$rwt->deleted_at}}</td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection