<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bisnis extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'categori_id',
        'user_id',
        'province_id',
        'regenci_id',
        'nama_bisnis',
        'email',
        'no_hp',
        'deskripsi',
        'jambuka',
        'medsos',
        'foto_produk',
        'foto_bisnis',
        'latitude',
        'longitude',
    ];

    public function categoris()
    {
        return $this->belongsTo(Categori::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function promosis()
    {
        return $this->hasMany(Promosi::class,'bisnis_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }
}
