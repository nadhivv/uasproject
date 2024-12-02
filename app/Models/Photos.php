<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    use HasFactory;

    protected $fillable = [
        'penginapan_id', 'photo_url',
    ];

    // Belongs to penginapan
    public function penginapan()
    {
        return $this->belongsTo(Penginapan::class);
    }
}

