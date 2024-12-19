<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    protected $fillable = ['transaction_id', 'makanan_id', 'quantity', 'price'];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function makanan()
    {
        return $this->belongsTo(Makanan::class);
    }

}
