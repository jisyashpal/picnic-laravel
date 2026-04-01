@extends('layouts.app')

@section('title', 'Store Locator - Picnic Ice Creams')

@section('content')
<section class="py-5 px-3 px-md-5" style="background: url('{{ asset('public/assets/images/bg/color2.png') }}') no-repeat center center; background-size: cover;">
    <div class="container text-center">
        <h1 class="h1 fw-bold text-shadow-dark mb-4">
            <span class="text-success">Store </span>Locator
        </h1>
    </div>
</section>

<section class="locator py-4">
    <div class="container">
        <div class="row g-3 align-items-stretch">
            <div class="col-lg-8">
                <div class="map-wrapper h-100">
                    <div id="map" style="height: 100%; min-height: 400px; border-radius: 8px;"></div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="store-list h-100 overflow-auto">
                    @forelse($stores as $store)
                        <div class="store-sec p-3 mb-2">
                            <div class="row">
                                <div class="col-8">
                                    <h6>{{ $store->name }}</h6>
                                    <p><i class="fa-solid fa-location-dot"></i> {{ $store->address }}, {{ $store->city }}</p>
                                    @if($store->phone)
                                        <p><i class="fa-solid fa-phone"></i> {{ $store->phone }}</p>
                                    @endif
                                </div>
                                <div class="col-2 text-center">
                                    <button class="btn btn-sm btn-outline-success locate-btn"
                                            onclick="locateStore({{ $store->latitude ?? 23.354972 }}, {{ $store->longitude ?? 85.295169 }}, '{{ $store->name }}')"
                                            title="Locate on Map">
                                        <i class="fa-regular fa-circle"></i>
                                        <small>Open</small>
                                    </button>
                                </div>
                                <div class="col-2 text-center">
                                    <a href="{{ route('order') }}" target="_blank" class="btn btn-sm btn-outline-primary"
                                       title="View Menu">
                                        <i class="fa-solid fa-tv"></i>
                                        <small>Menu</small>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="store-sec p-3 mb-2">
                            <div class="text-center text-muted">
                                <p>No stores available at the moment.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>



@push('scripts')
<script>
let map;
let markers = [];

// Initialize map when page loads
function initMap() {
    // Default center (Ranchi coordinates)
    const defaultCenter = { lat: 23.354972, lng: 85.295169 };

    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: defaultCenter,
        styles: [
            {
                featureType: 'poi',
                stylers: [{ visibility: 'off' }]
            }
        ]
    });

    // Add markers for all stores
    @foreach($stores as $store)
        @if($store->latitude && $store->longitude)
            addMarker({ lat: {{ $store->latitude }}, lng: {{ $store->longitude }} }, '{{ $store->name }}', '{{ $store->address }}, {{ $store->city }}');
        @endif
    @endforeach

    // If no stores have coordinates, show default location
    if (markers.length === 0) {
        addMarker(defaultCenter, 'PICNIC Ice Creams', 'Ground Floor, Laxmi Tower, Kokar, Ranchi');
    }
}

function addMarker(position, title, address) {
    const marker = new google.maps.Marker({
        position: position,
        map: map,
        title: title,
        animation: google.maps.Animation.DROP
    });

    const infoWindow = new google.maps.InfoWindow({
        content: `
            <div style="max-width: 200px;">
                <h6 style="margin: 0 0 5px 0; color: #ff7096;">${title}</h6>
                <p style="margin: 0; font-size: 14px; color: #666;">${address}</p>
            </div>
        `
    });

    marker.addListener('click', () => {
        infoWindow.open(map, marker);
    });

    markers.push(marker);
}

function locateStore(lat, lng, storeName) {
    const location = { lat: lat, lng: lng };

    // Center map on the store
    map.setCenter(location);
    map.setZoom(15);

    // Find and animate the marker
    markers.forEach(marker => {
        if (marker.getTitle() === storeName) {
            marker.setAnimation(google.maps.Animation.BOUNCE);
            setTimeout(() => {
                marker.setAnimation(null);
            }, 2000);
        }
    });
}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.key') }}&callback=initMap"></script>
@endpush

@endsection
