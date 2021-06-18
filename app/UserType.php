<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    // $fillable

    protected $fillable = [
        'name' 
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }  

}
