@extends('layouts.master')
<style type="text/css">
    .image-container {
        width: 150px;
        /* Adjust the width as needed */
        overflow-x: scroll;
        white-space: nowrap;
    }
</style>
@section('content')
    <!--begin::Tables Widget 9-->
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">{{ __('dashboard.services') }}</span>
                {{-- <span class="text-muted mt-1 fw-semibold fs-7">Over 500 members</span> --}}
            </h3>
            <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover"
                title="Click to add a Family">
                <a href="#" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal"
                    data-bs-target="#kt_modal_service">
                    <i class="ki-duotone ki-plus fs-2"></i>{{ __('dashboard.new') }}</a>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="table_services">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="fw-bold text-muted">
                            {{-- <th class="w-25px">
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-9-check" />
                                </div>
                            </th> --}}
                            <th class="min-w-25px">#</th>
                            <th class="min-w-200px">{{ __('dashboard.photo') }}</th>
                            <th class="min-w-200px">{{ __('dashboard.categories') }}</th>
                            <th class="min-w-150px">{{ __('dashboard.name') }}</th>
                            <th class="min-w-150px">{{ __('dashboard.description') }}</th>
                            <th class="min-w-150px">{{ __('dashboard.price') }}</th>
                            <th class="min-w-100px text-end">{{ __('dashboard.actions') }}</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @foreach ($services as $service)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <div class="image-container">

                                            @foreach ($service->image as $image)
                                                <div class="symbol symbol-75px me-5">
                                                    <img src="{{ asset("images/services/$image->path") }}" alt="Photo">
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                </td>
                                <td>
                                    {{ $service->category->name }}
                                </td>
                                <td>
                                    {{ $service->name }}
                                </td>
                                <td class="min-w-200px">
                                    {{ $service->description }}
                                </td>
                                <td>
                                    {{ $service->price }}
                                </td>
                                <td>
                                    <div class="d-flex justify-content-end flex-shrink-0">
                                        <a href="#"
                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
                                            data-bs-toggle="modal" data-bs-target="#editCategoryModal{{ $service->id }}">
                                            <i class="ki-duotone ki-pencil fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </a>
                                        @include('admin.services._edit_model')

                                        {{-- Additional actions for each service --}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Table container-->
        </div>

        <!--begin::Body-->
    </div>
    <!--end::Tables Widget 9-->
    @include('admin/services/_add_model')
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#createServiceForm').submit(function(e) {
            e.preventDefault();

            // Disable the submit button to prevent multiple submissions
            $('#createServiceButton').prop('disabled', true);

            // Create a new FormData object
            var formData = new FormData(this);

            // Perform the AJAX request
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Handle the success response

                    // Reset the form
                    $('#createServiceForm')[0].reset();
                    $('#kt_modal_service').modal('hide');
                    $("#table_services").load(location.href + " #table_services");
                    // Enable the submit button
                    $('#createServiceButton').prop('disabled', false);
                },
                error: function(xhr) {
                    // Handle any errors that occur during the request
                    console.log(xhr.responseText);

                    // Enable the submit button
                    $('#createServiceButton').prop('disabled', false);
                }
            });
        });
    });

    $(document).ready(function() {
        $('.editServiceForm').submit(function(e) {
            e.preventDefault();

            // Disable the submit button to prevent multiple submissions
            $(this).find('button[type="submit"]').prop('disabled', true);

            // Get the service ID from the data attribute
            var serviceId = $(this).data('service-id');

            // Create a new FormData object
            var formData = new FormData(this);

            // Perform the AJAX request
            $.ajax({
                url: 'services/' + serviceId,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Handle the success response
                    console.log(response);
                    $("#table_services").load(location.href + " #table_services");
                    // Close the modal
                    $('#editCategoryModal' + serviceId).modal('hide');

                    // Update the service data in the table
                    var serviceRow = $('#serviceRow' + serviceId);
                    serviceRow.find('.service-name').text(response.name);
                    serviceRow.find('.service-description').text(response.description);
                    serviceRow.find('.service-price').text(response.price);
                    serviceRow.find('.service-category').text(response.category.name);

                    // Enable the submit button
                    $('.editServiceForm').find('button[type="submit"]').prop('disabled',
                        false);
                },
                error: function(xhr) {
                    // Handle any errors that occur during the request
                    console.log(xhr.responseText);

                    // Enable the submit button
                    $('.editServiceForm').find('button[type="submit"]').prop('disabled',
                        false);
                }
            });
        });
    });
</script>
