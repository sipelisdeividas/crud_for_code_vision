<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function create(array $data): Product
    {
        return Product::create($data);
    }

    public function all(): Collection
    {
        return Product::all();
    }

    public function update(Product $product, array $data): void
    {
        $product->update($data);
    }

    public function delete(Product $product): void
    {
        $product->delete();
    }
}