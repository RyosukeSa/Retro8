<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = array('id');
    
    //
    public static $rules = array(
        'nickname' => 'required',
        'age' => 'required',
        'hard' => 'required',
        'best' => 'required',
        'intro' => 'required'
    );
}
