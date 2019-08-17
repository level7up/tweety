<?php

namespace App;
use App\Tweet;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function tweets(){
        return $this->hasMany('App\Tweet', 'user_id', 'id');
    }


    public function following(){
        return $this->belongsToMany('App\User', 'followers', 'follower_user_id', 'user_id')->withTimestamps();
    }

    public function isFollowing(User $user){
        return !is_null($this->following()->where('user_id', $user->id)->first());
    }

    public function followers(){
        return $this->belongsToMany('App\User', 'followers', 'user_id', 'follower_user_id')->withTimestamps();
    }

  

            
    // Get timeline.     
    public function timeline(){
        $following = $this->following()->with(['tweets' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->get();
        $timeline = $following->flatMap(function ($values) {
            return $values->tweets;
        });
        // Sort descending by the creation date
        $sorted = $timeline->sortByDesc(function ($tweet) {
            return $tweet->created_at;
        });
        return $sorted->values()->all();
    }


}
