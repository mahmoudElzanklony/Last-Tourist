<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Order;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index()
    {
        $services = Services::all();
        $categories = Categories::all();

        return view('welcome', compact('services', 'categories'));
    }

    public function showService($id)
    {
        $service = Services::findOrFail($id);
        $category = Categories::findOrFail($service->category_id);
        $services_related  = $category->services;
        $reviews  = $service->customerReviews;
        return view('service-details', compact('service', 'services_related', 'reviews'));
    }
    public function showServices()
    {
        $services = Services::all();
        $categories = Categories::all();

        return view('services', compact('services', 'categories'));
    }
    public function payment($id)
    {
        $service = Services::findOrFail($id);
        return view('payment', compact('service'));
    }

    public function paymentAdd(Request $request)
    {
        $service = Services::findOrFail($request->service_id);
        $paymentType = $request->radioNoLabel;
        if ($paymentType == 1) {
            $paymentMethod = 'paypal';
        } elseif ($paymentType == 2) {
            $paymentMethod = 'visa';
        } else {
            return \back();
        }
        $amount = $service->price + $service->price * 0.2;
        Order::create([
            'service_id' => $service->id,
            'payment_type' => $paymentMethod,
            'total_amount' => $amount,
            'user_id' => 2,
            'order_date' => now(),
        ]);
        return Redirect::route('home');
    }
    public function getServices(Request $request, $id)
    {
        $services = "";
        if ($id == 'all') {
            $services = Services::all();
        } else {
            $category = Categories::findOrFail($id);
            $services = $category->services;
        }
        $serviceHtml = '';
        foreach ($services as $service) {

            $avgRating = Services::with('customerReviews')
                ->select('services.*', DB::raw('AVG(customer_reviews.rating) as avg_rating'))
                ->leftJoin('customer_reviews', 'services.id', '=', 'customer_reviews.service_id')
                ->where('services.id', $service->id)
                ->groupBy('services.id')
                ->first();
            $averageRating = $avgRating->avg_rating;
            $serviceHtml .= '<div class="col-lg-6" box-type="service1">';
            $serviceHtml .= '<div class="card px-5 py-4 text-center border-0 shadow">';
            $serviceHtml .= '<div class="service-price shadow rounded-start">' . $service->price . '</div>';
            $serviceHtml .= '<input type="hidden" class="service-price_cl" value="' . $service->price . '">';
            $serviceHtml .= '<input type="hidden" class="service-rating" value="' . $averageRating . '">';
            $serviceHtml .= '<h5>' . $service->name . '</h5>';
            $serviceHtml .= '<p class="mt-3 mb-4">' . $service->description . '</p>';
            $serviceHtml .= '<img class="img-fluid shadow rounded" src="' . asset('/images/services/' . ($service->image->first()->path ?? 'default.png')) . '" alt="">';
            $serviceHtml .= '<hr>';
            $serviceHtml .= '<div class="more-info d-flex flex-column flex-lg-row align-items-center justify-content-lg-between">';
            $serviceHtml .= '<div class="d-flex align-items-center">';
            $serviceHtml .= '<span class="material-symbols-outlined text-muted time">schedule</span>';
            $serviceHtml .= '<span class="ms-1 text-muted">' . $service->created_at->diffForHumans() . '</span>';
            $serviceHtml .= '</div>';
            $serviceHtml .= '<a href="' . route('service.details.show', ['id' => $service->id]) . '" class="btn info-btn mt-2 mt-lg-0">';
            $serviceHtml .= '<div class="d-flex justify-content-between align-items-center">';
            $serviceHtml .= 'Request info';
            $serviceHtml .= '<span class="material-symbols-outlined">chevron_right</span>';
            $serviceHtml .= '</div>';
            $serviceHtml .= '</a>';
            $serviceHtml .= '</div>';
            $serviceHtml .= '</div>';
            $serviceHtml .= '</div>';
        }
        return response()->json($serviceHtml);
    }
}
