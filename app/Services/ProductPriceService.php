<?php

namespace App\Services;

use App\Interfaces\ProductPriceServiceInterface;
use App\Models\ProductPrice;
use App\Services\Helpers\PriceClassifier;

class ProductPriceService implements ProductPriceServiceInterface
{
    public function __construct(protected PriceClassifier $priceClassifier)
    {
    }

    public function upsertPrice(int $productId, float $price): void
    {
       $valueClass = $this->priceClassifier->classify($price);

        ProductPrice::updateOrCreate(
            [
                'product_id' => $productId,
            ],
            [
                'price' => $price,
                'value_class' => $valueClass,
            ]
        );
    }
}