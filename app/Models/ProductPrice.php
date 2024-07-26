<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class ProductPrice extends Model
{
    public const TABLE = 'products_prices';

    protected $table = self::TABLE;

    protected $fillable = [
        'product_id',
        'price',
        'value_class',
    ];

    /**
     *
     *
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
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
     * @param float $value
     * @return void
     */
    public function setPriceAttribute(float $value): void
    {
        $this->attributes['price'] = $value;
        $this->attributes['value_class'] = $this->classifyPrice($value);
    }

    /**
     *
     *
     * @param float $price
     * @return string
     */
    protected function classifyPrice(float $price): string
    {
        if ($price >= 0 && $price <= 50000) {
            return 'Žema';
        } elseif ($price > 50000 && $price <= 150000) {
            return 'Vidutinė';
        } elseif ($price > 150000 && $price <= 500000) {
            return 'Aukšta';
        } else {
            return 'Labai Aukšta';
        }
    }
}