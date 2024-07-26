<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    protected $table = 'products_prices';

    protected $fillable = [
        'product_id',
        'price',
        'value_class',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}