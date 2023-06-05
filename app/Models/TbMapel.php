<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbMapel extends Model
{
    use HasFactory;

    protected $table = 'tb_mapel';
    protected $primaryKey = 'id_mapel';
    protected $fillable = [
        'Nama_Mapel',
        'namainstruktur',
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
    public function absen()
    {
        return $this->hasMany(absensi::class, 'Id_siswa');
    } 
}