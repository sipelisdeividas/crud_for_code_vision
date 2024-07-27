<?php

namespace App\Services;

use App\Interfaces\ProductPriceServiceInterface;
use App\Models\ProductPrice;

class ProductPriceService implements ProductPriceServiceInterface
{
    public function upsertPrice(int $productId, float $price): void
    {
        ProductPrice::updateOrCreate(
        [
            'product_id' => $productId,

            'price' => $price,
        ]);
    }
}