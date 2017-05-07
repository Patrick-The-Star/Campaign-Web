<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
	protected $fillable=['country','starts_at','ends_at','category','name','description'];

    public function campaign_contents(){
    	return $this->hasMany(campaign_contents::class);
    }
    //
}
