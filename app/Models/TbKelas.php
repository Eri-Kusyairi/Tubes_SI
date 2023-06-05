<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbKelas extends Model
{
    use HasFactory;
    protected $table = 'tb_kelas';
    protected $primaryKey = 'id_kelas';
    protected $fillable = [
        'id_instruktur',
        'id_mapel',
        'id_jenisdiklat',
        'Id_siswa',
        'hari',
        'jumlahjam',
    ];
    public function absen()
    {
        return $this->hasMany(absensi::class, 'Id_siswa');
    } 
    public function pengajar()
    {
        return $this->belongsTo(TbPengajar::class, 'id_instruktur');
    }
    public function mapel()
    {
        return $this->belongsTo(TbMapel::class, 'id_mapel');
    }
    public function jenisDiklat()
    {
        return $this->belongsTo(JenisDiklat::class, 'id_jenisdiklat');
    }
    public function siswa()
    {
        return $this->belongsTo(siswa::class, 'Id_siswa');
    }
}
