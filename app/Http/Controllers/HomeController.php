<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\Video;
use App\Models\InstagramPost;
use App\Models\Slider;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home', [
            'page_title' => 'PICNIC - ICE CREAM',
            'meta_description' => 'PICNIC Ice Creams offers delicious kulfi and ice creams made with 100% pure cow milk.',
            'sliders' => Slider::where('active', true)->orderBy('sort_order')->get(),
            'categories' => Category::orderBy('sort_order')->limit(4)->get(),
            'testimonials' => Testimonial::limit(6)->get(),
            'videos' => Video::limit(6)->get(),
            'instagram_posts' => InstagramPost::limit(12)->get(),
            'featured_products' => Product::with('category')->limit(8)->get(),
        ]);
    }
}
