<?php

namespace App\Services;

use App\Interfaces\ProductServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Product;
use App\Models\User;
use App\Models\ProductPrice;
use Illuminate\Support\Facades\Cache;

class ProductService implements ProductServiceInterface
{
    public function createProduct(array $data): void
    {

        if (!isset($data['user_id'])) {
            throw new \InvalidArgumentException('Trūksta vartotojo ID.');
        }

        $product = Product::create([
            'product_name' => strip_tags($data['product_name']),
            'description' => strip_tags($data['description']),
            'mileage' => strip_tags($data['mileage']),
            'euro_standart' => strip_tags($data['euro_standart']),
            'year' => strip_tags($data['year']),
            'engine_type' => strip_tags($data['engine_type']),
            'price' => strip_tags($data['price']),
            'user_id' => $data['user_id'],
        ]);

        $user = User::findOrFail($data['user_id']);
        $user->product_id = $product->id;
        $this->createProductPrice($product->id, $data['price']);
        $user->save();

        Cache::forget('all_products');
    }

    protected function createProductPrice(int $productId, float $price): void
    {
        $valueClass = $this->classifyPrice($price);

        ProductPrice::updateOrCreate([
            'product_id' => $productId,
            'price' => $price,
            'value_class' => $valueClass,
        ]);
    }

    protected function classifyPrice(float $price): string
    {
        if ($price >= 0 && $price <= 50000) {
            return 'low';
        } elseif ($price > 50000 && $price <= 150000) {
            return 'middle';
        } elseif ($price > 150000 && $price <= 500000) {
            return 'high';
        } else {
            return 'unknown';
        }
    }

    public function updateProduct(Product $product, array $data): void
    {
        $product->update([
            'product_name' => strip_tags($data['product_name']),
            'description' => strip_tags($data['description']),
            'mileage' => strip_tags($data['mileage']),
            'euro_standart' => strip_tags($data['euro_standart']),
            'year' => strip_tags($data['year']),
            'engine_type' => strip_tags($data['engine_type']),
            'price' => strip_tags($data['price']),
            'user_id' => $data['user_id'],
        ]);

        $this->createProductPrice($product->id, $data['price']);

        Cache::forget('all_products');
    }

    public function getAllProducts(): Collection
    {
        return Cache::remember('all_products', now()->addMinutes(1), function () {
            return Product::all();
        });
    }

    public function deleteProduct(int $id): void
    {
        $product = Product::findOrFail($id);
        $product->delete();
    }
}