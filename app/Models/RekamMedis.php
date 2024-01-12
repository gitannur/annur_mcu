<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;
    protected $table = 'rekam_medis';
    protected $fillable = [
        'id_user',
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

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function daftar_penyakit()
    {
        return $this->belongsTo(DaftarPenyakit::class, 'id_daftar_penyakit');
    }
}
