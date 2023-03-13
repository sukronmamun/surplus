<?php

namespace App\Http\Controllers;

use App\Services\Category\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $category;
    
    public function __construct(CategoryService $category) {
        $this->category = $category;
    }


    public function list()
    {
        $result =  $this->category->all();
        return response()->json([
            'status' => true,
            'code' => 200,
            'data' => $result
        ]);
    } 

    public function detail(Int $id)
    {
        $result =  $this->category->productByCategory($id);
        return response()->json([
            'status' => true,
            'code' => 200,
            'data' => $result
        ]);
    } 
}
