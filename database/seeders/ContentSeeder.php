<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\Video;
use App\Models\InstagramPost;
use App\Models\Store;
use App\Models\Slider;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        // Disable foreign key constraints during seeding
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Clear existing data (truncate in correct order to respect FK constraints)
        Product::truncate();
        Slider::truncate();
        Category::truncate();
        Testimonial::truncate();
        Video::truncate();
        InstagramPost::truncate();
        Store::truncate();

        // Re-enable foreign key constraints
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Sliders
        Slider::create([
            'title' => 'PICNIC Ice Creams',
            'subtitle' => '100% Pure Cow Milk',
            'cta_text' => 'Order Now',
            'cta_url' => '/order',
            'sort_order' => 1,
            'active' => true,
        ]);

        Slider::create([
            'title' => 'Fresh & Creamy',
            'subtitle' => 'Delicious Flavours',
            'cta_text' => 'Browse Flavours',
            'cta_url' => '/flavours',
            'sort_order' => 2,
            'active' => true,
        ]);

        // Categories
        $kulfi = Category::create(['name' => 'Kulfi', 'slug' => 'kulfi', 'sort_order' => 1]);
        $iceCreams = Category::create(['name' => 'Ice Creams', 'slug' => 'ice-creams', 'sort_order' => 2]);
        $iceCandy = Category::create(['name' => 'Ice Candy', 'slug' => 'ice-candy', 'sort_order' => 3]);
        $bulkPacker = Category::create(['name' => 'Bulk Packer', 'slug' => 'bulk-packer', 'sort_order' => 4]);
        $newLaunches = Category::create(['name' => 'New Launches', 'slug' => 'new-launches', 'sort_order' => 5]);

        // Sample Products
        Product::create(['name' => 'Classic Malai Kulfi', 'price' => 30.00, 'category_id' => $kulfi->id]);
        Product::create(['name' => 'Kesar Pista Kulfi', 'price' => 40.00, 'category_id' => $kulfi->id]);
        Product::create(['name' => 'Mango Kulfi', 'price' => 35.00, 'category_id' => $kulfi->id]);

        Product::create(['name' => 'Vanilla Ice Cream', 'price' => 50.00, 'category_id' => $iceCreams->id]);
        Product::create(['name' => 'Chocolate Ice Cream', 'price' => 55.00, 'category_id' => $iceCreams->id]);
        Product::create(['name' => 'Strawberry Ice Cream', 'price' => 60.00, 'category_id' => $iceCreams->id]);

        Product::create(['name' => 'Orange Candy', 'price' => 10.00, 'category_id' => $iceCandy->id]);
        Product::create(['name' => 'Cola Candy', 'price' => 10.00, 'category_id' => $iceCandy->id]);

        // Testimonials
        Testimonial::create([
            'name' => 'Aditya Sharma',
            'location' => 'Ranchi, India',
            'review' => '"Absolutely love the creamy texture! The Kulflicious flavor took me back to childhood."',
            'avatar' => 'https://i.pravatar.cc/100?img=3',
            'border_color' => '#ffc107'
        ]);

        Testimonial::create([
            'name' => 'Ananya Verma',
            'location' => 'Ranchi, India',
            'review' => '"The Fruitylicious sorbet is pure heaven—fresh, light, and super refreshing!"',
            'avatar' => 'https://i.pravatar.cc/100?img=5',
            'border_color' => '#17a2b8'
        ]);

        Testimonial::create([
            'name' => 'Sohan Kapoor',
            'location' => 'Ranchi, India',
            'review' => '"So creamy and rich! The Chocolicious scoop is my new addiction."',
            'avatar' => 'https://i.pravatar.cc/100?img=8',
            'border_color' => '#28a745'
        ]);

        // Videos
        Video::create(['video_id' => 'BOspBLJn4ok', 'type' => 'youtube']);
        Video::create(['video_id' => 'U5GrSXep1AMlgBro', 'type' => 'youtube']);
        Video::create(['video_id' => 'NjQuKkfWGTaVbD3F', 'type' => 'youtube']);

        // Instagram
        InstagramPost::create([
            'image' => 'public/assets/images/flavors/1.png',
            'post_url' => 'https://www.instagram.com/p/DQ54-fyiO0G/'
        ]);
        InstagramPost::create([
            'image' => 'public/assets/images/flavors/2.png',
            'post_url' => 'https://www.instagram.com/p/DRmdEt-Ec_E/'
        ]);

        // Sample Store
        Store::create([
            'name' => 'PICNIC Ranchi Store',
            'address' => 'Ground Floor, Laxmi Tower, Kokar',
            'city' => 'Ranchi',
            'phone' => '+91-90310-07352',
        ]);
    }
}
