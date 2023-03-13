<?php

namespace App\Http\Controllers;

use App\Services\Product\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productService;
    
    public function __construct(ProductService $productService) {
        $this->productService = $productService;
    }


    public function list()
    {
        return $this->productService->listAllData();
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Int $id)
    {
        return $this->productService->detail($id);
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
