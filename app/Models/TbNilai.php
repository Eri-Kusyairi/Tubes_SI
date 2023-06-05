<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbNilai extends Model
{
    use HasFactory;

    protected $table = 'tb_nilaitugas';
    protected $primaryKey = 'Id_siswa';
    protected $fillable = [
        'id_mapel',
        'id_instruktur',
        'nilai',
    ];
    public function mapel()
    {
        return $this->belongsTo(TbMapel::class, 'id_mapel');
    }

    public function instruktur()
    {
        return $this->belongsTo(TbPengajar::class, 'id_instruktur');
    }
}