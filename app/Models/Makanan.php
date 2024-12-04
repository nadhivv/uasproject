<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    use HasFactory;
    protected $table = 'makanan';

    protected $fillable = [
        'nama_makanan', 'harga',
    ];

    public function orders()
    {
        return $this->hasMany(Orders::class);
    }
}
