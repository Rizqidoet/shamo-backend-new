<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'description',
        'tags',
        'categories_id',
    ];

    public function transaction_items()
    {
        return $this->hasMany(TransactionItem::class, 'products_id', 'id');
    }

    public function product_galleries()
    {
        return $this->hasMany(ProductGallery::class, 'products_id', 'id');
    }

    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class, 'categories_id', 'id');
    }
}
