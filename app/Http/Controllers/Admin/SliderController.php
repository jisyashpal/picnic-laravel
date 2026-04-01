<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('sort_order')->paginate(20);
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
            'cta_text' => 'nullable|string|max:100',
            'cta_url' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'active' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $dir = public_path('uploads/sliders');
            File::ensureDirectoryExists($dir);
            $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
            $file->move($dir, $filename);
            $data['image'] = '/uploads/sliders/' . $filename;
        }

        $data['active'] = $request->boolean('active');

        Slider::create($data);
        return redirect()->route('admin.sliders.index')->with('success', 'Slider created.');
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.form', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
            'cta_text' => 'nullable|string|max:100',
            'cta_url' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'active' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            if ($slider->image && str_starts_with($slider->image, '/uploads/')) {
                $old = public_path(ltrim($slider->image, '/'));
                if (File::exists($old)) {
                    File::delete($old);
                }
            }

            $file = $request->file('image');
            $dir = public_path('uploads/sliders');
            File::ensureDirectoryExists($dir);
            $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
            $file->move($dir, $filename);
            $data['image'] = '/uploads/sliders/' . $filename;
        }

        $data['active'] = $request->boolean('active');

        $slider->update($data);
        return redirect()->route('admin.sliders.index')->with('success', 'Slider updated.');
    }

    public function destroy(Slider $slider)
    {
        if ($slider->image && str_starts_with($slider->image, '/uploads/')) {
            $old = public_path(ltrim($slider->image, '/'));
            if (File::exists($old)) {
                File::delete($old);
            }
        }

        $slider->delete();
        return redirect()->route('admin.sliders.index')->with('success', 'Slider deleted.');
    }
}
