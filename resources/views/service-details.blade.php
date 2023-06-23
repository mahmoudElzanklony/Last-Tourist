@extends('layouts.app')

@section('content')
    <div class="service-details-page">
        <div class="services-hero d-flex align-items-end">
            <div class="links position-absolute mb-3">
                <h3 class="ps-5">{{ $service->name }}</h3>
                <ul class="ps-5 d-flex align-items-center">
                    <li class="nav-link">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <i class="fa-solid fa-angle-right"></i>
                    <li class="nav-link">
                        <a href="{{ route('all.services.show') }}">Services</a>
                    </li>
                    <i class="fa-solid fa-angle-right"></i>
                    <li class="nav-link active">
                        <a href="">Service Details</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="service-details-content py-5">
                <div class="service-info d-flex flex-column justify-content-between flex-lg-row mb-5">

                    <div class="d-flex align-items-center py-2 px-3 bg-light rounded-1">
                        <i class="fa-regular fa-calendar-days me-2"></i>
                        <span>Created at: {{ $service->created_at->format('d F Y') }}</span>
                    </div>
                    <div class="d-flex align-items-center py-2 px-3 bg-light rounded-1">
                        <i class="fa-solid fa-star me-2"></i>
                        @if ($service->customerReviews->isNotEmpty())
                            @php
                                $totalRatings = $service->customerReviews->sum('rating');
                                $averageRating = $totalRatings / $service->customerReviews->count();
                            @endphp

                            <span> {{ $averageRating }} </span>
                        @else
                            <span> 0 </span>
                        @endif


                    </div>
                    <div class="d-flex align-items-center py-2 px-3 bg-light rounded-1">
                        <i class="fa-solid fa-user me-2"></i>
                        <span> {{ $service->orders->count() }}</span>
                    </div>

                    <div class="d-flex align-items-center  py-2 px-3 bg-light rounded-1">
                        <i class="fa-solid fa-money-check-dollar me-2"></i>
                        <span class="text-muted fw-bold">${{ $service->price }}</span>
                        {{-- <span class="price-before text-muted ms-2">${{ $service->price }}</span> --}}
                        {{-- <span class="bg-danger px-1 rounded-1 ms-2 text-white  fs-14 ">Save 30%</span> --}}
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-md-6">
                        <img class="img-fluid rounded-2 shadow main-show"
                            src="{{ asset('images/services/' . $service->image->first()->path) }}" alt="">
                        <div class="service-imgs mt-2 overflow-scroll d-flex">
                            @foreach ($service->image as $image)
                                <img class="img-fluid rounded-2 shadow" src="{{ asset("images/services/$image->path") }}">
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6 d-flex flex-column justify-content-between">
                        <div class="service-details-box">
                            <div class="bg-light">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page">Details</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="service-details-text px-2 py-4">
                                <h3>{{ $service->name }}</h3>
                                <p class="service-desc">{{ $service->description }}
                                </p>
                                <span class="text-main fw-bold see-more" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">See
                                    More</span>
                                <!-- Button trigger modal -->


                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">

                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content px-3">
                                            {{-- <div class="container"> --}}

                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel">
                                                    {{ $service->name }}
                                                </h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body pt-3 text-center">
                                                <img
                                                    class="img-fluid"src="{{ asset('images/services/' . $service->image->first()->path) }}">
                                                <p class="pt-3">{{ $service->description }}
                                                </p>
                                                <div class="modal-footer justify-content-center">
                                                    <div class="book-now btn info-btn rounded-0">
                                                        <a class="d-flex align-items-center justify-content-center"
                                                            href="{{ route('payment.show', ['id' => $service->id]) }}">
                                                            Book Now
                                                            <span class="material-symbols-outlined">
                                                                chevron_right
                                                            </span>
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="book-now btn info-btn rounded-0">
                            <a class="d-flex align-items-center justify-content-center"
                                href="{{ route('payment.show', ['id' => $service->id]) }}">
                                Book Now
                                <span class="material-symbols-outlined">
                                    chevron_right
                                </span>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="customer-reviews">
                <h4>Customer reviews</h4>
                <div class="reviews mt-5">
                    @foreach ($reviews as $review)
                        <div class="review border p-3 rounded">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="user-info d-flex align-items-center">
                                    <i class="fa-solid fs-2 fa-circle-user me-2"></i>
                                    <h6 class="mb-0 fw-bold"> {{ $review->customer_name ?? $review->user->name }}
                                    </h6>
                                </div>
                                <div class="time">
                                    <span class="fs-14 text-muted">{{ $review->created_at->format('d F Y') }} </span>
                                </div>
                            </div>
                            <hr>

                            <div class="review-text mt-2">
                                <div class="rate my-2">
                                    <input type="hidden" value="{{ $review->rating }}" class="rating-input">
                                    <i class="fa-solid fa-star "></i>
                                    <i class="fa-solid fa-star "></i>
                                    <i class="fa-solid fa-star "></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <span>
                                    {{ $review->content }}
                                </span>

                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="review border p-3 rounded">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="user-info d-flex align-items-center">
                                <i class="fa-solid fs-2 fa-circle-user me-2"></i>
                                <h6 class="mb-0 fw-bold">User Name</h6>
                            </div>
                            <div class="time">
                                <span class="fs-14 text-muted">24 April 2023</span>
                            </div>
                        </div>
                        <hr>

                        <div class="review-text mt-2">
                            <div class="rate my-2">
                                <i class="fa-solid fa-star active-rate"></i>
                                <i class="fa-solid fa-star active-rate"></i>
                                <i class="fa-solid fa-star active-rate"></i>
                                <i class="fa-solid fa-star active-rate"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex quas quaerat voluptate, saepe
                                fugit culpa perferendis. Esse molestiae, minus, explicabo, adipisci maxime repellat
                                perspiciatis deserunt nulla eius doloribus ad distinctio!
                            </span>

                        </div>
                    </div> --}}
                    {{-- <div class="review mt-3 border p-3 rounded">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="user-info d-flex align-items-center">
                                <i class="fa-solid fs-2 fa-circle-user me-2"></i>
                                <h6 class="mb-0 fw-bold">User Name</h6>
                            </div>
                            <div class="time">
                                <span class="fs-14 text-muted">24 April 2023</span>
                            </div>
                        </div>
                        <hr>
                        <div class="review-text mt-2">
                            <div class="rate my-2">
                                <i class="fa-solid fa-star active-rate"></i>
                                <i class="fa-solid fa-star active-rate"></i>
                                <i class="fa-solid fa-star active-rate"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex quas quaerat voluptate, saepe
                                fugit culpa perferendis. Esse molestiae, minus, explicabo, adipisci maxime repellat
                                perspiciatis deserunt nulla eius doloribus ad distinctio!
                            </span>

                        </div>
                    </div> --}}
                </div>
                <div class="add-review btn info-btn rounded-0 mt-3">
                    <a class="d-flex align-items-center justify-content-center" data-bs-toggle="modal"
                        data-bs-target="#comment">
                        Write a rewive
                        <span class="material-symbols-outlined">
                            chevron_right
                        </span> </a>

                </div>

                <div class="modal fade" id="comment" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">Review</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body pt-3">
                                <form id="reviewForm" action="{{ route('customer-reviews.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="service_id" value="{{ $service->id }}">
                                    <div class="add-rate my-2">
                                        <input type="hidden" name="rating" id="rating">
                                        <i class="fa-solid fa-star my-star" data-star="1"></i>
                                        <i class="fa-solid fa-star my-star" data-star="2"></i>
                                        <i class="fa-solid fa-star my-star" data-star="3"></i>
                                        <i class="fa-solid fa-star my-star" data-star="4"></i>
                                        <i class="fa-solid fa-star my-star" data-star="5"></i>
                                        <!-- Your star rating implementation -->
                                    </div>
                                    @guest
                                    @else
                                        <div class="mt-3">
                                            <div class="form-group">
                                                <input type="text" name="customer_name" id="username"
                                                    class="form-control" placeholder="Enter your username">
                                            </div>
                                        </div>
                                    @endguest

                                    <div class="mt-3">
                                        <textarea class="form-control" name="content" rows="3" placeholder="Describe your experience (optional)"></textarea>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button type="submit" class="book-now btn info-btn rounded-0">
                                            <span class="d-flex align-items-center justify-content-center">Post
                                                <span class="material-symbols-outlined">chevron_right</span>
                                            </span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="modal fade" id="comment" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">
                                    Review
                                </h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body pt-3">
                                <div class="add-rate my-2">
                                    <i class="fa-solid fa-star my-star" data-star='1'></i>
                                    <i class="fa-solid fa-star my-star" data-star='2'></i>
                                    <i class="fa-solid fa-star my-star" data-star='3'></i>
                                    <i class="fa-solid fa-star my-star" data-star='4'></i>
                                    <i class="fa-solid fa-star my-star" data-star='5'></i>

                                </div>
                                <div class="mt-3">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                        placeholder="Describe your experience (optional)"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <div class="book-now btn info-btn rounded-0">
                                    <a class="d-flex align-items-center justify-content-center" href="">
                                        Post
                                        <span class="material-symbols-outlined">
                                            chevron_right
                                        </span>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <hr>
            <div class="related mb-5">
                <h4>Related Services</h4>
                <div class="all-related  mt-5">
                    <div class="row gy-5 justify-content-center">
                        @foreach ($services_related as $service)
                            <div class="col-xl-4 col-md-6">
                                {{-- <a href="{{ url('/service-details') }}"> --}}
                                <div class="card px-5 py-4 text-center border-0 shadow">
                                    <div class="service-price shadow rounded-start">$ {{ $service->price }}</div>
                                    <h5> {{ $service->name }}</h5>
                                    <p class="mt-3 mb-4">
                                        {{ $service->description }}
                                    </p>
                                    @if (!empty($service->image->first()->path))
                                        <img class="img-fluid shadow rounded"
                                            src="{{ asset('images/services/' . $service->image->first()->path) }}"
                                            alt="">
                                    @else
                                        <img class="img-fluid shadow rounded"
                                            src="{{ asset('images/services/default.png') }}" alt="">
                                    @endif
                                    <hr>
                                    <div
                                        class="more-info d-flex flex-column flex-lg-row align-items-center justify-content-lg-between">
                                        <div class="d-flex align-items-center">
                                            <span class="material-symbols-outlined text-muted time">
                                                schedule
                                            </span>
                                            <span
                                                class="ms-1 text-muted">{{ $service->created_at->diffForHumans() }}</span>
                                        </div>
                                        <a href="{{ route('service.details.show', ['id' => $service->id]) }}"
                                            class="btn info-btn mt-2 mt-lg-0">
                                            <div class="d-flex justify-content-between align-items-center">
                                                Request info
                                                <span class="material-symbols-outlined">
                                                    chevron_right
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                {{-- </a> --}}
                            </div>
                        @endforeach

                        {{-- <div class="col-xl-4 col-md-6">
                            <a href="{{ url('/service-details') }}">
                                <div class="card px-5 py-4 text-center border-0 shadow">
                                    <div class="service-price shadow rounded-start">$300</div>
                                    <h5><span class="text-main">NILE</span> CRUISES</h5>
                                    <p class="mt-3 mb-4">
                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                        Hic minus dolorem quo dignissimos. Animi asperiores
                                        corporis accusamus, placeat expedita eligendi,
                                        fugiat dolorem tempora, quasi officia minus architecto
                                        reprehenderit porro omnis.
                                    </p>
                                    <img class="img-fluid shadow rounded" src="{{ asset('/imgs/nile.jpeg') }}"
                                        alt="">
                                    <hr>
                                    <div
                                        class="more-info d-flex flex-column flex-lg-row align-items-center justify-content-lg-between">
                                        <div class="d-flex align-items-center">
                                            <span class="material-symbols-outlined text-muted time">
                                                schedule
                                            </span>
                                            <span class="ms-1 text-muted">3 Hours</span>
                                        </div>
                                        <a href="" class="btn info-btn mt-2 mt-lg-0">
                                            <div class="d-flex justify-content-between align-items-center">
                                                Request info
                                                <span class="material-symbols-outlined">
                                                    chevron_right
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <a href="{{ url('/service-details') }}">
                                <div class="card px-5 py-4 text-center border-0 shadow">
                                    <div class="service-price shadow rounded-start">$200</div>
                                    <h5><span class="text-main">EXCURSIONS</span> & TOURS</h5>
                                    <p class="mt-3 mb-4">
                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                        Hic minus dolorem quo dignissimos. Animi asperiores
                                        corporis accusamus, placeat expedita eligendi,
                                        fugiat dolorem tempora, quasi officia minus architecto
                                        reprehenderit porro omnis.
                                    </p>
                                    <img class="img-fluid shadow rounded" src="{{ asset('/imgs/tour.jpeg') }}"
                                        alt="">
                                    <hr>
                                    <div
                                        class="more-info d-flex flex-column flex-lg-row align-items-center justify-content-lg-between">
                                        <div class="d-flex align-items-center">
                                            <span class="material-symbols-outlined text-muted time">
                                                schedule
                                            </span>
                                            <span class="ms-1 text-muted">3 Hours</span>
                                        </div>
                                        <a href="" class="btn info-btn mt-2 mt-lg-0">
                                            <div class="d-flex justify-content-between align-items-center">
                                                Request info
                                                <span class="material-symbols-outlined">
                                                    chevron_right
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </a>
                        </div> --}}

                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.my-star').click(function() {
                var ratingValue = $(this).data('star');
                $('#rating').val(ratingValue);
            });
        });
        $(document).ready(function() {
            $('#reviewForm').submit(function(event) {
                event.preventDefault();

                var form = $(this);
                var url = form.attr('action');
                var formData = form.serialize();

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: formData,
                    success: function(response) {
                        $('#comment').modal('hide');
                        $(".customer-reviews").load(location.href + " .customer-reviews");
                        console.log(response);
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        console.error(errorThrown);
                    }
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const rateElements = document.querySelectorAll('.rate');

            rateElements.forEach(function(rate) {
                const ratingInput = rate.querySelector('.rating-input');
                const ratingValue = ratingInput.value;

                const starElements = rate.querySelectorAll('.fa-star');

                starElements.forEach(function(star, index) {
                    if (index < ratingValue) {
                        star.classList.add('active-rate');
                    }
                });
            });
        });
    </script>
@endsection
