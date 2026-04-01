@extends('layouts.app')

@section('title', 'Our Flavours')

@section('content')
    <section class="products-section py-5">
        <div class="container">
            <h2 class="title text-center mb-5">Our Delicious Flavours</h2>

            {{-- All Flavours Link --}}
            <div class="text-center mb-4">
                <a href="{{ route('flavours') }}" class="all-flavours-simple {{ !$selectedCategory ? 'active' : '' }}">
                    <i class="fas fa-list-ul me-2"></i>
                    All Flavours
                    <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>

            <div class="products-layout row">
                {{-- LEFT: Categories --}}
                <div class="categories col-md-4">
                    @foreach ($categories as $cat)
                        <a href="{{ route('flavours', $cat->slug) }}"
                            class="cat-item mb-3 {{ $selectedCategory?->id === $cat->id ? 'active' : '' }}">
                            <img src="{{ asset('public/' . ($cat->thumbnail ?? 'public/assets/images/500x350.png')) }}"
                                alt="{{ $cat->name }}">
                            <span>{{ $cat->name }}</span>
                        </a>
                    @endforeach
                </div>

                {{-- RIGHT: Products --}}
                <div class="col-md-8">
                    <div class="row">
                        @forelse($products as $product)
                            <div class="col-md-4 mb-4">
                                <div class="product-card text-center">
                                    @if ($product->image)
                                        <img src="{{ asset('public/' . $product->image) }}" alt="{{ $product->name }}">
                                    @endif

                                    <h4 class="mt-2">{{ $product->name }}</h4>

                                    @if ($product->price)
                                        <p class="price">₹{{ number_format($product->price, 2) }}</p>
                                    @endif

                                    <a href="{{ route('product.show', $product) }}" class="btn btn-outline-primary btn-sm">
                                        See Details
                                    </a>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted text-center">
                                No products available.
                            </p>
                        @endforelse
                    </div>

                    {{-- Pagination --}}
                    @if($products->hasPages())
                        <div class="d-flex justify-content-center mt-4">
                            {{ $products->links() }}
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </section>
@endsection
