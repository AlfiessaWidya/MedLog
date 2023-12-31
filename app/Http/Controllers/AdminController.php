<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function daftar_staff()
    {
        $adminData = AdminModel::select('id_staff', 'nama_staff')
            ->orderBy('nama_staff', 'ASC')
            ->get();

        return view('Admin.home')
            ->with('admin', $adminData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tambah_staff(Request $req)
    {
        try {
            $req->validate([
                'nama_staff' => 'required|string'
            ]);

            AdminModel::create([
                'nama_staff' => $req->nama_staff,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => null
            ]);

            toastr()->success('Data Berhasil Ditambahkan');

            return redirect('/admin');
            
        } catch (\Exception $e) {
            toastr()->error('Data Gagal Ditambahkan');

            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function ubah_staff(Request $req, $id)
    {
        try {
            $req->validate([
                'nama_staff' => 'required|string'
            ]);

            AdminModel::where('id_staff', $id)->update([
                'nama_staff' => $req->nama_staff,
                'updated_at' => date("Y-m-d h:i:s")
            ]);

            toastr()->success('Data Berhasil Diperbarui');

            return redirect('/admin');
            
        } catch (\Exception $e) {
            toastr()->error('Data Gagal Diperbarui');

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapus_staff(string $id)
    {
        try {
            AdminModel::destroy($id);

            toastr()->success('Data Berhasil Dihapus');

            return redirect('/admin');
            
        } catch (\Exception $e) {
            toastr()->error('Data Gagal Dihapus');

            return redirect()->back();
        }
    }

    /**
     * Search Staff
     */
    public function cari_staff(Request $req)
    {
        $adminData = $req->input('cari_staff');

        $records = DB::table('admin')->where('id_staff', 'like', '%' . $adminData . '%')
            ->orwhere('nama_staff', 'like', '%' . $adminData . '%')
            ->get();
        
        return view('Admin.home')
            ->with('admin', $records);
    }
}
