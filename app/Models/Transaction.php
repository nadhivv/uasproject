<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $table = 'transactions';
    protected $fillable = ['user_id', 'order_id', 'total_amount', 'status', 'snap_token'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(TransactionItem::class);
    }

    public function item()
    {
        return $this->hasMany(TransactionLaundry::class);
    }

    public function laundry()
{
    return $this->belongsTo(Laundry::class);
}
}
