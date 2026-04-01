<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(20);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.form', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'nullable|numeric',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $dir = public_path('uploads/products');
            File::ensureDirectoryExists($dir);
            $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
            $file->move($dir, $filename);
            $data['image'] = '/uploads/products/' . $filename;
        }
        Product::create($data);
        return redirect()->route('admin.products.index')->with('success', 'Product created.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.form', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'nullable|numeric',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        if ($request->hasFile('image')) {
            if ($product->image && str_starts_with($product->image, '/uploads/')) {
                $old = public_path(ltrim($product->image, '/'));
                if (File::exists($old)) {
                    File::delete($old);
                }
            }
            $file = $request->file('image');
            $dir = public_path('uploads/products');
            File::ensureDirectoryExists($dir);
            $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
            $file->move($dir, $filename);
            $data['image'] = '/uploads/products/' . $filename;
        }
        $product->update($data);
        return redirect()->route('admin.products.index')->with('success', 'Product updated.');
    }

    public function destroy(Product $product)
    {
        if ($product->image && str_starts_with($product->image, '/uploads/')) {
            $old = public_path(ltrim($product->image, '/'));
            if (File::exists($old)) {
                File::delete($old);
            }
        }
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted.');
    }
}
