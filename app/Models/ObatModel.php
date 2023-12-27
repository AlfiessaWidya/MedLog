<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObatModel extends Model
{
    use HasFactory;

    protected $table = 'obat';
    protected $primaryKey = 'id_obat';
    protected $fillable = ['jumlah_obat', 'nama_obat', 'jenis_obat', 'created_at', 'updated_at'];
}
