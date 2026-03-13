<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($per_page) {
        $categories = ProductCategory::paginate($per_page);
        return response()->json($categories);
    }

    public function create(Request $request) {
        $category = ProductCategory::create($request->all());
        return response()->json($category);
    }

    public function get($slug) {
        $category = ProductCategory::where('slug', $slug)->first();
        if($category == null) {
            return response()->json(['message' => 'Category not found'], 404);
        }
        return response()->json($category);
    }
}
