<?php

namespace App\Http\Controllers;
use App\User;
use App\Tweet;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show($id){
        $tweets = Tweet::where('user_id', $id);


        $user = User::where('id', $id)->firstOrFail();
        
        $followers_count =  $user->followers()->count();
        // Fix undefined variable error when user is not login
    $following_count = 0;
        
        $me = Auth::user();
        $is_edit_profile = (Auth::id() == $user->id);
        $following_count = $is_edit_profile ? $me->following()->count() : 0;
        $is_following = !$is_edit_profile && !$me->isFollowing($user);

        return view('profile', [
            'tweets'          => $tweets,
            'user'            => $user, 
            'followers_count' => $followers_count,
            'is_edit_profile' => $is_edit_profile, 
            'following_count' => $following_count,
            'is_following'    => $is_following]);
    }

    public function following()
{
    $me = Auth::user();
    $following_count = $me->following()->count();
    $list = $me->following()->orderBy('id')->get();
    $is_edit_profile = true;
    $is_following = false;
    return view('following', [
        'user' => $me,
        'followers_count' => $followers_count,
        'is_edit_profile' => $is_edit_profile,
        'following_count' => $following_count,
        'is_following' => $is_following,
        'list' => $list,
        ]);
}
public function followers($id)
{
    $user = User::where('id', $id)->firstOrFail();
    $followers_count =  $user->followers()->count();
    $list = $user->followers()->orderBy('id')->get();
    $is_edit_profile = false;
    $is_following = false;
    if (Auth::check()) {
        $is_edit_profile = (Auth::id() == $user->id);
        $me = Auth::user();
        $following_count = $is_edit_profile ? $me->following()->count() : 0;
        $is_following = !$is_edit_profile && $me->isFollowing($user);
    }
    return view('followers', [
        'user' => $user,
        'followers_count' => $followers_count,
        'is_edit_profile' => $is_edit_profile,
        'following_count' => $following_count,
        'is_following' => $is_following,
        'list' => $list,
        ]);
}
}
