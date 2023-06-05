<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbPegawai extends Model
{
    use HasFactory;
    
    protected $table = 'tb_pegawai';
    protected $primaryKey = 'id_pegawai';
    protected $fillable = [
        'nama',
        'Alamat',
        'Jabatan',
        'no_hp',
    ];
}