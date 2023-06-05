<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbPengajar extends Model
{
    protected $table = 'tb_instruktur';
    protected $primaryKey = 'id_instruktur';
    protected $fillable = [
        'nama',
        'Gender',
        'no_hp',
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

}
