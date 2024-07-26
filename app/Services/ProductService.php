<?php

namespace App\Services;

use App\Interfaces\ProductServiceInterface;
use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Product;
use App\Models\User;
use App\Models\ProductPrice;
use Illuminate\Support\Facades\Cache;

class ProductService implements ProductServiceInterface
{
    protected ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function createProduct(array $data): void
    {
        if (!isset($data['user_id'])) {
            throw new \InvalidArgumentException('Trūksta vartotojo ID.');
        }

        $product = $this->productRepository->create([
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
        ProductPrice::updateOrCreate([
            'product_id' => $productId,
            'price' => $price,
        ]);
    }

    public function getAllProducts(): Collection
    {
        return Cache::remember('all_products', now()->addMinutes(1), function () {
            return $this->productRepository->all();
        });
    }

    public function updateProduct(Product $product, array $data): void
    {
        $this->productRepository->update($product, [
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

    public function deleteProduct(int $id): void
    {
        $this->productRepository->delete($id);
        Cache::forget('all_products');
    }
}