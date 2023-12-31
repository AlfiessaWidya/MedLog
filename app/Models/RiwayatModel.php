<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatModel extends Model
{
    use HasFactory;

    protected $table = 'riwayat';
    protected $primaryKey = 'id_riwayat';
    protected $fillable = ['id_obat', 'jumlah_obat', 'nama_obat', 'jenis_obat', 'created_at', 'updated_at'];
}
