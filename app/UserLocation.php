<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLocation extends Model
{
    protected $table = 'user_location';

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
