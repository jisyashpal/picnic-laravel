@extends('layouts.app')

@section('title', $page_title ?? 'PICNIC - ICE CREAM')
@section('meta_description',
    $meta_description ??
    'PICNIC Ice Creams offers delicious kulfi and ice creams made with
    100% pure cow milk.')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show position-fixed"
            style="top: 20px; right: 20px; z-index: 9999; max-width: 400px;" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <section class="slider position-relative overflow-hidden">
        @forelse($sliders as $index => $slide)
            <div class="slide {{ $loop->first ? 'active' : '' }}" data-title="{!! str_replace(["\r", "\n"], '<br>', e($slide->title)) !!}"
                data-subtitle="{{ $slide->subtitle ?? '' }}"
                style="background-image: url('{{ asset('public/' . $slide->image) }}'); background-size: contain;  background-repeat: no-repeat;">
                @if ($slide->cta_text)
                    <div class="offer-badge">{{ $slide->cta_text }}</div>
                @endif
            </div>
        @empty
            <div class="slide active" data-title="Strawberry<br>Dream"
                data-subtitle="Sweet, creamy, and full of love - the perfect scoop for every mood!"
                style="background-image: url('{{ asset('public/assets/images/ice-creem/7.png') }}'); background-size: contain; background-position: center; background-repeat: no-repeat;">
                <div class="offer-badge">Download Brochures</div>
            </div>
        @endforelse

        @php $activeSlide = $sliders->first() ?? null; @endphp
        <div class="text-content" id="slider-title">
            @if ($activeSlide)
                <h1>{!! nl2br(e($activeSlide->title)) !!}</h1>
                @if ($activeSlide->subtitle)
                    <p>{{ $activeSlide->subtitle }}</p>
                @endif
            @else
                <h1>Strawberry <br> Dream</h1>
                <p>Sweet, creamy, and full of love - the perfect scoop for every mood!</p>
            @endif
        </div>

        <div class="dots">
            @foreach ($sliders as $i => $slide)
                <div class="dot {{ $loop->first ? 'active' : '' }}" data-index="{{ $i }}"></div>
            @endforeach
        </div>
    </section>

    <div class="bg d-flex align-items-center justify-content-center p-4 brand-story">
        <section class="p-4 p-md-5 rounded-4 shadow-lg w-100 about-gradient-bg">
            <div class="row g-4 g-md-5 align-items-center">
                <div class="col-md-6">
                    <h1 class="fw-bold mb-4 text-brown-custom text-shadow-white">About Picnic Ice Creams: Our Pledge to
                        Purity</h1>
                    <p class="mb-4 lh-lg text-justify">
                        <strong>Picnic Ice Cream</strong> is proud to be a brand extension of Puresh Daily. This connection
                        means our commitment to quality starts right at the source: Because we are part of the Puresh Daily
                        family, we have direct access to and control over the finest, purest Cow Milk, guaranteeing the
                        integrity and quality of every single ingredient from farm to Kulfi.
                    </p>
                    <h2 class="fs-3 font-dancing text-brown-custom text-shadow-white">Our Uncompromising Quality:</h2>
                    <p class="fs-3 text-danger fw-semibold">Pure Milk, Pure Joy</p>
                </div>
                <div class="col-md-6">
                    @php $heroVideo = $videos->first(); @endphp
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/{{ $heroVideo->video_id ?? 'oOoG0Uc51LQ' }}"
                            title="PICNIC Ice Creams" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section class="bg py-5 text-center ogs-section">
        <div class="row g-0">
            <h2 class="display-5 fw-bold mb-4">
                <span class="text-success">Our</span> Flavours
                <div class="section-divider"></div>
            </h2>
            @php
                $bgClasses = ['og-card-pink', 'og-card-brown', 'og-card-tan', 'og-card-green'];
            @endphp
            @foreach ($categories as $idx => $category)
                <a href="{{ route('flavours', $category->slug) }}"
                    class="col-12 col-sm-6 col-lg-3 position-relative d-flex flex-column justify-content-center align-items-center p-4 p-md-5 text-white {{ $bgClasses[$idx % count($bgClasses)] }} text-decoration-none">
                    <h3 class="display-6 fw-bold mb-4 text-shadow-dark">{{ $category->name }}</h3>
                    <img src="{{ asset('public/' . $category->thumbnail) }}" alt="{{ $category->name }}"
                        class="rounded-circle mb-4 og-card-img-main">
                </a>
            @endforeach
        </div>
    </section>

    @if ($videos->count() > 0)
        <section class="youtube-video py-5">
            <div class="container">
                <h2 class="display-5 fw-bold  text-center pb-2">
                    Watch Our <span class="text-danger">Videos</span>
                </h2>
                <div class="row">
                    @foreach ($videos->take(4) as $video)
                        <div class="col-md-3 col-6 p-0 m-0">
                            <iframe class="w-100 youtube-iframe" src="https://www.youtube.com/embed/{{ $video->video_id }}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="insta-capture pb-4 bg">
        <div class="container-fluid">
            <h2 class="instagram-heading text-center py-4">
                <span class="instagram-text">Instagram</span> <span class="captures-text">Captures</span>
            </h2>
            <div class="row">
                @forelse ($instagram_posts as $post)
                    <div class="col-md-3 col-4 p-0 m-0">
                        <a href="{{ $post->post_url ?: 'https://www.instagram.com/picnic_icecreams/' }}" target="_blank">
                            <img src="{{ asset('public/' . $post->image) }}" alt="Instagram preview" class="img-fluid">
                        </a>
                        <div class="instagram-overlay">
                            <div class="d-flex gap-2">
                                <a href="{{ $post->post_url ?: 'https://www.instagram.com/picnic_icecreams/' }}"
                                    target="_blank" class="instagram-icon" aria-label="Like">
                                    <i class="bi bi-heart-fill icon-like"></i>
                                </a>
                                <a href="{{ $post->post_url ?: 'https://www.instagram.com/picnic_icecreams/' }}"
                                    target="_blank" class="instagram-icon" aria-label="Comment">
                                    <i class="bi bi-chat-dots-fill icon-comment"></i>
                                </a>
                                <a href="{{ $post->post_url ?: 'https://www.instagram.com/picnic_icecreams/' }}"
                                    target="_blank" class="instagram-icon" aria-label="Share">
                                    <i class="bi bi-share-fill icon-share"></i>
                                </a>
                            </div>
                            <div class="instagram-overlay-text">View on Instagram</div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-4">
                        <p class="text-muted">No Instagram posts available.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="bg py-5" id="contact-business">
        <div class="container text-center px-3 px-md-5">
            <h2 class="section-title ">
                <span class="highlight">Contact For</span> Business with us
            </h2>
            <p class="fs-5 fw-semibold mb-4 contact-tagline">Let's scoop up some business! 🍦</p>

            <div class="row g-4 g-md-5 align-items-center">
                <!-- Left: Form -->
                <div class="col-md-6">
                    <form action="{{ route('leads.business') }}" method="POST" class="bg-white p-4 rounded-3 shadow-lg">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label text-start d-block fw-semibold text-dark">Name</label>
                            <input type="text" id="name" name="name"
                                class="form-control border-2 @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label text-start d-block fw-semibold text-dark">Contact
                                Number</label>
                            <input type="tel" id="phone" name="phone"
                                class="form-control border-2 @error('phone') is-invalid @enderror"
                                value="{{ old('phone') }}" required>
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="address"
                                class="form-label text-start d-block fw-semibold text-dark">Location</label>
                            <textarea id="address" name="address" rows="3"
                                class="form-control border-2 @error('address') is-invalid @enderror" required>{{ old('address') }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="business_type"
                                class="form-label text-start d-block fw-semibold text-dark">Business Inquiry</label>
                            <select id="business_type" name="business_type"
                                class="form-control border-2 @error('business_type') is-invalid @enderror" required>
                                <option value="">Select</option>
                                <option value="distributor" {{ old('business_type') == 'distributor' ? 'selected' : '' }}>
                                    Distributor</option>
                                <option value="franchise" {{ old('business_type') == 'franchise' ? 'selected' : '' }}>
                                    Franchise</option>
                            </select>
                            @error('business_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" name="submit"
                            class="w-100 btn text-white py-2 rounded btn-submit-pink">Submit</button>
                    </form>
                </div>

                <!-- Right: Image -->
                <div class="col-md-6">
                    <img src="{{ asset('public/assets/images/500x350.png') }}" alt="Contact Distributor"
                        class="w-100 h-auto rounded-3">
                </div>
            </div>
        </div>
    </section>

    <section
        class="order py-5 d-none d-md-flex container-fluid justify-content-center align-items-center header-nav-wrapper header-line">
        <div class="container-fluid">
            <div class="row">
                <div class="text-center">
                    <a href="{{ url('order') }}"
                        class="btn btn-submit-pink text-white px-3 px-md-4 py-2 rounded fw-semibold small">
                        Order Now
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection
