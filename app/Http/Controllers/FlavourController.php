<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class FlavourController extends Controller
{
    public function index(?string $category = null)
    {
        $categories = Category::with('products')->orderBy('sort_order')->get();
        $selectedCategory = null;
        $products = collect();

        if ($category) {
            $selectedCategory = Category::where('slug', $category)->first();
            if ($selectedCategory) {
                $products = $selectedCategory->products()->paginate(12);
            }
        } else {
            $products = Product::with('category')->paginate(12);
        }

        return view('pages.flavours', [
            'categories' => $categories,
            'category' => $category,
            'selectedCategory' => $selectedCategory,
            'products' => $products,
        ]);
    }

    public function show(Product $product)
    {
        return view('pages.product-detail', [
            'product' => $product->load('category'),
        ]);
    }
}
