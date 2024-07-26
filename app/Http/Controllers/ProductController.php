<?php

namespace App\Http\Controllers;

use App\Interfaces\ProductServiceInterface;
use App\Jobs\DeleteAllProducts;
use Illuminate\View\View;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Models\Product;

class ProductController extends Controller
{

    protected ProductServiceInterface $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function index(): View
    {
        $products = $this->productService->getAllProducts();
        return view('product.index', compact('products'));
    }

    public function showCreateProductForm(): View
    {
        $users = User::all();

        return view('product.create', compact('users'));
    }

    public function createProduct(ProductRequest $request): RedirectResponse
    {

         $validated = $request->validated();

         $this->productService->createProduct($validated);

         return redirect()->route('login')->with('success', 'Produktas sėkmingai sukurtas.');
    }

    public function showEditProductForm(Product $product): View
    {
        $users = User::all();
        return view('product.edit', compact('product', 'users'));
    }

    public function updateProduct(ProductRequest $request, Product $product): RedirectResponse
    {
        $validated = $request->validated();

        $this->productService->updateProduct($product, $validated);

        return redirect()->route('products.index')->with('success', 'Produktas sėkmingai atnaujintas.');
    }

    public function deleteProduct(int $id): RedirectResponse
    {
        $this->productService->deleteProduct($id);

        return redirect()->route('products.index')->with('success', 'Produktas sėkmingai pašalintas.');
    }

    public function deleteAll(): RedirectResponse
    {
        DeleteAllProducts::dispatch();
        return redirect()->route('products.index')->with('success', 'Visi produktai bus pašalinti.');
    }
}