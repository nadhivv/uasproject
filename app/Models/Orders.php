<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = [
        'user_id', 'penginapan_id', 'type', 'description', 'price', 'order_date', 'status',
        'makanan_id', 'laundry_id',
    ];

    // Belongs to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Belongs to penginapan
    public function penginapan()
    {
        return $this->belongsTo(Penginapan::class);
    }

    public function makanan()
    {
        return $this->belongsTo(Makanan::class);
    }

    public function laundry()
    {
        return $this->belongsTo(Laundry::class, 'laundry_id');
    }
}

