<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industri extends Model
{
    use HasFactory;

    protected $table = 'industri';
    protected $primaryKey = 'id_industri';

    protected $fillable = [
        'nama_industri', 
        'alamat', 
        'kontak'
    ];

    public function ajuanPkl()
    {
        return $this->hasMany(AjuanPkl::class, 'id_industri');
    }
}