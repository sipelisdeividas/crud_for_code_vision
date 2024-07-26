<?php

namespace App\Interfaces;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

interface ProductServiceInterface
{
    public function createProduct(array $data): void;

    public function getAllProducts(): Collection;

    public function updateProduct(Product $product, array $data): void;

    public function deleteProduct(int $id): void;
}