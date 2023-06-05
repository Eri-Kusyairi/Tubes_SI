<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftar extends Model
{
    protected $table = 'tb_siswa';
    protected $primaryKey = 'Id_siswa';
    protected $fillable = [
        'Nama_siswa',
        'periode_diklat',
        'email',
        'Alamat',
        'no_hp',
        'Gender',
        'Namaortu',
        'Pekerjaanortu',
        'Penghasilan',
        'id_jenisdiklat',
    ];

    public function jenisDiklat()
    {
        return $this->belongsTo(JenisDiklat::class, 'id_jenisdiklat');
    }
    public function kelas()
    {
        return $this->hasMany(TbKelas::class, 'id_kelas');
    }
    
    // public function daftars()
    // {
    //     return $this->hasMany(daftar::class, 'id_user');
    // }
    
}