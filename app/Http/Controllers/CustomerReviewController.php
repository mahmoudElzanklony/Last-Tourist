<?php

namespace App\Http\Controllers;

use App\Models\CustomerReview;
use Illuminate\Http\Request;

class CustomerReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = CustomerReview::all();

        return view('admin.customer_reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'service_id' => 'integer',
            'rating' => 'integer|min:1|max:5',
            'content' => 'string',
            'customer_name' => 'string',
            'user_id' => 'integer',
        ]);

        // Save the customer review
        $customerReview = CustomerReview::create([
            'rating' => $validatedData['rating'],
            'content' => $validatedData['content'],
            'customer_name' => $validatedData['customer_name'],
            'service_id' => $validatedData['service_id'],
        ]);
        return response()->json($customerReview);

        // return redirect()->back()->with('success', 'Review posted successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review = CustomerReview::findOrFail($id);

        return view('customer_reviews.show', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review = CustomerReview::findOrFail($id);

        return view('customer_reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
