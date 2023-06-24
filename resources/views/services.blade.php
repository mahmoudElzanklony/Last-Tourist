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
                    <a class="nav-link active" data-category-id="all">All</a>
                </li>
                @foreach ($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-category-id="{{ $category->id }}">{{ $category->name }}</a>
                    </li>
                @endforeach

            </ul>
        </div>
        <div class="container">
            <!-- Add the search input field -->
            <div class="search-container mt-3">
                <input type="text" class="form-control" id="service-search" placeholder="Search For Services">
            </div>

            {{-- <div class="search mt-5 d-flex align-items-center bg-white  border rounded-1">
                <input class="form-control border-0" type="text" placeholder="Search For Services">
                <i class="fa-solid fa-magnifying-glass me-3 text-main"></i>
            </div> --}}
            <div class="row g-4 pt-4 pb-5">

                <div class="col-lg-3">
                    <div class="filter mt-3 bg-light h-100 p-3">
                        {{-- <div class="show-filter">
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


                        </div> --}}
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
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                        Filter Services
                        <i class="fa-solid fa-filter ms-2"></i>
                    </button>

                    <div class="offcanvas d-none bg-light offcanvas-start " data-bs-scroll="true" data-bs-backdrop="false"
                        tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
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
                    <div class="row g-5 services-container">
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
        $.ajax({
            url: 'category/all/services',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                var servicesContainer = $('.services-container');
                servicesContainer.empty();
                $('.services-container').append(response);
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    });

    $(document).ready(function() {
        $('.nav-link').click(function(e) {
            e.preventDefault();
            var categoryId = $(this).data('category-id');
            $.ajax({
                url: 'category/' + categoryId + '/services',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    var servicesContainer = $('.services-container');
                    servicesContainer.empty();
                    $('.services-container').append(response);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });
    });

    $(document).ready(function() {
        function filterServices(searchTerm) {
            var services = $('.services-container .col-lg-6');
            services.each(function() {
                var service = $(this);
                var serviceName = service.find('h5').text().toLowerCase();
                if (serviceName.includes(searchTerm.toLowerCase())) {
                    service.show();
                } else {
                    service.hide();
                }
            });
        }
        $.ajax({
            url: 'category/all/services',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                var servicesContainer = $('.services-container');
                servicesContainer.empty();
                servicesContainer.append(response);
                $('#service-search').on('input', function() {
                    var searchTerm = $(this).val();
                    filterServices(searchTerm);
                });
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    });

    $(document).ready(function() {
        function filterServicesByPrice(minPrice, maxPrice) {
            var services = $('.services-container .col-lg-6');

            services.each(function() {
                var price = parseFloat($(this).data('service-price'));
                if (price >= minPrice && price <= maxPrice) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }
        $('.price-filter input[type="text"]').keyup(function() {
            var minPrice = parseFloat($('#from-price').val()) || 0;
            var maxPrice = parseFloat($('#to-price').val()) || Number.MAX_VALUE;
            filterServicesByPrice(minPrice, maxPrice);
        });
    });

    $(document).ready(function() {
        // Function to filter services based on selected ratings
        function filterServicesByRating() {
            var services = $('.services-container .col-lg-6');

            services.each(function() {
                var rating = parseFloat($(this).data('service-rating'));
                var selectedRatings = [];

                $('.rate-filter input[type="checkbox"]:checked').each(function() {
                    selectedRatings.push(parseFloat($(this).val()));
                });

                if (selectedRatings.length === 0 || selectedRatings.includes(rating)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }

        $('.rate-filter input[type="checkbox"]').change(function() {
            filterServicesByRating(); // Filter services based on selected ratings
        });
    });
</script>
