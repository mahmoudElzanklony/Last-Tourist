@extends('layouts.master')
@section('content')
    <div class="card mb-5 mb-xl-8">
        <!--begin::Card header-->
        <div class="card-header pt-7">
            <!--begin::Title-->
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold text-gray-800">{{ __('dashboard.orders') }}</span>
            </h3>
            <!--end::Title-->

        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-2">
            <!--begin::Table-->
            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-100px">#</th>
                        <th class="text-center min-w-100px">Payment Type</th>
                        <th class="text-center min-w-100px">Service</th>
                        <th class="text-center min-w-100px">{{ __('dashboard.created') }}</th>
                        <th class="text-center min-w-125px">{{ __('dashboard.customer') }}</th>
                        <th class="text-center min-w-100px">{{ __('dashboard.total') }}</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <tbody class="fw-bold text-gray-600">
                    @foreach ($orders as $order)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td class="text-center">{{ $order->payment_type }}</td>
                            <td class="text-center">{{ $order->service->name}}</td>
                            <td class="text-center">{{ $order->created_at->diffForHumans() }}</td>
                            <td class="text-center">
                                {{ $order->customer ?? $order->user->name }}

                            </td>
                            <td class="text-center">{{ $order->total_amount }}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>

    @include('admin/categories/_add_model')
@endsection
