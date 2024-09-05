<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Interface\Service\ProductServiceInterface;

class ProductController extends Controller
{
    private $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return $this->productService->findProducts();
    }

    public function store(ProductStoreRequest $request)
    {
        return $this->productService->createProduct($request);
    }

    public function show(int $productId)
    {
        return $this->productService->findProductById($productId);
    }

    public function update(ProductUpdateRequest $request, int $productId)
    {
        return $this->productService->updateProduct($request, $productId);
    }

    public function destroy(int $productId)
    {
        return $this->productService->removeProduct($productId);
    }
}
