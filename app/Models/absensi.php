<?php

namespace App\Models;
use App\Models\diklat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absensi extends Model
{
    use HasFactory;
    protected $table = 'tb_absensi';
    protected $primaryKey = 'Id_siswa';
    protected $fillable = [
        'id_jenisdiklat',
        'Nama_siswa',
        'id_kelas',
        'id_mapel',
        'hari',
        'keterangan',
    ];
     public function jenisDiklat()
    {
        return $this->belongsTo(JenisDiklat::class, 'id_jenisdiklat');
    }
    public function mapel()
    {
        return $this->belongsTo(TbMapel::class, 'id_mapel');
    }
    public function kelass()
    {
        return $this->belongsTo(TbKelas::class, 'id_kelas');
    }
}