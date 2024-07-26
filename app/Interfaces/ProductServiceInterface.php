<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface ProductServiceInterface
{
    public function createProduct(array $data): void;

    public function getAllProducts(): Collection;

    public function deleteProduct(int $id): void;
}