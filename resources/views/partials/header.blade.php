<header class="py-2 px-3 px-md-4 z-custom shadow-sm sticky-top sticky-md-relative">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <a href="{{ route('home') }}">
                <img src="{{ asset('public/assets/images/picnic-removebg-preview.png') }}" alt="LOGO" class="logo img-fluid">
            </a>
            <div class="d-none d-md-flex align-items-center mx-auto"></div>

            <div class="d-none d-md-flex align-items-center mx-auto">
                <a href="{{ route('contact') }}" class="btn btn-submit-pink blink text-white px-3 px-md-4 py-2 rounded fw-semibold small">Contact us</a>
            </div>

            <div class="d-none d-md-flex align-items-center mx-auto">
                <a href="{{ route('order') }}" class="btn btn-submit-pink blink text-white px-3 px-md-4 py-2 rounded fw-semibold small">
                    <i class="bi bi-cart-fill me-1"></i> Order Now
                </a>
            </div>

            <div class="d-none d-md-flex align-items-center mx-auto">
                <a href="https://pureshmilk.com/"> <img class="logo ms-3 ms-md-4" src="{{ asset('public/assets/images/puresh-logo.png') }}" alt="Ice Cream"></a>
            </div>

            <div class="d-md-none d-flex align-items-center ms-auto">
                <button id="mobile-menu-button" class="btn-hamburger text-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#mobile-menu">
                    <svg width="32" height="32" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile-menu" class="collapse d-md-none position-absolute top-100 start-0 w-100 mobile-menu-bg shadow-lg mobile-nav">
        <div class="text-center pt-3">
            <a href="https://pureshmilk.com/">
                <img src="{{ asset('public/assets/images/puresh-logo.png') }}" alt="Logo" class="img-fluid" style="max-width:130px;">
            </a>
        </div>

        <nav class="d-flex flex-column align-items-center py-4" aria-label="Mobile navigation">
            <ul class="list-unstyled d-flex flex-column align-items-center gap-3 mb-0">
                <li><a href="{{ route('home') }}" class="nav-link-custom fs-5"><i class="bi bi-house-fill me-2"></i>Home</a></li>
                <li><a href="{{ route('about') }}" class="nav-link-custom fs-5">Brand Story</a></li>
                <li class="dropdown w-100 text-center">
                    <a class="nav-link-custom fs-5" data-bs-toggle="collapse" href="#flavourSub" role="button" aria-expanded="false" aria-controls="flavourSub">
                        Our Flavours<i class="bi bi-chevron-down ms-1"></i>
                    </a>
                    <ul id="flavourSub" class="collapse list-unstyled mt-2" data-bs-parent="#mobile-menu">
                        <li><a class="dropdown-item py-2" href="{{ route('flavours', ['category' => 'kulfi']) }}">Kulfi</a></li>
                        <li><a class="dropdown-item py-1" href="{{ route('flavours', ['category' => 'ice-creams']) }}">Ice Creams</a></li>
                        <li><a class="dropdown-item py-1" href="{{ route('flavours', ['category' => 'ice-candy']) }}">Ice Candy</a></li>
                        <li><a class="dropdown-item py-1" href="{{ route('flavours', ['category' => 'bulk-packer']) }}">Bulk packer</a></li>
                        <li><a class="dropdown-item py-1" href="{{ route('flavours', ['category' => 'new-launches']) }}">New Launches</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('store.locator') }}" class="nav-link-custom">Store locator</a></li>
                <li><a href="{{ route('media') }}" class="nav-link-custom fs-5">Media</a></li>
                <li class="dropdown w-100 text-center">
                    <a class="nav-link-custom fs-5" data-bs-toggle="collapse" href="#businessSub" role="button" aria-expanded="false" aria-controls="businessSub">
                        Business With Us<i class="bi bi-chevron-down ms-1"></i>
                    </a>
                    <ul id="businessSub" class="collapse list-unstyled mt-2" data-bs-parent="#mobile-menu">
                        <li><a class="dropdown-item py-2" href="{{ route('distributor') }}">Distributor</a></li>
                        <li><a class="dropdown-item py-2" href="{{ route('franchise') }}">Franchise</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('contact') }}" class="nav-link-custom fs-5">Contact Us</a></li>
                <li><a href="{{ route('order') }}" class="nav-link-custom fs-5"><i class="bi bi-cart-fill me-2"></i>Order Now</a></li>
            </ul>
        </nav>
    </div>
</header>

<div class="d-none d-md-flex container-fluid justify-content-center align-items-center header-nav-wrapper header-line sticky-top">
    <nav class="d-flex p-2 align-items-center flex-wrap gap-1 gap-md-3 gap-lg-4 gap-xl-5 px-3 px-md-2">
        <a href="{{ route('home') }}" class="nav-link-custom"><i class="bi bi-house-fill me-2"></i></a>
        <a href="{{ route('about') }}" class="nav-link-custom">Brand story</a>

        <div class="dropdown">
            <a href="#" class="nav-link-custom dropdown-toggle" id="flavoursDropdown" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                Our flavours <i class="bi bi-chevron-down ms-1"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="flavoursDropdown">
                <li><a class="dropdown-item py-2" href="{{ route('flavours', ['category' => 'kulfi']) }}">Kulfi</a></li>
                <li><a class="dropdown-item py-1" href="{{ route('flavours', ['category' => 'ice-creams']) }}">Ice Creams</a></li>
                <li><a class="dropdown-item py-1" href="{{ route('flavours', ['category' => 'ice-candy']) }}">Ice Candy</a></li>
                <li><a class="dropdown-item py-1" href="{{ route('flavours', ['category' => 'bulk-packer']) }}">Bulk packer</a></li>
                <li><a class="dropdown-item py-1" href="{{ route('flavours', ['category' => 'new-launches']) }}">New Launches</a></li>
            </ul>
        </div>

        <a href="{{ route('store.locator') }}" class="nav-link-custom">Store locator</a>
        <a href="{{ route('media') }}" class="nav-link-custom">Media</a>

        <div class="dropdown">
            <a href="#" class="nav-link-custom dropdown-toggle" id="businessDropdown" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                Business with us <i class="bi bi-chevron-down ms-1"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="businessDropdown">
                <li><a class="dropdown-item" href="{{ route('distributor') }}">Distributor</a></li>
                <li><a class="dropdown-item" href="{{ route('franchise') }}">Franchise</a></li>
            </ul>
        </div>

        <a href="{{ route('contact') }}" class="nav-link-custom">Contact us</a>
        <a href="{{ route('order') }}" class="nav-link-custom"><i class="bi bi-cart-fill me-1"></i>Order now</a>
    </nav>
</div>

<script>
    document.querySelectorAll('.dropdown').forEach(function(dd) {
        dd.addEventListener('shown.bs.dropdown', function() { this.classList.add('show'); });
        dd.addEventListener('hidden.bs.dropdown', function() { this.classList.remove('show'); });
    });

    (function() {
        const menuEl = document.getElementById('mobile-menu');
        const btnEl = document.getElementById('mobile-menu-button');
        if (!menuEl || !btnEl || typeof bootstrap === 'undefined') return;
        const menuCollapse = new bootstrap.Collapse(menuEl, { toggle: false });
        menuEl.querySelectorAll('a').forEach(a => {
            if (!a.matches('[data-bs-toggle="collapse"]')) {
                a.addEventListener('click', () => menuCollapse.hide());
            }
        });
        document.querySelectorAll('#mobile-menu [data-bs-toggle="collapse"]').forEach(toggle => {
            const target = document.querySelector(toggle.getAttribute('href'));
            if (target) {
                target.addEventListener('shown.bs.collapse', () => { toggle.setAttribute('aria-expanded', 'true'); });
                target.addEventListener('hidden.bs.collapse', () => { toggle.setAttribute('aria-expanded', 'false'); });
            }
        });
    })();
</script>
