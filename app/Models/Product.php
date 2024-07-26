<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

class Product extends Model
{
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

    protected $dates = ['deleted_at'];

    /**
     *
     *
     * @return HasMany
     */
    public function prices(): HasMany
    {
        return $this->hasMany(ProductPrice::class);
    }

    /**
     *
     *
     * @return HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    /**
     *
     *
     * @return string
     */
    public function getFormattedPriceAttribute(): string
    {
        return '$' . number_format($this->price, 2);
    }

    /**
     *
     *
     * @param string $value
     * @return void
     */
    public function setProductNameAttribute(string $value): void
    {
        $this->attributes['product_name'] = ucfirst(strtolower($value));
    }
}