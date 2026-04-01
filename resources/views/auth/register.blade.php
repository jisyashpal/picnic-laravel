@extends('layouts.app')

@section('title', 'Register')

@push('styles')
<style>
    .auth-hero {
        background: radial-gradient(circle at 20% 20%, #e7f3ff, #fff2e7 40%, #ffffff 70%);
        min-height: calc(100vh - 120px);
    }
    .auth-card {
        border: none;
        border-radius: 18px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.1);
        overflow: hidden;
    }
    .auth-illustration {
        background: linear-gradient(140deg, #7cc2ff 0%, #ffb48a 100%);
    }
    .auth-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 6px 12px;
        border-radius: 999px;
        background: rgba(255,255,255,0.25);
        color: #fff;
        font-weight: 600;
        letter-spacing: 0.02em;
        font-size: 12px;
    }
</style>
@endpush

@section('content')
<section class="auth-hero d-flex align-items-center py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-9">
                <div class="card auth-card">
                    <div class="row g-0">
                        <div class="col-md-5 auth-illustration text-white p-4 d-flex flex-column justify-content-between">
                            <div>
                                <div class="auth-badge mb-3"><i class="bi bi-person-plus"></i> Create Account</div>
                                <h3 class="fw-bold">Join PICNIC team</h3>
                                <p class="mb-4">Register to manage website content, sliders, products, and more.</p>
                            </div>
                            <div class="text-center">
                                <img src="{{ asset('public/assets/images/ice-creem/5.png') }}" alt="PICNIC" class="img-fluid" style="max-height: 180px;">
                            </div>
                        </div>
                        <div class="col-md-7 p-4 p-md-5 bg-white">
                            <h4 class="fw-bold mb-1">Create your account</h4>
                            <p class="text-muted mb-4">Use a work email you can access</p>

                            <form method="POST" action="{{ route('register') }}" novalidate>
                                @csrf

                                <div class="mb-3">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" class="form-control @error('name') is-invalid @enderror">
                                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" class="form-control @error('email') is-invalid @enderror">
                                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input id="password" type="password" name="password" required autocomplete="new-password" class="form-control @error('password') is-invalid @enderror">
                                    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="form-control @error('password_confirmation') is-invalid @enderror">
                                    @error('password_confirmation')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="text-muted small">Already registered?</span>
                                    <a class="small text-decoration-none" href="{{ route('login') }}">Log in instead</a>
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary btn-lg">Create account</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
