@extends('layouts.app')

@section('title', 'Contact Us - Picnic Ice Creams')
@section('meta_description', 'Contact PICNIC Ice Creams for enquiries and support.')

@section('content')
<section class="py-5 px-3 px-md-5" style="background: url('{{ asset('public/assets/images/bg/color2.png') }}') no-repeat center center; background-size: cover;">
    <div class="container text-center">
        <h1 class="h1 fw-bold text-shadow-dark mb-4">
            <span class="text-success">Contact</span> Us
        </h1>
        <p class="fs-6 mb-5 contact-tagline">Let's connect and make some sweet memories together!</p>
    </div>
</section>

<section class="bg py-5 px-3 px-md-5">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="row g-4 g-md-5 align-items-start">
            <div class="col-md-6">
                <div class="card rounded-4 shadow-lg p-4 mb-4">
                    <h2 class="display-6 fw-bold mb-4 text-shadow-grey">
                        Get In <span class="text-danger">Touch</span>
                    </h2>
                    <div class="text-start">
                        <div class="mb-4">
                            <p class="fs-5 mb-1"><i class="bi bi-geo-alt-fill text-danger me-2"></i><span class="fw-bold">Main Office:</span></p>
                            <p class="fs-6 ms-4">Ground Floor, Laxmi Tower, Kokar, Ranchi</p>
                        </div>
                        <div class="mb-4">
                            <p class="fs-5 mb-1"><i class="bi bi-building text-danger me-2"></i><span class="fw-bold">Factory Address:</span></p>
                            <p class="fs-6 ms-4">Dahu, Ormanjhi, Ranchi</p>
                        </div>
                        <div class="mb-4">
                            <p class="fs-5 mb-1"><i class="bi bi-telephone-fill text-danger me-2"></i><span class="fw-bold">Phone:</span></p>
                            <p class="fs-6 ms-4"><a href="tel:+91-90310-07352" class="text-decoration-none text-dark">+91-90310-07352</a></p>
                        </div>
                        <div class="mb-4">
                            <p class="fs-5 mb-1"><i class="bi bi-envelope-fill text-danger me-2"></i><span class="fw-bold">Email:</span></p>
                            <p class="fs-6 ms-4"><a href="mailto:picnicicecreams@gmail.com" class="text-decoration-none text-dark">picnicicecreams@gmail.com</a></p>
                        </div>
                        <div class="mt-5">
                            <h4 class="fw-bold fs-5 mb-3">Quick Contact</h4>
                            <div class="d-flex flex-column gap-3">
                                <a href="tel:+919031007352" class="btn btn-submit-pink blink text-white px-4 py-2 rounded fw-semibold"><i class="bi bi-telephone-fill me-2"></i>Contact us</a>
                                <a href="https://wa.me/919031007352" target="_blank" class="btn btn-submit-pink blink text-white px-4 py-2 rounded fw-semibold"><i class="bi bi-whatsapp me-2"></i>Whatsapp</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card rounded-4 shadow-lg p-4 mb-4">
                    <h3 class="fw-bold fs-4 mb-3 text-uppercase text-center">Send us a Message</h3>
                    <form method="POST" action="{{ route('contact.store') }}" class="contact-form">
                        @csrf
                        <div class="mb-3">
                            <label for="contact-name" class="form-label fw-semibold">Full Name</label>
                            <input type="text" name="name" id="contact-name" class="form-control border-2" required>
                        </div>
                        <div class="mb-3">
                            <label for="contact-email" class="form-label fw-semibold">Email Address</label>
                            <input type="email" name="email" id="contact-email" class="form-control border-2">
                        </div>
                        <div class="mb-3">
                            <label for="contact-phone" class="form-label fw-semibold">Phone Number</label>
                            <input type="tel" name="phone" id="contact-phone" class="form-control border-2">
                        </div>
                        <div class="mb-3">
                            <label for="contact-subject" class="form-label fw-semibold">Subject</label>
                            <select name="subject" id="contact-subject" class="form-control border-2">
                                <option value="">Select a subject</option>
                                <option value="general">General Inquiry</option>
                                <option value="distributor">Become a Distributor</option>
                                <option value="franchise">Franchise Inquiry</option>
                                <option value="feedback">Feedback</option>
                                <option value="support">Support</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="contact-location" class="form-label fw-semibold">Your Location</label>
                            <input type="text" name="location" id="contact-location" class="form-control border-2" placeholder="City, State">
                        </div>
                        <div class="mb-4">
                            <label for="contact-message" class="form-label fw-semibold">Message</label>
                            <textarea name="message" id="contact-message" rows="4" class="form-control border-2" placeholder="Tell us how we can help you..."></textarea>
                        </div>
                        <button type="submit" class="w-100 btn-submit-pink btn text-white py-3 rounded fw-semibold"><i class="bi bi-send-fill me-2"></i>Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
