<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userManagement extends Model
{

    
    public $timestamps = FALSE;
    protected $fillable = [
        'first_name','last_name' ,'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
