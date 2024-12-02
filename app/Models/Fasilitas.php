<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    protected $fillable = [
        'penginapan_id', 'fasilitas',
    ];

    // Belongs to penginapan
    public function penginapan()
    {
        return $this->belongsTo(Penginapan::class);
    }
}

