<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laundry extends Model
{
    use HasFactory;
    protected $table = 'laundry';

    protected $fillable = [
        'jenis_laundry',
        'jumlah',
        'waktu_pengambilan',
        'waktu_pengembalian',
        'harga',
        'created_by',
    ];

    public function orders()
    {
        return $this->hasMany(Orders::class);
    }



    // public function transactionLaundry()
    // {
    //     return $this->hasOne(TransactionLaundry::class);
    // }
    public function transactionLaundry()
    {
        return $this->hasMany(TransactionLaundry::class);
    }
}
