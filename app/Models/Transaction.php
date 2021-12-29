<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'payment',
        'total_price',
        'shipping_price',
        'status',
        'users_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function transaction_items()
    {
        return $this->hasMany(TransactionItem::class, 'transactions_id', 'id');
    }
}
