<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    use HasFactory;
    protected $table = 'makanan';

    protected $fillable = [
        'nama_makanan', 'harga','stock',
    ];

    public function orders()
    {
        return $this->hasMany(Orders::class);
    }

    public function photos()
    {
        return $this->hasMany(Photos::class);
    }

    public function transactions()
    {
        return $this->hasMany(TransactionItem::class);
    }
}
