<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service_Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'total_harga', 'payment_date', 'method', 'status',
    ];

    public function orders()
    {
        return $this->belongsTo(Orders::class);
    }
}
