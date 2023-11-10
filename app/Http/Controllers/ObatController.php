<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObatModel;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function daftar_obat()
    {
        $obatData = ObatModel::select('id_obat', 'jumlah_obat', 'nama_obat', 'jenis_obat')
            ->orderBy('jumlah_obat', 'ASC')
            ->get();

        return view('Obat.home')
            ->with('obat', $obatData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tambah_obat(Request $req)
    {
        ObatModel::create([
            'nama_obat' => $req->nama_obat,
            'jumlah_obat' => $req->jumlah_obat,
            'jenis_obat' => $req->jenis_obat,
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => null
        ]);

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function ubah_jumlah(Request $req, $id)
    {
        ObatModel::where('id_obat', $id)->update([
            'jumlah_obat' => $req->jumlah_obat,
            'updated_at' => date("Y-m-d h:i:s")
        ]);
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapus_obat($id)
    {
        ObatModel::destroy($id);

        return redirect()->back();
    }
}
