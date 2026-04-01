@extends('layouts.app')

@section('title', 'Order Now - PICNIC Ice Cream')

@section('content')
    <div class=" bg order-section py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center pb-4">
                        <img src="{{ asset('public/assets/images/picnic-removebg-preview.png') }}" alt="Picnic Logo" class="logo">
                    </div>
                </div>
                <div class="col-md-12">
                     <div class="row justify-content-center">
                    <div class="col-md-3 py-2">
                        <a href="https://www.swiggy.com/" target="_blank" class="text-decoration-none">
                            <img src="{{ asset('public/assets/images/company/swiggy.png') }}" alt="Swiggy"
                                class="img-fluid rounded-3 shadow-sm">
                        </a>
                        <a href="https://www.swiggy.com/" target="_blank"
                            class="btn btn-submit-pink text-white mt-2 px-3 px-md-4 py-2 rounded fw-semibold small d-block">
                            Order Now
                        </a>
                    </div>
                    <div class="col-md-3 py-2">
                        <a href="https://www.zomato.com/" target="_blank" class="text-decoration-none">
                            <img src="{{ asset('public/assets/images/company/zomato.png') }}" alt="Zomato"
                                class="img-fluid rounded-3 shadow-sm">
                        </a>
                        <a href="https://www.zomato.com/" target="_blank"
                            class="btn btn-submit-pink text-white mt-2 px-3 px-md-4 py-2 rounded fw-semibold small d-block">
                            Order Now
                        </a>
                    </div>
                    <div class="col-md-3 py-2">
                        <a href="https://blinkit.com/" target="_blank" class="text-decoration-none">
                            <img src="{{ asset('public/assets/images/company/blinkit.png') }}" alt="Blinkit"
                                class="img-fluid rounded-3 shadow-sm">
                        </a>
                        <a href="https://blinkit.com/" target="_blank"
                            class="btn btn-submit-pink text-white mt-2 px-3 px-md-4 py-2 rounded fw-semibold small d-block">
                            Order Now
                        </a>
                    </div>
                    <div class="col-md-3 py-2">
                        <a href="https://apnamart.in/" target="_blank" class="text-decoration-none">
                            <img src="{{ asset('public/assets/images/company/apnamart.png') }}" alt="ApnaMart"
                                class="img-fluid rounded-3 shadow-sm">
                        </a>
                        <a href="https://apnamart.in/" target="_blank"
                            class="btn btn-submit-pink text-white mt-2 px-3 px-md-4 py-2 rounded fw-semibold small d-block">
                            Order Now
                        </a>
                    </div>
                </div>
                </div>

            </div>
        </div>
    </div>
@endsection
