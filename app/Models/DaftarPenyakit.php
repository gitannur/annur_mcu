<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarPenyakit extends Model
{
    use HasFactory;
    protected $table = "daftar_penyakit";
    protected $fillable = [
        'code',
        'nama_penyakit',
       
    ];

    public function rekam_medis()
    {
        return $this->hasMany(RekamMedis::class, 'id_daftar_penyakit');
    }
    public function rekam_medis_non_karyawan()
    {
        return $this->hasMany(RM_Non_Karyawan::class, 'id_daftar_penyakit');
    }
}
