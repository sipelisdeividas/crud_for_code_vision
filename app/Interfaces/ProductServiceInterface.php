<?php

namespace App\Interfaces;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

interface ProductServiceInterface
{
    public function create(array $data): void;

    public function getAll(): Collection;

    public function update(Product $product, array $data): void;

    public function delete(Product $product): void;
}