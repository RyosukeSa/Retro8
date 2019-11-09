<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Profile;
use App\Review;

class ProfileController extends Controller
{
    //
    public function add()
    {
        $userId = Auth::User()->id;
        $prof = Profile::where('user_id', $userId)->first();
        
        if ($prof != '') {
            return redirect('/admin/home');
        }
        
        return view('admin.profile.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Profile::$rules);
        
        $profile = new Profile;
        $form = $request->all();
            
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $profile->image_path = basename($path);
        } else {
            $profile->image_path = null;
        }
            
        unset($form['_token']);
        unset($form['image']);
            
        $profile->fill($form);
        $profile->nickname = Auth::user()->name;
        $profile->user_id = Auth::id();
        $profile->save();

        return redirect('admin/home');
    }
    
    public function index()
    {
        $userId = Auth::User()->id;

        $profile = Profile::where('user_id', $userId)->first();
        
        if (!$profile) {
            return redirect('/admin/profile/create');
        }

        $friends = Profile::where('user_id', '!=', $userId)->take(5)->get()->sortByDesc('user_id');
        $reviews = Review::all()->sortByDesc('updated_at')->take(5);
        
        \Debugbar::info($friends);

        return view('admin.profile.home', ['friends' => $friends,'reviews' => $reviews, 'profile' => $profile]);
    }
    
    public function edit(Request $request)
    {
        $profile = Profile::find($request->id);
        if (empty($profile)) {
            abort(404);
        }
        return view('admin.profile.edit', ['profile_form' => $profile]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Profile::$rules);
        
        $profile = Profile::find($request->id);
        
        $profile_form = $request->all();
        if (isset($profile_form['image'])) {
            $path = $request->file('image')->store('public/image');
            $profile->image_path = basename($path);
            unset($profile_form['image']);
        } elseif (isset($request->remove)) {
            $profile->image_path = null;
            unset($profile_form['remove']);
        }
        unset($profile_form['_token']);
        
        $profile->fill($profile_form)->save();
        
        return redirect('admin/home');
    }
    
    public function ref(Request $request)
    {
        $id = $request->id;
        $userId = Auth::User()->id;
        
        $profile = Profile::where('id', $id)->first();
        $reviews = Review::where('user_id', $profile->user_id)->get();
        //$reviews = $profile->reviews;
        
        $friends = Profile::where('user_id', '!=', $userId )->get();

        return view('admin.profile.ref', ['friends' => $friends,'reviews' => $reviews, 'profile' => $profile]);
    }
    
    public function frindex()
    {
        $userId = Auth::User()->id;
        
        $posts = Profile::where('user_id', '!=', $userId)->get()->sortByDesc('user_id');
        
        return view('admin.profile.index', ['posts' => $posts]);    
    }
}
