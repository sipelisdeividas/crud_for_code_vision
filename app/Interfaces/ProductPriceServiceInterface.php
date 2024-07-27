<?php

namespace App\Interfaces;

interface ProductPriceServiceInterface
{
    public function upsertPrice(int $productId, float $price): void;
}