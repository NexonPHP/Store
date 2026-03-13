<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        $categories = ProductCategory::with('children')
            ->whereNull('parent_id')
            ->get();

        return view('theme::home', [
            'categories' => $categories
        ]);
    }
}
