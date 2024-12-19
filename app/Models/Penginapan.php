<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penginapan extends Model
{
    use HasFactory;
    protected $table = 'penginapan';
    protected $fillable = [
        'name',
        'location',
        'description',
        'price',
        'rating',
        'image_url',
        'available_from',
        'available_to',
        'latitude',
        'longitude',
    ];
    // One-to-many relationship with reviews
    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // One-to-many relationship with reservations
    public function reservasi()
    {
        return $this->hasMany(Reservasi::class);
    }

    // One-to-many relationship with orders
    public function orders()
    {
        return $this->hasMany(Orders::class);
    }

    // One-to-many relationship with photos
    public function photos()
    {
        return $this->hasMany(Photos::class);
    }

    // One-to-many relationship with facilities
    public function fasilitas()
    {
        return $this->hasMany(Fasilitas::class);
    }

    // One-to-many relationship with bookings
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}

