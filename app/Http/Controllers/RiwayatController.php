<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatModel;
use DB;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function daftar_obat()
    {
        $riwayatData = RiwayatModel::select('jumlah_obat', 'nama_obat', 'created_at', 'updated_at', 'deleted_at')
            ->orderBy('id_riwayat', 'DESC')
            ->get();

        return view('Riwayat.home')
            ->with('riwayat', $riwayatData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
