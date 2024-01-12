<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RM_Non_Karyawan extends Model
{
    use HasFactory;
    protected $table = 'rekam_medis_non_karyawan';
    protected $fillable = [
        'id',
        'nama',
        'tanggal',
        'anamesis',
        'tekanan_darah',
        'nadi',
        'pernafasan',
        'vas',
        'suhu',
        'pengobatan',
        'saturasi_oksigen',
        'diagnosis',
        'nama_dokter',
        'head_to_toe',
        'id_daftar_penyakit',
    ];

    public function daftar_penyakit()
    {
        return $this->belongsTo(DaftarPenyakit::class, 'id_daftar_penyakit');
    }
}
