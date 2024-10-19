<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promosi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'bisnis_id',
        'judul',
        'deskripsi',
        'start_date',
        'end_date',
    ];

    public function bisnis()
    {
        return $this->belongsTo(Bisnis::class);
    }

    
}
