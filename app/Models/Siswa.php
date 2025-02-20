<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';

    protected $fillable = [
        'nama_siswa', 
        'nis', 
        'kelas', 
        'jurusan', 
        'id_user'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function ajuanPkl()
    {
        return $this->hasMany(AjuanPkl::class, 'id_siswa');
    }
}