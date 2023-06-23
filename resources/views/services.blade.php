@extends('layouts.app')

@section('content')
    <div class="services-page">
        <div class="services-hero d-flex align-items-end">
            <div class="links position-absolute mb-3">
                <h3 class="ps-5">Tourism Services</h3>
                <ul class="ps-5 d-flex align-items-center">
                    <li class="nav-link">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <i class="fa-solid fa-angle-right"></i>
                    <li class="nav-link active">
                        <a href="">Services</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="services-nav pt-2 d-flex justify-content-center align-items-end">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page">All</a>
                </li>
                @foreach ($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-category-id="{{ $category->id }}">{{ $category->name }}</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="">{{ $category->name }}</a>
                    </li> --}}
                @endforeach
                {{-- <li class="nav-item">
                    <a class="nav-link" aria-current="page">Service1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Service2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Service3</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Service4</a>
                </li> --}}
            </ul>
        </div>
        <div class="container">
            <div class="search mt-5 d-flex align-items-center bg-white  border rounded-1">
                <input class="form-control border-0" type="text" placeholder="Search For Services">
                <i class="fa-solid fa-magnifying-glass me-3 text-main"></i>
            </div>
            <div class="row g-4 pt-4 pb-5">

                <div class="col-lg-3">
                    <div class="filter mt-3 bg-light h-100 p-3">
                        <div class="show-filter">
                            <h6 class="text-main">Show Services</h6>
                            <div class="mt-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        From newest to oldest
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        From oldest to newest
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        From cheapest to expensive
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        From expensive to cheapest
                                    </label>
                                </div>
                            </div>


                        </div>
                        <div class="price-filter mt-4">
                            <h6 class="text-main">Price</h6>
                            <div class="input-group input-group-sm my-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">From</span>
                                <input type="text" class="form-control" aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-sm">
                            </div>
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">To</span>
                                <input type="text" class="form-control" aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-sm">
                            </div>
                        </div>
                        <div class="rate-filter mt-4">
                            <h6 class="text-main">Rates</h6>
                            <div class="d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="">
                                <div class="ms-2">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mt-2">
                                <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="">
                                <div class="ms-2">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mt-2">
                                <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="">
                                <div class="ms-2">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mt-2">
                                <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="">
                                <div class="ms-2">

                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>

                                </div>
                            </div>
                            <div class="d-flex align-items-center mt-2">
                                <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="">
                                <div class="ms-2">
                                    <i class="fa-solid fa-star"></i>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--############ Filter sidebar ############## -->
                    <button class="offcanvas-btn d-none btn main-btn align-items-center" type="button"
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling"
                        aria-controls="offcanvasScrolling">
                        Filter Services
                        <i class="fa-solid fa-filter ms-2"></i>
                    </button>

                    <div class="offcanvas d-none bg-light offcanvas-start " data-bs-scroll="true"
                        data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling"
                        aria-labelledby="offcanvasScrollingLabel">
                        <div class="offcanvas-header justify-content-end">
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <div class="filter-side mt-3 p-3">
                                <div class="show-filter">
                                    <h6 class="text-main">Show Services</h6>
                                    <div class="mt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                From newest to oldest
                                            </label>
                                        </div>
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                From oldest to newest
                                            </label>
                                        </div>
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                From cheapest to expensive
                                            </label>
                                        </div>
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                From expensive to cheapest
                                            </label>
                                        </div>
                                    </div>


                                </div>
                                <div class="price-filter mt-4">
                                    <h6 class="text-main">Price</h6>
                                    <div class="input-group input-group-sm my-3">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">From</span>
                                        <input type="text" class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-sm">
                                    </div>
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">To</span>
                                        <input type="text" class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-sm">
                                    </div>
                                </div>
                                <div class="rate-filter mt-4">
                                    <h6 class="text-main">Rates</h6>
                                    <div class="d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="checkboxNoLabel"
                                            value="">
                                        <div class="ms-2">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mt-2">
                                        <input class="form-check-input" type="checkbox" id="checkboxNoLabel"
                                            value="">
                                        <div class="ms-2">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mt-2">
                                        <input class="form-check-input" type="checkbox" id="checkboxNoLabel"
                                            value="">
                                        <div class="ms-2">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mt-2">
                                        <input class="form-check-input" type="checkbox" id="checkboxNoLabel"
                                            value="">
                                        <div class="ms-2">

                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>

                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mt-2">
                                        <input class="form-check-input" type="checkbox" id="checkboxNoLabel"
                                            value="">
                                        <div class="ms-2">
                                            <i class="fa-solid fa-star"></i>
                                        </div>

                                    </div>
                                </div>
                                <button class=" btn main-btn align-items-center mt-5" type="button"
                                    data-bs-dismiss="offcanvas" aria-label="Close">
                                    Filter
                                    <i class="fa-solid fa-filter ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="services-deps mt-3">
                        <div class="row g-5">
                            @foreach ($services as $service)
                                <div class="col-lg-6" box-type="service1">
                                    {{-- <a href="{{ url('/service-details') }}"> --}}
                                    <div class="card px-5 py-4 text-center border-0 shadow">
                                        <div class="service-price shadow rounded-start">$300</div>
                                        <h5> {{ $service->name }}</h5>
                                        <p class="mt-3 mb-4">
                                            {{ $service->description }}
                                        </p>
                                        <img class="img-fluid shadow rounded"
                                            src="{{ asset('/images/services/' . ($service->image->first()->path ?? 'default.png')) }}"
                                            alt="">
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.nav-link').click(function(e) {
            e.preventDefault();

            var categoryId = $(this).data('category-id');

            $.ajax({
                url: 'category/' + categoryId + '/services',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Update the HTML with the services data
                    var servicesContainer = $('.services-container');
                    servicesContainer.empty();
                    $.each(response, function(index, service) {
                        var serviceHtml = '<div class="service">' +
                            '<h3>' + service.name + '</h3>' +
                            '<p>' + service.description + '</p>' +
                            '</div>';

                        servicesContainer.append(serviceHtml);
                    });
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });
    });
</script>
