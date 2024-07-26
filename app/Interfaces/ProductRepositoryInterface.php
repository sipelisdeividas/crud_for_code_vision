<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Product;

interface ProductRepositoryInterface
{
    public function create(array $data): Product;

    public function all(): Collection;

    public function update(Product $product, array $data): void;

    public function delete(int $id): void;
}