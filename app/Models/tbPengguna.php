<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbPengguna extends Model
{
    use HasFactory;
    protected $table = 'tb_pengguna';
    protected $primaryKey = 'id_user';
    protected $fillable = [
        'username',
        'password',
    ];
    public function daftars()
    {
        return $this->hasMany(daftar::class, 'id_user');
    }
    
}