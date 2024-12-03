<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room_Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id','reservasi_id', 'total_harga', 'payment_date', 'method', 'status',
    ];

    // Belongs to reservasi
    public function reservasi()
    {
        return $this->belongsTo(Reservasi::class);
    }

    public function orders()
    {
        return $this->belongsTo(Orders::class);
    }
}
