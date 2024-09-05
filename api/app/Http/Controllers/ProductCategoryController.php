<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCategoryStoreRequest;
use App\Http\Requests\ProductCategoryUpdateRequest;
use App\Interface\Service\ProductCategoryServiceInterface;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    private $productCategoryService;

    public function __construct(ProductCategoryServiceInterface $productCategoryService)
    {
        $this->productCategoryService = $productCategoryService;
    }

    public function index()
    {
        return $this->productCategoryService->findProductCategories();
    }

    public function store(ProductCategoryStoreRequest $request)
    {
        return $this->productCategoryService->createProductCategory($request);
    }

    public function show(int $productCategoryId)
    {
        return $this->productCategoryService->findProductCategoryById($productCategoryId);
    }

    public function update(ProductCategoryUpdateRequest $request, int $productCategoryId)
    {
        return $this->productCategoryService->updateProductCategory($request, $productCategoryId);
    }

    public function destroy(int $productCategoryId)
    {
        return $this->productCategoryService->removeProductCategory($productCategoryId);
    }
}
