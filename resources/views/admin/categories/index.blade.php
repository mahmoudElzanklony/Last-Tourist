@extends('layouts.master')
@section('content')
    <!--begin::Tables Widget 9-->
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">{{ __('dashboard.categories') }}</span>
                {{-- <span class="text-muted mt-1 fw-semibold fs-7">Over 500 members</span> --}}
            </h3>
            <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover"
                title="Click to add a Family">
                <a href="#" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal"
                    data-bs-target="#kt_modal_categoey">
                    <i class="ki-duotone ki-plus fs-2"></i>{{ __('dashboard.new') }}</a>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="categoryTable">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="fw-bold text-muted">
                            {{-- <th class="w-25px">
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" data-kt-check="true"
                                        data-kt-check-target=".widget-9-check" />
                                </div>
                            </th> --}}
                            <th class="min-w-25px">#</th>
                            <th class="min-w-150px">{{ __('dashboard.photo') }}</th>
                            <th class="min-w-150px">{{ __('dashboard.name') }}</th>
                            <th class="min-w-100px text-end">{{ __('dashboard.actions') }}</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @foreach ($all as $category)
                            <tr>
                                {{-- <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input widget-9-check" type="checkbox" value="1" />
                                </div>
                            </td> --}}
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-45px me-5">
                                            <img src="{{ asset("images/category/$category->path") }}" alt="" />
                                        </div>

                                    </div>
                                </td>
                                <td>
                                    <span id="categoryName{{ $category->id }}">{{ $category->name }}</span>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-end flex-shrink-0">
                                        <a href="#"
                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
                                            data-bs-toggle="modal" data-bs-target="#editCategoryModal{{ $category->id }}">
                                            <i class="ki-duotone ki-pencil fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </a>
                                        @include('admin.categories._edit_model')
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
    @include('admin/categories/_add_model')
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#createCategoryForm').submit(function(e) {
            e.preventDefault();

            // Disable the submit button to prevent multiple submissions
            $('#createCategoryButton').prop('disabled', true);

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

                    // $('#categoryTable').append('<tr><td>' + response.name + '</td></tr>');

                    $('#kt_modal_categoey').modal('hide');
                    $("#categoryTable").load(location.href + " #categoryTable");
                    // Reset the form
                    $('#createCategoryForm')[0].reset();

                    // Enable the submit button
                    $('#createCategoryButton').prop('disabled', false);
                },
                error: function(xhr) {
                    // Handle any errors that occur during the request
                    console.log(xhr.responseText);

                    // Enable the submit button
                    $('#createCategoryButton').prop('disabled', false);
                }
            });
        });
    });

    function updateCategory(categoryId) {
        var categoryName = $('#edit-category-name' + categoryId).val();
        var photoPath = $('#edit-category-new-photo' + categoryId).val();

        // Perform the AJAX request to update the category
        $.ajax({
            url: 'categories/' + categoryId,
            type: 'PUT',
            data: {
                name: categoryName,
                path: photoPath,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                // Update the category name in the table row
                $('#categoryName' + categoryId).text(categoryName);

                // Close the modal
                $('#editCategoryModal' + categoryId).modal('hide');
            },
            error: function(xhr) {
                // Handle any errors that occur during the request
                console.log(xhr.responseText);
            }
        });

    }
</script>
