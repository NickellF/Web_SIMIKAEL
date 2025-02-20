<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';
    protected $primaryKey = 'id_guru';

    protected $fillable = [
        'id_user',
        'nama_guru',
        'nip',
        'bidang'
    ];

    public function ajuanPkl()
    {
        return $this->hasMany(AjuanPkl::class, 'id_guru');
    }

    public function getProfilePictureAttribute($value)
    {
        return $value ?: 'default.jpg';
    }

    public function user()
{
    return $this->belongsTo(User::class, 'id_user', 'id_user');
}
}
