<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservasi_id', 'total_harga', 'payment_date', 'method', 'status',
    ];

    // Belongs to reservasi
    public function reservasi()
    {
        return $this->belongsTo(Reservasi::class);
    }
}

