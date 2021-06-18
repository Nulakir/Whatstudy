<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // $fillable

    protected $fillable = [
        'name','user_type_id' 
    ];

    public function messages()
    {
        return $this->hasMany('App\Message');
    }  

    public function user_type()
    {
        return $this->belongsTo('App\UserType');
    }

}
