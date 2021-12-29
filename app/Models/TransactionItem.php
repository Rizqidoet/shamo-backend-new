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

    public function users()
    {
        $this->hasMany(user::class, 'users_id', 'id');
    }
    public function products()
    {
        $this->hasMany(Product::class, 'products_id', 'id');
    }
    public function transactions()
    {
        $this->hasMany(Transaction::class, 'transactions_id', 'id');
    }
}
