<?php

namespace App\Repositories;
use App\Campaign_content;
use App\Campaign;

class ContentRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forContent()
    {
        return Campaign_content::all();
                    
    }

    public function getCampaigns(){
        return Campaign::all();
    }

    public function forContentTable(Campaign $campaign){
        return Campaign_content::where('campaign_id',$campaign->id)->get();
    }

    public function getOne($a){
        return Campaign_content::where('campaign_id',$a)->get();
    }
}