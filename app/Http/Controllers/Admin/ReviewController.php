<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Review;

class ReviewController extends Controller
{
    //
    public function add()
    {
        return view('admin.review.create');
    }
    public function create(Request $request)
    {
        $this->validate($request, Review::$rules);
        
        $review = new Review;
        $form = $request->all();
        
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $review->image_path = basename($path);
        } else {
            $review->image_path = null;
        }
        
        unset($form['_token']);
        unset($form['image']);
        
        $review->fill($form);
        $review->save();
        
        return redirect('admin/review/create');
    }
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        
        
        $posts = Review::all();
        
        return view('admin.review.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
}
