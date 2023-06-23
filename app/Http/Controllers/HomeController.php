<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Order;
use App\Models\Services;
use Illuminate\Http\Request;
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

        return view('services', compact('services'));
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
}
