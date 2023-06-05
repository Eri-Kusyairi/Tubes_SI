<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_siswa extends Model
{
    use HasFactory;
    protected $table = 'tb_siswa';
    protected $primarykay = 'id_siswa';
}
