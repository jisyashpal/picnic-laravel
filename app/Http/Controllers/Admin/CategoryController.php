<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('sort_order')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:categories',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $dir = public_path('uploads/categories');
            File::ensureDirectoryExists($dir);
            $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
            $file->move($dir, $filename);
            $data['thumbnail'] = '/uploads/categories/' . $filename;
        }
        Category::create($data);
        return redirect()->route('admin.categories.index')->with('success', 'Category created.');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.form', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:categories,slug,' . $category->id,
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        if ($request->hasFile('thumbnail')) {
            if ($category->thumbnail && str_starts_with($category->thumbnail, '/uploads/')) {
                $old = public_path(ltrim($category->thumbnail, '/'));
                if (File::exists($old)) {
                    File::delete($old);
                }
            }
            $file = $request->file('thumbnail');
            $dir = public_path('uploads/categories');
            File::ensureDirectoryExists($dir);
            $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
            $file->move($dir, $filename);
            $data['thumbnail'] = '/uploads/categories/' . $filename;
        }
        $category->update($data);
        return redirect()->route('admin.categories.index')->with('success', 'Category updated.');
    }

    public function destroy(Category $category)
    {
        if ($category->thumbnail && str_starts_with($category->thumbnail, '/uploads/')) {
            $old = public_path(ltrim($category->thumbnail, '/'));
            if (File::exists($old)) {
                File::delete($old);
            }
        }
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted.');
    }
}
