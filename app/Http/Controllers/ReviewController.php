<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        return Review::all();
    }

    public function store(Request $request)
    {
        return Review::create([
            'name' => $request->name,
            'title' => $request->title,
            'review' => $request->review,
            'image' => $request->image,
        ]);
    }
    public function show(Review $review)
    {
        return $review;
    }

    public function update(Request $request, Review $review)
    {
        $review->name = $request->name;
        $review->title = $request->title;
        $review->review = $request->review;
        $review->image = $request->image;
        $review->save();
        return $review;
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return response('ok');
    }
}
