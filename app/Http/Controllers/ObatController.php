<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObatModel;
use App\Models\RiwayatModel;
use DB;
use PDF;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

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
        try {
            $req->validate([
                'nama_obat' => 'required',
                'jumlah_obat' => 'required|integer',
                'jenis_obat' => 'required'
            ]);

            ObatModel::create([
                'nama_obat' => $req->nama_obat,
                'jumlah_obat' => $req->jumlah_obat,
                'jenis_obat' => $req->jenis_obat,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => null
            ]);
    
            $searchObat = ObatModel::select('id_obat', 'jumlah_obat', 'nama_obat', 'jenis_obat','created_at')
                ->where('nama_obat', $req->nama_obat)
                ->first();
    
            $insertData = array("id_obat"=>$searchObat->id_obat, "jumlah_obat"=>$searchObat->jumlah_obat, "nama_obat"=>$searchObat->nama_obat, "jenis_obat"=>$searchObat->jenis_obat, "created_at"=>$searchObat->created_at);
            DB::table('riwayat')->insert($insertData);

            toastr()->success('Data Berhasil Ditambahkan');

            return redirect('/warehouse');

        } catch (\Exception $e) {
            toastr()->error('Data Gagal Ditambahkan');

            return redirect()->back();
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function ubah_jumlah(Request $req, $id)
    {
        try {
            $req->validate([
                'jumlah_obat' => 'required|integer'
            ]);

            ObatModel::where('id_obat', $id)->update([
                'jumlah_obat' => $req->jumlah_obat,
                'updated_at' => date("Y-m-d h:i:s")
            ]);
    
            $searchObat = ObatModel::select('id_obat', 'jumlah_obat', 'nama_obat', 'jenis_obat','updated_at')
                ->where('id_obat', $id)
                ->first();
    
            $insertData = array("id_obat"=>$searchObat->id_obat, "jumlah_obat"=>$searchObat->jumlah_obat, "nama_obat"=>$searchObat->nama_obat, "jenis_obat"=>$searchObat->jenis_obat, "updated_at"=>$searchObat->updated_at);

            DB::table('riwayat')->insert($insertData);

            toastr()->success('Data Berhasil Diperbarui');

            return redirect('/warehouse');

        } catch (\Exception $e) {
            toastr()->error('Data Gagal Diperbarui');

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapus_obat($id)
    {
        try {
            $searchObat = ObatModel::select('id_obat', 'jumlah_obat', 'nama_obat', 'jenis_obat')
            ->where('id_obat', $id)
            ->first();
        
            $timenow = date("Y-m-d h:i:s");

            $insertData = array("id_obat"=>$searchObat->id_obat, "jumlah_obat"=>$searchObat->jumlah_obat, "nama_obat"=>$searchObat->nama_obat, "jenis_obat"=>$searchObat->jenis_obat, "deleted_at"=>$timenow);
            DB::table('riwayat')->insert($insertData);

            ObatModel::destroy($id);

            toastr()->success('Data Berhasil Dihapus');

            return redirect('/warehouse');

        } catch (\Exception $e) {
            toastr()->error('Data Gagal Dihapus');

            return redirect()->back();
        }

        
    }

    /**
     * Search Obat
     */
    public function cari_obat(Request $req)
    {
        
        $obatData = $req->input('cari_obat');

        $records = DB::table('obat')->where('nama_obat', 'like', '%' . $obatData . '%')
            ->orwhere('jumlah_obat', 'like', '%' . $obatData . '%')
            ->orwhere('jenis_obat', 'like', '%' . $obatData . '%')
            ->get();
        
        return view('Obat.home')
            ->with('obat', $records);
    }

    /**
     * Print Obat
     */
    public function cetak_obat()
    {
        $obatData = ObatModel::select('*')
            ->get();

        $pdf = PDF::loadView('Obat.print', ['obat' => $obatData]);
        return $pdf->stream('Laporan Data Obat.pdf');
    }
}
