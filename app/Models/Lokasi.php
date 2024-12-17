<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    protected $table = 'lokasi';
    protected $fillable = [
        'nama_kota', 'provinsi',
    ];

    public function penginapan()
    {
        return $this->hasMany(Penginapan::class);
    }
}
