<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class diklat extends Model
{
    protected $table = 'tb_jenisdiklat';
    protected $primaryKey = 'id_jenisdiklat';
    protected $fillable = [
        'namadiklat',
        'hari',
        'jumlahjam',
    ];

    public function siswas()
    {
        return $this->hasMany(Daftar::class, 'id_jenisdiklat');
    }
    public function pengajar()
{
    return $this->hasMany(TbPengajar::class, 'id_jenisdiklat');
}
public function mapels()
{
    return $this->hasMany(TbMapel::class, 'id_mapel');
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