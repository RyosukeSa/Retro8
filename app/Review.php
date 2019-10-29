<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $guarded = array('id');
    
    public function profile()
    {
        return $this->belongsTo('App\Profile', 'user_id');
    }
    
    //
    public static $rules = array(
        'title' => 'required',
        'value' => 'required',
        'review' => 'required',
        );
 
}
