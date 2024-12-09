<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    use HasFactory;

    protected $fillable = [
        'penginapan_id', 'photo_url', 'makanan_id', 'laundry_id',
    ];

    // Belongs to penginapan
    public function penginapan()
    {
        return $this->belongsTo(Penginapan::class);
    }

    public function makanan()
    {
        return $this->belongsTo(Makanan::class, 'makanan_id');
    }

    public function laundry()
    {
        return $this->belongsTo(Laundry::class, 'laundry_id');
    }
}

