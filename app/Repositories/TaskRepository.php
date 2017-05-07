<?php

namespace App\Repositories;
use App\Campaign;
use App\User;
use App\Task;

class TaskRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser()
    {
        return Campaign::all();
                    
    }
}
