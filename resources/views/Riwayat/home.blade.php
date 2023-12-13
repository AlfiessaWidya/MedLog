@extends('layouts.navbar')

@section('content')
<div class="container-md">
    <div class="row g-3">
        <div class="col-12">
            <table class="table">
                <thead class="table-primary">
                    <tr>
                        <th class="text-center" scope="col" style="width: 15rem">Jumlah/Pack</th>
                        <th scope="col" style="width: 15rem">Nama Obat</th>
                        <th scope="col" style="width: 15rem">Masuk</th>
                        <th scope="col" style="width: 15rem">Update</th>
                    </tr>
                </thead>
                @foreach ($obat as $rwt)
                    <tbody>
                        <tr>
                            <td class="text-center">{{$rwt->jumlah_obat}}</td>
                            <td>{{$rwt->nama_obat}}</td>
                            <td>{{$rwt->created_at}}</td>
                            <td>{{$rwt->updated_at}}</td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection