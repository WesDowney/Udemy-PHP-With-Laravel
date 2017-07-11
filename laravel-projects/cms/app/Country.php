<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //


	public function posts(){
		return $this->hasManyThrough('App\Post', 'App\User'); 

		// The above is equal to the below since the last two parameters are default
		//return $this->hasManyThrough('App\Post', 'App\User', 'country_id', 'user_id'); 
	}

}
