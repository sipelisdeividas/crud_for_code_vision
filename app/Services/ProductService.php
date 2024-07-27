<?php

namespace App\Services;

use App\Interfaces\ProductPriceServiceInterface;
use App\Interfaces\ProductServiceInterface;
use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class ProductService implements ProductServiceInterface
{
    public function __construct(protected ProductRepositoryInterface $productRepository,  protected ProductPriceServiceInterface $productPriceService)
    {
    }

    public function create(array $data): void
    {
        if (!isset($data['user_id']))
        {
            throw new \InvalidArgumentException('Trūksta vartotojo ID.');
        }

        $product = $this->productRepository->create(
            [
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

        $this->productPriceService->upsertPrice($product->id, $data['price']);

        $user->save();

        Cache::forget('all_products');
    }

    public function getAll(): Collection
    {
        return Cache::rememberForever('all_products', function ()
        {
            return $this->productRepository->all();
        });
    }

    public function update(Product $product, array $data): void
    {
        $this->productRepository->update($product,
        [
            'product_name' => strip_tags($data['product_name']),

            'description' => strip_tags($data['description']),

            'mileage' => strip_tags($data['mileage']),

            'euro_standart' => strip_tags($data['euro_standart']),

            'year' => strip_tags($data['year']),

            'engine_type' => strip_tags($data['engine_type']),

            'price' => strip_tags($data['price']),

            'user_id' => $data['user_id'],
        ]);

        $this->productPriceService->upsertPrice($product->id, $data['price']);

        Cache::forget('all_products');
    }

    public function delete(Product $product): void
    {
        $this->productRepository->delete($product);

        Cache::forget('all_products');
    }
}