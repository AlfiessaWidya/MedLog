@extends('layouts.navbar')

@section('content')
<div class="container-md">
    <div class="row g-3">
        <div class="col-12">
            <table class="table">
                <thead class="table-primary">
                    <tr>
                        <th class="text-center" scope="col" style="width: 15rem">Jumlah/Pack</th>
                        <th scope="col" style="width: 25rem">Nama Obat</th>
                        <th scope="col" style="width: 15rem">Waktu</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">200</td>
                        <td>Bodrex</td>
                        <td>21.00 06-06-2006</td>
                        <td>Masuk</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection