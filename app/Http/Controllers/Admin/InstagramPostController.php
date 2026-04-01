<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InstagramPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class InstagramPostController extends Controller
{
    public function index()
    {
        $instagramPosts = InstagramPost::paginate(20);
        return view('admin.instagram_posts.index', compact('instagramPosts'));
    }

    public function create()
    {
        return view('admin.instagram_posts.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:4096',
            'post_url' => 'nullable|url|max:255',
            'embed_html' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $dir = public_path('uploads/instagram');
            File::ensureDirectoryExists($dir);
            $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
            $file->move($dir, $filename);
            $data['image'] = '/uploads/instagram/' . $filename;
        }

        InstagramPost::create($data);
        return redirect()->route('admin.instagram-posts.index')->with('success', 'Instagram post created.');
    }

    public function edit(InstagramPost $instagramPost)
    {
        return view('admin.instagram_posts.form', compact('instagramPost'));
    }

    public function update(Request $request, InstagramPost $instagramPost)
    {
        $data = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
            'post_url' => 'nullable|string|max:255',
            'embed_html' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            if ($instagramPost->image && str_starts_with($instagramPost->image, '/uploads/')) {
                $old = public_path(ltrim($instagramPost->image, '/'));
                if (File::exists($old)) {
                    File::delete($old);
                }
            }

            $file = $request->file('image');
            $dir = public_path('uploads/instagram');
            File::ensureDirectoryExists($dir);
            $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
            $file->move($dir, $filename);
            $data['image'] = '/uploads/instagram/' . $filename;
        }

        $instagramPost->update($data);
        return redirect()->route('admin.instagram-posts.index')->with('success', 'Instagram post updated.');
    }

    public function destroy(InstagramPost $instagramPost)
    {
        // Delete image from public uploads if exists
        if ($instagramPost->image && str_starts_with($instagramPost->image, '/uploads/')) {
            $old = public_path(ltrim($instagramPost->image, '/'));
            if (File::exists($old)) {
                File::delete($old);
            }
        }

        $instagramPost->delete();

        return redirect()
            ->route('admin.instagram-posts.index')
            ->with('success', 'Instagram post deleted.');
    }
}
