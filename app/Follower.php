<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    /**
     * The tweets that belong to the user.
     */
    public function tweets()
    {
        return $this->belongsToMany('App\Tweet', 'user_id', 'user_id');
    }
}
