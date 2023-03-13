<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Services\Product\ProductService;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class ProductController extends Controller
{
    private $productService;
    
    public function __construct(ProductService $productService) {
        $this->productService = $productService;
    }


    public function list()
    {
        $result =  $this->productService->listAllData();
        return response()->json([
            'status' => true,
            'code' => 200,
            'data' => $result
        ]);
    }

    public function store(ProductRequest $request)
    {
       
        $result = $this->productService->store($request);
        return response()->json([
            'status' => true,
            'code' => 200,
            'data' => $result
        ]);
    }

    public function show(Int $id)
    {
        $result =  $this->productService->detail($id);

        return response()->json([
            'status' => true,
            'code' => 200,
            'data' => $result
        ]);
    }

    public function update(Request $request, string $id)
    {
        
    }

    public function destroy(string $id)
    {
        //
    }
}
