<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionLaundry extends Model
{

    protected $table = 'transaction_laundrys';
    protected $fillable = ['transaction_id', 'laundry_id', 'jumlah', 'price'];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function laundry()
    {
        return $this->belongsTo(Laundry::class);
    }
}
