<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AjuanPkl extends Model
{
    use HasFactory;

    protected $table = 'ajuan_pkl';
    protected $primaryKey = 'id_ajuan';

    protected $fillable = [
        'id_siswa', 
        'id_industri', 
        'tanggal_mulai', 
        'tanggal_selesai', 
        'tanggal_pengajuan', 
        'status'
    ];

    protected $dates = [
        'tanggal_mulai', 
        'tanggal_selesai', 
        'tanggal_pengajuan'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    public function industri()
    {
        return $this->belongsTo(Industri::class, 'id_industri');
    }
}