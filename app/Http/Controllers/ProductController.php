<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function index($per_page) {
        $products = Product::paginate($per_page);
        return response()->json($products);

    }

    public function create(Request $request) {
        $product = Product::create($request->all());
        return response()->json($product);
    }

    public function get($slug) {
        $product = Product::where('slug', $slug)->first();
        if($product == null) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        return response()->json($product);
    }

    public function getByCategory($category_slug) {
        $products = Product::whereHas('category', function($query) use ($category_slug) {
            $query->where('slug', $category_slug);
        })->get();

        if($products->isEmpty()) {
            return response()->json(['message' => 'No products found for this category'], 404);
        }

        return response()->json($products);
    }

}
