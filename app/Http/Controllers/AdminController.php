<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Services;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $last10Orders = Order::orderByDesc('created_at')->take(10)->get();
        $topServices = Services::with('customerReviews')
            ->select('services.*', DB::raw('AVG(customer_reviews.rating) as avg_rating'))
            ->leftJoin('customer_reviews', 'services.id', '=', 'customer_reviews.service_id')
            ->groupBy('services.id')
            ->orderBy('avg_rating', 'desc')
            ->take(10)
            ->get();            
        return view('admin.index', compact('last10Orders', 'topServices'));
    }
    public function users()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
}
