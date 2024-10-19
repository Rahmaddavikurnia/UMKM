<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categori extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama_categori',
        'deskripsi'
    ];

    public function bisnis()
    {
        return $this->hasMany(Bisnis::class,'categori_id');
    }
}
