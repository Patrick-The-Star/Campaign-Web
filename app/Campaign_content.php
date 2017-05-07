<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign_content extends Model
{
	public function campaign(){
		return $this->belongsTo(User::class);
	}
    //
}
