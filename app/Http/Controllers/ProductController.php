<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Interfaces\ProductServiceInterface;
use App\Jobs\DeleteAllProducts;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Models\Product;

class ProductController extends Controller
{
    public function __construct(protected ProductServiceInterface $productService)
    {
    }

    public function showCreateForm(): View
    {
        $users = User::all();

        return view('product.create', compact('users'));
    }

    public function create(CreateProductRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $this->productService->create($validated);

        return redirect()->route('login')->with('success', 'Produktas sėkmingai sukurtas.');
    }

    public function index(): View
    {
        $products = $this->productService->getAll();

        return view('product.index', compact('products'));
    }

    public function showEditForm(Product $product): View
    {
        $users = User::all();

        return view('product.edit', compact('product', 'users'));
    }

    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $validated = $request->validated();

        $this->productService->update($product, $validated);

        return redirect()->route('products.index')->with('success', 'Produktas sėkmingai atnaujintas.');
    }

    public function delete(Product $product): RedirectResponse
    {
        $this->productService->delete($product);

        return redirect()->route('products.index')->with('success', 'Produktas sėkmingai pašalintas.');
    }

    public function deleteAll(): RedirectResponse
    {
        DeleteAllProducts::dispatch();

        return redirect()->route('products.index')->with('success', 'Visi produktai bus pašalinti.');
    }
}