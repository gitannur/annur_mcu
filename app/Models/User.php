<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table ='users';
    protected $fillable = [
        'nik',
        'name',
        'status',
        'grade',
        'dept',
        'job',
        'sex',
        'ttl',
        'start',
        'pendidikan',
        'agama',
        'domisili',
        'email',
        'no_ktp',
        'no_telpon',
        'kis',
        'kpj',
        'suku',
        'no_sepatu_safety',
        'start_work_user',
        'end_work_user',
        'loc_kerja',
        'loc',
        'sistem_absensi',
        'latitude',
        'longitude',
        'aktual_cuti',
        'status_pernikahan',
        'istri_suami',
        'anak_1',
        'anak_2',
        'anak_3',
        'access_by',
        'image_url',
        'role_app',
        'active',
        'email_verified_at',
        'password',
    ];

    public function medicalcheckup()
    {
        return $this->hasMany(MedicalCheckUp::class,'id_user');
    }
    public function rekammedis()
    {
        return $this->hasMany(RekamMedis::class,'id_user');
    }
    public function laboratorium()
    {
        return $this->hasMany(Laboratorium::class,'id_user');
    }
    public function daftar_penyakit()
    {
        return $this->hasMany(Daftar_Penyakit::class,'id_user');
    }
    
}
