<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'qty',
        'users_id',
        'products_id',
        'transactions_id',
    ];

    public function user()
    {
        $this->belongsTo(user::class, 'users_id', 'id');
    }
    public function product()
    {
        $this->belongsTo(Product::class, 'products_id', 'id');
    }
    public function transaction()
    {
        $this->belongsTo(Transaction::class, 'transactions_id', 'id');
    }
}
