<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    use HasFactory;

     protected $fillable = ['regency_id', 'province_id', 'name'];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'province_id');
    }

    public function bisnis()
    {
        return $this->hasMany(Bisnis::class,'province_id');
    }

   
}
