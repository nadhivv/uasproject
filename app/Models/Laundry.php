<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laundry extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_laundry', 'harga',
    ];

    public function orders()
    {
        return $this->hasMany(Orders::class);
    }
}
