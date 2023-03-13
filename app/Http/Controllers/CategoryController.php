<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Services\Category\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryService;
    
    public function __construct(CategoryService $categoryService) {
        $this->categoryService = $categoryService;
    }


    public function list()
    {
        $result =  $this->categoryService->all();
        return response()->json([
            'status' => true,
            'code' => 200,
            'data' => $result
        ]);
    } 

    public function detail(Int $id)
    {
        $result =  $this->categoryService->productByCategory($id);
        return response()->json([
            'status' => true,
            'code' => 200,
            'data' => $result
        ]);
    } 

    public function store(CategoryRequest $request)
    {
        $result = $this->categoryService->store($request);
        return response()->json([
            'status' => true,
            'code' => 200,
            'data' => $result
        ]);
    } 

    public function update(CategoryRequest $request,Int $id)
    {
        $result = $this->categoryService->update($request, $id);
        return response()->json([
            'status' => true,
            'code' => 200,
            'data' => $result
        ]);
    } 
}
