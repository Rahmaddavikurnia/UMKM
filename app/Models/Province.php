<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = ['province_id', 'name'];

    public function regencies()
    {
        return $this->hasMany(Regency::class);
    }

    public function bisnis()
    {
        return $this->hasMany(Bisnis::class,'regenci_id');
    }
}
