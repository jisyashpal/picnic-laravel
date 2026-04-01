<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\FlavourController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LeadController as AdminLeadController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\StoreController as AdminStoreController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\Admin\VideoController as AdminVideoController;
use App\Http\Controllers\Admin\SliderController as AdminSliderController;
use App\Http\Controllers\Admin\InstagramPostController as AdminInstagramPostController;
use Illuminate\Support\Facades\Route;

// Public Pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/brand-story', [PageController::class, 'about'])->name('about');
Route::get('/order', [PageController::class, 'order'])->name('order');
Route::get('/media', [PageController::class, 'media'])->name('media');
Route::get('/store-locator', [PageController::class, 'storeLocator'])->name('store.locator');
Route::get('/franchise', [PageController::class, 'franchise'])->name('franchise');
Route::get('/distributor', [PageController::class, 'distributor'])->name('distributor');
Route::get('/flavours/{category?}', [FlavourController::class, 'index'])->name('flavours');
Route::get('/product/{product}', [FlavourController::class, 'show'])->name('product.show');

// Lead submission endpoints
Route::post('/contact', [LeadController::class, 'storeContact'])->name('contact.store');
Route::post('/leads/franchise', [LeadController::class, 'storeFranchise'])->name('leads.franchise');
Route::post('/leads/distributor', [LeadController::class, 'storeDistributor'])->name('leads.distributor');
Route::post('/leads/business', [LeadController::class, 'storeBusiness'])->name('leads.business');

// Authenticated user profile (Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin - Authenticated
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('leads', AdminLeadController::class)->only(['index']);
    Route::get('leads-export', [AdminLeadController::class, 'export'])->name('leads.export');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('products', AdminProductController::class);
    Route::resource('stores', AdminStoreController::class);
    Route::resource('testimonials', AdminTestimonialController::class);
    Route::resource('videos', AdminVideoController::class);
    Route::resource('sliders', AdminSliderController::class);
    Route::resource('instagram-posts', AdminInstagramPostController::class);
});

// Auth routes (from Breeze)
require __DIR__.'/auth.php';
