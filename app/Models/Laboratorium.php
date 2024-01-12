<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorium extends Model
{
    use HasFactory;
    protected $table = 'laboratorium';
    protected $fillable = [
        'id_user',
        'tanggal',
        'nama_dokter',
        'hemoglobin',
        'eritrosit',
        'luekosit',
        'hematokrit',
        'trombosit',
        'warna',
        'kejernihan',
        'bj',
        'ph',
        'leuko',
        'nitrit',
        'protein',
        'glukosa',
        'keton',
        'urobil',
        'bili',
        'blood',
        'glukosa_sewaktu',
        'm_leuko',
        'eri',
        'epitel',
        'kristal',
        'bakteri',
        'jamur',
        'silinder',
        
        
    ];



    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    // public function medical_check_up()
    // {
    //     return $this->belongsTo(MedicalCheckUp::class, 'id');
    // }
}
