<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'penginapan_id', 'check_in', 'check_out', 'total_harga', 'status',
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
}
