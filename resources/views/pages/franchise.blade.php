@extends('layouts.app')

@section('title', 'Franchise - Picnic Ice Creams')

@section('content')
    <section class="about-franchise py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2><span>Own a</span> PICNIC Franchise<br><span>Your Success Story</span></h2>
                    <p>Become a proud PICNIC Ice Creams franchise owner and be part of our rapidly growing network. Our
                        franchise model offers everything you need to run a successful ice cream business - from premium
                        products and proven systems to comprehensive training and ongoing support.</p>
                    <p>With PICNIC, you'll benefit from our established brand reputation, marketing support, operational
                        expertise, and a product line that customers love. Join thousands of successful franchise owners who
                        have turned their entrepreneurial dreams into reality with PICNIC Ice Creams.</p>
                    <a href="#contact-business"
                        class="btn btn-submit-pink blink text-white px-3 px-md-4 py-2 rounded fw-semibold small">APPLY
                        NOW</a>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('public/assets/images/ice-creem/5.png') }}" alt="Franchise" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section class="wooden  py-4">
        <div class="container">
            <div class="row">
                <h2 class="text-end pb-1">BUILD YOUR FUTURE<br>TAKE CHARGE!!!<br>FILL A FRANCHISE FORM TODAY</h2>
                <div class="col-md-6">
                    <img src="{{ asset('public/assets/images/frenchise/wooden.png') }}" alt="Wooden" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <p class="text-end">Build your entrepreneurial future with PICNIC Ice Creams franchise! Our proven
                        business model, comprehensive training program, and ongoing support ensure your success. Join our
                        network of successful franchise owners and create a thriving ice cream business that serves your
                        community with premium quality products. Fill out our franchise application form today and take the
                        first step towards business ownership!</p>
                </div>
            </div>
        </div>
    </section>

    <section class="advantage-outlook bg">
        <div class="container-fluid">
            <div class="row advantage-sec py-3">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <div class="container">
                        <div class="row d-flex justify-content-center ">
                            <h2 class="mt-2">THE PICNIC ADVANTAGE</h2>
                            <div class="col-5 pb-2"><img src="{{ asset('public/assets/images/frenchise/poster-1.png') }}"
                                    alt="" class="img-fluid"></div>
                            <div class="col-5 pb-2"><img src="{{ asset('public/assets/images/frenchise/poster-2.png') }}"
                                    alt="" class="img-fluid"></div>
                            <div class="col-5 pb-2"><img src="{{ asset('public/assets/images/frenchise/poster-3.png') }}"
                                    alt="" class="img-fluid"></div>
                            <div class="col-5 pb-2"><img src="{{ asset('public/assets/images/frenchise/poster-4.png') }}"
                                    alt="" class="img-fluid"></div>
                        </div>
                    </div>

                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5 outlook" style="background: pink;">
                    <h2 class="mt-2">COMPETITION OUTLOOK</h2>
                    <div class="container">
                        <div class="row d-flex justify-content-center ">
                            <div class="col-5 pb-2"><img src="{{ asset('public/assets/images/frenchise/outlook-1.png') }}"
                                    alt="" class="img-fluid"></div>
                            <div class="col-5 pb-2"><img src="{{ asset('public/assets/images/frenchise/outlook-2.png') }}"
                                    alt="" class="img-fluid"></div>
                            <div class="col-5 pb-2"><img src="{{ asset('public/assets/images/frenchise/outlook-3.png') }}"
                                    alt="" class="img-fluid"></div>
                            <div class="col-5 pb-2"><img src="{{ asset('public/assets/images/frenchise/outlook-4.png') }}"
                                    alt="" class="img-fluid"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <hr class="my-0">

    <section class="custom-bg py-5 franchise-sec" id="contact-business">
        <div class="container text-center px-3 px-md-5">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="row g-4 g-md-5 align-items-center">
                <div class="col-md-6">
                    <form class="bg-white p-4 rounded-3 shadow-lg" method="POST" action="{{ route('leads.franchise') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label text-start d-block fw-semibold text-dark">Name</label>
                            <input type="text" id="name" name="name" class="form-control border-2" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label text-start d-block fw-semibold text-dark">Contact
                                Number</label>
                            <input type="tel" id="phone" name="phone" class="form-control border-2" required>
                        </div>
                        <div class="mb-3">
                            <label for="whatsapp"
                                class="form-label text-start d-block fw-semibold text-dark">Whatsapp</label>
                            <input type="tel" id="whatsapp" name="whatsapp" class="form-control border-2">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label text-start d-block fw-semibold text-dark">Email</label>
                            <input type="email" id="email" name="email" class="form-control border-2">
                        </div>
                        <div class="mb-3">
                            <label for="address"
                                class="form-label text-start d-block fw-semibold text-dark">Location</label>
                            <textarea id="address" name="address" rows="3" class="form-control border-2"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label text-start d-block fw-semibold text-dark">Interested
                                Amount</label>
                            <textarea id="amount" name="amount" rows="3" class="form-control border-2"></textarea>
                        </div>
                        <button type="submit" class="w-100 btn text-white py-2 rounded btn-submit-pink">Submit</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('public/assets/images/500x350.png') }}" alt="Contact Franchise"
                        class="w-100 h-auto rounded-3">
                </div>
            </div>
        </div>
    </section>

    <section class="bg py-5 px-3 px-md-5">
        <div class="container text-center">
            <h2 class="h1 fw-bold text-shadow-dark mb-4"><span class="text-success">Get In Touch</span></h2>
            <p class="fs-6 mb-5">Got questions? We'd love to hear from you!</p>
            <div class="row g-4 justify-content-center">
                <div class="col-md-4 mb-4">
                    <div class="card rounded-4 shadow-lg p-4 h-100 text-center">
                        <i class="bi bi-telephone-fill text-danger fs-1 mb-3"></i>
                        <h5 class="fw-bold mb-3">Phone</h5>
                        <p class="text-muted mb-3">Call us directly</p>
                        <a href="tel:+919031007352"
                            class="btn btn-submit-pink blink text-white px-4 py-2 rounded fw-semibold">+91-90310-07352</a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card rounded-4 shadow-lg p-4 h-100 text-center">
                        <i class="bi bi-envelope-fill text-danger fs-1 mb-3"></i>
                        <h5 class="fw-bold mb-3">Email</h5>
                        <p class="text-muted mb-3">Send us a message</p>
                        <a href="mailto:picnicicecreams@gmail.com"
                            class="btn btn-submit-pink blink text-white px-4 py-2 rounded fw-semibold">Email Us</a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card rounded-4 shadow-lg p-4 h-100 text-center">
                        <i class="bi bi-geo-alt-fill text-danger fs-1 mb-3"></i>
                        <h5 class="fw-bold mb-3">Visit Us</h5>
                        <p class="text-muted mb-3">Find our locations</p>
                        <a href="#contact-business"
                            class="btn btn-submit-pink blink text-white px-4 py-2 rounded fw-semibold">Main Office</a>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-8 brand-contact">
                        <div class="card rounded-4 shadow-lg p-4">
                            <h4 class="fw-bold mb-3 text-center">Contact Information</h4>
                            <div class="row text-start">
                                <div class="col-md-6 mb-3">
                                    <p class="mb-2"><i class="bi bi-geo-alt-fill text-danger me-2"></i><span
                                            class="fw-bold">Main Office:</span></p>
                                    <p class="ms-4 small">Ground Floor, Laxmi Tower, Kokar, Ranchi</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <p class="mb-2"><i class="bi bi-building text-danger me-2"></i><span
                                            class="fw-bold">Factory Address:</span></p>
                                    <p class="ms-4 small">Dahu, Ormanjhi, Ranchi</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <p class="mb-2"><i class="bi bi-telephone-fill text-danger me-2"></i><span
                                            class="fw-bold">Phone:</span></p><a href="tel:+91-90310-07352">
                                        <p class="ms-4 small">+91-90310-07352</p>
                                    </a>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <p class="mb-2"><i class="bi bi-envelope-fill text-danger me-2"></i><span
                                            class="fw-bold">Email:</span></p><a href="mailto:picnicicecreams@gmail.com">
                                        <p class="ms-4 small">picnicicecreams@gmail.com</p>
                                    </a>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <a href="{{ route('contact') }}"
                                    class="btn btn-submit-pink blink text-white px-5 py-3 rounded fw-semibold"><i
                                        class="bi bi-arrow-right-circle-fill me-2"></i>View Full Contact Page</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
