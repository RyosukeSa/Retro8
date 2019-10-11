<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Review;

class ReviewController extends Controller
{
    //
    public function index(Request $request)
    {
        $posts = Review::all()->sortByDesc('updated_at');
        
        return view('review.index', ['posts' => $posts]);
    }
}
