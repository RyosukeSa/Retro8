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
    public function conf()
    {
        
        $posts = Review::all()->sortByDesc('updated_at');
        
        return view('admin.review.conf', ['posts' => $posts]);
        
    }
    public function edit(Request $request)
    {
        $review = Review::find($request->id);
        if (empty($review)) {
            abort(404);
        }
        return view('admin.review.edit', ['review_form' => $review]);
    }
    public function update(Request $request)
    {
        $this->validate($request, Review::$rules);
        
        $review = Review::find($request->id);
        
        $review_form = $request->all();
        if (isset($review_form['image'])) {
            $path = $request->file('image')->store('public/image');
            $review->image_path = basename($path);
            unset($review_form['image']);
        } elseif (isset($request->remove)) {
            $review->image_path = null;
            unset($review_form['remove']);
        }
        unset($review_form['_token']);
        
        $review->fill($review_form)->save();
        
        return redirect('admin/review/index');
    }
}
