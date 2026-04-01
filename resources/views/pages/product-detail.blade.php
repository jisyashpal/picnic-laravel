@extends('layouts.app')

@section('title', $product->name . ' - PICNIC Ice Cream')

@section('content')

    <section class="bg ">
        <div class="container pt-2">
             <div class="row">
                <nav aria-label="breadcrumb" >
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('flavours') }}">Flavours</a></li>
                        @if ($product->category)
                            <li class="breadcrumb-item"><a
                                    href="{{ route('flavours', $product->category->slug) }}">{{ $product->category->name }}</a>
                            </li>
                        @endif
                        <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container pb-5">

            <div class="row g-5 align-items-center">

                <!-- Product Image -->
                <div class="col-lg-6">
                    <div class="text-center">
                        @if ($product->image)
                            <img src="{{ asset('public/'.$product->image) }}" alt="{{ $product->name }}"
                                class="img-hover-scale rounded-4 g"
                                style="max-width: 100%; height: 400px; object-fit: contain;">
                        @else
                            <img src="{{ asset('public/assets/images/500x350.png') }}" alt="Product Image"
                                class="img-hover-scale rounded-4 "
                                style="max-width: 100%; height: 400px; object-fit: contain;">
                        @endif
                    </div>
                </div>

                <!-- Product Details -->
                <div class="col-lg-6">
                    <div class="bg-white p-4 rounded-4 shadow-lg">
                        <!-- Breadcrumb -->


                        <!-- Product Title -->
                        <h1 class="text-brown-custom mb-3">{{ $product->name }}</h1>

                        <!-- Category Badge -->
                        @if ($product->category)
                            <span class="badge bg-primary mb-3">{{ $product->category->name }}</span>
                        @endif

                        <!-- Price -->
                        @if ($product->price)
                            <div class="mb-4">
                                <span class="fs-3 fw-bold text-pink">₹{{ number_format($product->price, 2) }}</span>
                            </div>
                        @endif

                        <!-- Description -->
                        <div class="mb-4">
                            <h5 class="text-brown-custom mb-3">Description</h5>
                            @if ($product->description)
                                <p class="text-justify">{{ $product->description }}</p>
                            @else
                                <p class="text-justify">Experience the rich, creamy goodness of our {{ $product->name }}
                                    ice cream. Made with the finest ingredients and traditional recipes passed down through
                                    generations, each scoop delivers pure delight and satisfaction.</p>
                            @endif
                            @if ($product->category)
                                <p class="text-justify">Part of our {{ $product->category->name }} collection, this flavor
                                    captures the essence of traditional taste with modern freshness.</p>
                            @endif
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex gap-3 flex-wrap">
                            <a href="{{ route('order') }}" class="btn btn-sm btn-submit-pink btn-lg flex-fill">
                                <i class="fas fa-shopping-cart me-2"></i>Order Now
                            </a>
                            <a href="{{ route('flavours') }}" class="btn btn-sm btn-outline-primary btn-lg flex-fill">
                                <i class="fas fa-arrow-left me-2"></i>Back to Flavours
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Products Section -->
            <div class="mt-5">
                <h3 class="text-center text-brown-custom mb-4">You Might Also Like</h3>
                <div class="row justify-content-center">
                    @php
                        $relatedProducts = \App\Models\Product::where('category_id', $product->category_id)
                            ->where('id', '!=', $product->id)
                            ->limit(3)
                            ->get();
                    @endphp

                    @forelse($relatedProducts as $related)
                        <div class="col-md-4 mb-4">
                            <div class="bg-white p-3 rounded-4 shadow-lg text-center h-100">
                                @if ($related->image)
                                    <img src="{{ asset('public/'.$related->image) }}" alt="{{ $related->name }}"
                                        class="img-hover-scale rounded-3 mb-3"
                                        style="width: 100%; height: 200px; object-fit: contain;">
                                @endif
                                <h5 class="text-brown-custom mb-2">{{ $related->name }}</h5>
                                @if ($related->price)
                                    <p class="text-pink fw-bold mb-3">₹{{ number_format($related->price, 2) }}</p>
                                @endif
                                <a href="{{ route('product.show', $related) }}" class="btn btn-outline-primary btn-sm">
                                    See Details
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p class="text-muted">No related products available.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection
