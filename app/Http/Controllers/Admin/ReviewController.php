<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Review;
use App\Profile;
use App\Comment;

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
        $review->user_id = Auth::id();
        $review->nickname = Auth::user()->name;
        $review->save();
        
        return redirect('admin/review/create');
    }
    
    public function index(Request $request)
    {
        $userId = Auth::User()->id;
        $posts = Review::where('user_id', $userId)->get();
        
        return view('admin.review.index', ['posts' => $posts]);
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
    
    public function delete(Request $request)
    {
        $review = Review::find($request->id);
        
        $review->delete();
        
        return redirect('admin/review/index');
    }
    
    public function ref(Request $request)
    {
        $id = $request->id;
        
        $profile = Profile::where('id', $id)->first();
        $posts = Review::where('user_id', $profile->user_id)->get();
        
        return view('admin.review.ref', ['posts' => $posts, 'profile' => $profile]);
    }
    
    public function check(Request $request)
    {
        $user_id = Auth::user()->id;
        
        $review_id = $request->id;
        
        $review = Review::find($request->id);
        
        $comments = Comment::where('review_id', $review_id)->get()->sortByDesc('updated_at');
        
        \Debugbar::info($review);
        \Debugbar::info($comments);
        
        return view('admin.review.comment', ['user_id' => $user_id, 'review' => $review, 'comments' => $comments]);
    }
    
    public function comment(Request $request)
    {
        $this->validate($request, Comment::$rules);
    
        $comment = new Comment;
        
        unset($request['_token']);
        
        $comment->comment = $request->comment;
        $comment->nickname = Auth::user()->name;
        $comment->user_id = Auth::id();
        $comment->review_id = $request->id;
        $comment->save();
        
        return redirect('admin/review/comment?id=' . $request->id);
    }
    
    public function comdelete(Request $request)
    {
        $comment = Comment::where('id', $request->id)->first();
        //$comment = Comment::find($request->id);
        
        $review_id = $comment->review_id;
        
        $comment->delete();
        
        return redirect('admin/review/comment?id=' . $review_id);
    }
    
}