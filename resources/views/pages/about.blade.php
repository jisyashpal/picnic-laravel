@extends('layouts.app')

@section('title', 'Contact Us - Picnic Ice Creams')
@section('meta_description', 'Contact PICNIC Ice Creams for enquiries and support.')

@section('content')
<div class="bg d-flex align-items-center justify-content-center p-4 brand-story ">
    <section class=" p-4 p-md-5 rounded-4 shadow-lg w-100 about-gradient-bg">
        <div class="row g-4 g-md-5 align-items-center ">
            <!-- Left Section -->
            <div class="col-md-6">
                <h1 class=" fw-bold mb-4 text-brown-custom text-shadow-white">About Picnic Ice Creams: Our Pledge to Purity</h1>
                <p class="mb-4 lh-lg text-justify">
                    <strong>Picnic Ice Cream</strong> is proud to be a brand extension of Puresh Daily. This connection means our commitment to quality starts right at the source: Because we are part of the Puresh Daily family, we have direct access to and control over the finest, purest Cow Milk, guaranteeing the integrity and quality of every single ingredient from farm to Kulfi.
                </p>
                <h2 class="fs-3 font-dancing text-brown-custom text-shadow-white">Our Uncompromising Quality:</h2>
                <p class="fs-3 text-danger  fw-semibold">Pure Milk, Pure Joy </p>
            </div>

            <!-- Right Section -->
            <div class="col-md-6">
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/oOoG0Uc51LQ?si=cZVWiZafgE-xUaTm" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>
</div>


<section class="py-5 bg">
    <div class="container px-3 px-md-4 text-center timeline-container">
        <!-- <h2 class="display-5 fw-bold text-danger mb-5 text-shadow-white">The Future of Picnic</h2> -->
        <p class="fw-bold">In a market full of frozen desserts made with refined oil, we stand firm on our commitment to Real Ice Cream-the kind made with the health and happiness of every Indian family in mind.</p>
        <div class="timeline">
            <!-- Timeline Item 1 -->
            <div class="timeline-item left">
                <div class="timeline-content bg-white rounded-4 shadow-lg p-4 timeline-content-custom">
                    <img src="{{ asset('public/assets/images/ice-creem/6.png') }}" alt="Strawberry Bliss" class="mx-auto mb-3 timeline-item-img">
                    <h3 class="fs-4 fw-semibold text-pink mb-2">100% Pure Cow Milk, Guaranteed by Puresh Daily </h3>
                    <p class="text-secondary small">We use only the finest, 100% pure Cow Milk as the rich foundation for all our Kulfis. This isn't just about taste-it's about tradition and health, validated by our dairy roots.</p>
                    <ul>
                        <li> <b>Richer Taste, Naturally:</b> Pure milk fat delivers the dense, creamy, and traditional flavour that defines a perfect Kulfi.</li>
                        <li> <b>Essential Goodness: </b> We prioritise the natural nutrients and quality that pure dairy provides, ensuring you get a wholesome dessert.</li>
                    </ul>
                </div>
            </div>

            <!-- Timeline Item 2 -->
            <div class="timeline-item right">
                <div class="timeline-content bg-white rounded-4 shadow-lg p-4 timeline-content-custom">
                    <img src="{{ asset('public/assets/images/ice-creem/5.png') }}" alt="Mint Magic" class="mx-auto mb-3 timeline-item-img">
                    <h3 class="fs-4 fw-semibold text-success mb-2">Zero Palm Oil. Zero Compromise on Health</h3>
                    <p class="text-secondary small">We respect the authentic tradition of Indian sweets and believe shortcuts compromise both taste and health. Our pledge is simple: only pure dairy richness, nothing less. "We are providing the best ice cream for our Indians, crafted to help keep your health healthier."</p>
                </div>
            </div>

            <!-- Timeline Item 3 -->
            <div class="timeline-item left">
                <div class="timeline-content bg-white rounded-4 shadow-lg p-4 timeline-content-custom">
                    <img src="{{ asset('public/assets/images/ice-creem/3.png') }}" alt="Blueberry Dream" class="mx-auto mb-3 timeline-item-img">
                    <h3 class="fs-4 fw-semibold text-primary mb-2">Our Journey Starts with Tradition:</h3>
                    <p class="text-secondary small">Authentic Kulfi Our journey begins by mastering the authentic art of Kulfi making. We honour this beloved Indian tradition by slow-simmering our pure cow milk with natural, hand-picked ingredients to achieve that signature dense texture and deep, satisfying flavour. Real dry fruits, natural colour,healthier fruit pulp.Every kulfi is a nostalgic reminder of simpler times, perfected for your enjoyment today. </p>
                </div>
            </div>

            <!-- Timeline Item 4 -->
            <div class="timeline-item right">
                <div class="timeline-content bg-white rounded-4 shadow-lg p-4 timeline-content-custom">
                    <img src="{{ asset('public/assets/images/ice-creem/6.png') }}" alt="Mint Magic" class="mx-auto mb-3 timeline-item-img">
                    <h3 class="fs-4 fw-semibold text-success mb-2">Affordable Price </h3>
                    <p class="text-secondary small">Our pack size 30ml to 50ml is suitable for kids and rates are half than that of competition.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Future Vision Section -->
<section class="bg py-5 px-3 px-md-5 bg picnic-future">
    <div class="container text-center">
        <h2 class="display-5 fw-bold text-danger mb-5 text-shadow-white">
            The Future of <span class="text-success">Picnic</span>
        </h2>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card brand-story-card rounded-4 shadow-lg p-4 p-md-5">
                    <div class="text-start">
                        <blockquote class="blockquote">
                            <p class="mb-4 fs-6 lh-lg">
                                While our heart is currently dedicated to perfecting our Kulfi line, our vision is to bring this same standard of purity and quality to all the treats we create.
                            </p>

                            <p class="mb-4 fs-6 lh-lg">
                                As we grow, we promise to extend our commitment to Pure Milk and No refined Oil to every future product we introduce-whether it's a new stick, a candy, or a classic scoop.
                            </p>
                        </blockquote>

                        <!-- Promise Section -->
                        <div class="bg-primary bg-gradient rounded-4 p-4 my-4 text-center text-white">
                            <h3 class="h4 fw-bold mb-3">Picnic Ice Creams: A Puresh Daily Promise</h3>
                            <div class="row g-3 justify-content-center">
                                <div class="col-md-4">
                                    <div class="fs-5 fw-bold">Pure Milk</div>
                                </div>
                                <div class="col-md-4">
                                    <div class="fs-5 fw-bold">No Palm Oil</div>
                                </div>
                                <div class="col-md-4">
                                    <div class="fs-5 fw-bold">Real Goodness</div>
                                </div>
                            </div>
                            <p class="mt-3 fs-5 fw-semibold">For Our India</p>
                        </div>

                        <!-- New Products Section -->
                        <div class="alert alert-success rounded-4 p-4" role="alert">
                            <h4 class="alert-heading h4 fw-bold text-success">
                                <i class="bi bi-stars me-2"></i>Coming Soon!
                            </h4>
                            <p class="mb-3 fs-6">
                                We will launch all range of ice creams very soon, they shall be fruit based, healthier option and benchmark with global best ice cream but at affordable prices.
                            </p>
                            <hr>
                            <div class="d-flex justify-content-around flex-wrap gap-2">
                                <span class="badge bg-success fs-6 px-3 py-2">🍓 Fruit Based</span>
                                <span class="badge bg-success fs-6 px-3 py-2">💚 Healthier</span>
                                <span class="badge bg-success fs-6 px-3 py-2">🌍 Global Standard</span>
                                <span class="badge bg-success fs-6 px-3 py-2">💰 Affordable</span>
                            </div>
                        </div>

                        <!-- Mission Statement -->
                        <div class="text-center mt-4">
                            <div class="card border-0 bg-light rounded-4 p-3">
                                <p class="mb-0 fs-6 fw-semibold text-muted">
                                    <i class="bi bi-heart-fill text-danger me-2"></i>
                                    Maintaining the highest standards while expanding horizons
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="  bg py-5 px-3 px-md-5">
    <div class="container text-center">
        <h2 class="h1 fw-bold text-shadow-dark mb-4">
            <span class="text-success">Get In Touch</span>
        </h2>
        <p class="fs-6 mb-5">Got questions? We'd love to hear from you!</p>

        <div class="row g-4 justify-content-center">
            <div class="col-md-4 mb-4">
                <div class="card rounded-4 shadow-lg p-4 h-100">
                    <div class="text-center">
                        <i class="bi bi-telephone-fill text-danger fs-1 mb-3"></i>
                        <h5 class="fw-bold mb-3">Phone</h5>
                        <p class="text-muted mb-3">Call us directly</p>
                        <a href="tel:+919031007352" class="btn btn-submit-pink blink text-white px-4 py-2 rounded fw-semibold">
                            +91-90310-07352
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card rounded-4 shadow-lg p-4 h-100">
                    <div class="text-center">
                        <i class="bi bi-envelope-fill text-danger fs-1 mb-3"></i>
                        <h5 class="fw-bold mb-3">Email</h5>
                        <p class="text-muted mb-3">Send us a message</p>
                        <a href="mailto:picnicicecreams@gmail.com" class="btn btn-submit-pink blink text-white px-4 py-2 rounded fw-semibold">
                            Email Us
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card rounded-4 shadow-lg p-4 h-100">
                    <div class="text-center">
                        <i class="bi bi-geo-alt-fill text-danger fs-1 mb-3"></i>
                        <h5 class="fw-bold mb-3">Visit Us</h5>
                        <p class="text-muted mb-3">Find our locations</p>
                        <a href="#map-section" class="btn btn-submit-pink blink text-white px-4 py-2 rounded fw-semibold">
                            Main Office
                        </a>
                    </div>
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
                                <p class="mb-2">
                                    <i class="bi bi-geo-alt-fill text-danger me-2"></i>
                                    <span class="fw-bold">Main Office:</span>
                                </p>
                                <p class="ms-4 small">Ground Floor, Laxmi Tower, Kokar, Ranchi</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <p class="mb-2">
                                    <i class="bi bi-building text-danger me-2"></i>
                                    <span class="fw-bold">Factory Address:</span>
                                </p>
                                <p class="ms-4 small">Dahu, Ormanjhi, Ranchi</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <p class="mb-2">
                                    <i class="bi bi-telephone-fill text-danger me-2"></i>
                                    <span class="fw-bold">Phone:</span>
                                </p>
                                <a href="tel:+91-90310-07352">
                                    <p class="ms-4 small">+91-90310-07352</p>
                                </a>
                            </div>
                            <div class="col-md-6 mb-3">
                                <p class="mb-2">
                                    <i class="bi bi-envelope-fill text-danger me-2"></i>
                                    <span class="fw-bold">Email:</span>
                                </p>
                                <a href="mailto:picnicicecreams@gmail.com">
                                    <p class="ms-4 small">picnicicecreams@gmail.com</p>
                                </a>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <a href="contact" class="btn btn-submit-pink blink text-white px-5 py-3 rounded fw-semibold">
                                <i class="bi bi-arrow-right-circle-fill me-2"></i>View Full Contact Page
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .btn-submit-pink {
        background: linear-gradient(45deg, #ec4899, #f97316);
        border: none;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .btn-submit-pink:hover {
        background: linear-gradient(45deg, #db2777, #ea580c);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(236, 72, 153, 0.4);
    }
</style>
@endsection
