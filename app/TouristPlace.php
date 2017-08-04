<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TouristPlace extends Model
{
    protected $table = 'tourist_places';

    protected $guarded = ['id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
