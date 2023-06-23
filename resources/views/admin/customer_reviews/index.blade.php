@extends('layouts.master')
@section('content')
    <!--begin::Tables Widget 9-->
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">{{ __('dashboard.users') }}</span>
                {{-- <span class="text-muted mt-1 fw-semibold fs-7">Over 500 members</span> --}}
            </h3>
            {{-- <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover"
                title="Click to add a Family">
                <a href="#" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal"
                    data-bs-target="#kt_modal_family">
                    <i class="ki-duotone ki-plus fs-2"></i>{{ __('dashboard.new') }}</a>
            </div> --}}
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="fw-bold text-muted">
                            <th class="min-w-200px">#</th>
                            <th class="min-w-150px">{{ __('dashboard.name') }}</th>
                            <th class="min-w-150px">{{ __('dashboard.created') }}</th>
                            <th class="min-w-150px">Rating</th>
                            <th class="min-w-150px">Comment</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @foreach ($reviews as $review)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $review->customer_name }}
                                </td>
                                <td>
                                    {{ $review->created_at->format('d M Y, h:i A') }}
                                </td>
                                <td>
                                    <div class="me-6">
                                        <i class="fa fa-star-half-alt me-1 text-warning fs-5"></i>
                                        <span class="text-gray-800 fw-bold">{{ $review->rating }}</span>
                                    </div>
                                </td>
                                <td>
                                    {{ $review->content }}
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
@endsection
