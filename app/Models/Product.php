<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $table = 'products';

    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'product_name',
        'description',
        'mileage',
        'euro_standart',
        'year',
        'engine_type',
        'price'
    ];

    public function prices()
    {
        return $this->hasMany(ProductPrice::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}