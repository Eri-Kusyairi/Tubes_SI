<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_ujian extends Model
{
    use HasFactory;
    protected $table = 'tb_ujian';
    protected $primarykay = ['id_siswa' , 'kode_nilai'];
}
