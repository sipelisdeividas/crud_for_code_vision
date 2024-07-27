<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductPrice extends Model
{
    public const TABLE = 'products_prices';

    protected $table = self::TABLE;

    protected $fillable =
    [
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
}
