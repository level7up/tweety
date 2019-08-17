<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Image;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile(){
        $user_id= auth()->user()->id;
        $user = User::find($user_id);
        return view('profile', array('user'=>Auth::user()))->with('tweets', $user->tweets);
    }

    public function image(Request $request){
        // File Upload
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename= time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save(public_path('uploads/images/'. $filename));

            $user = Auth::user();
            $user->image = $filename;
            $user->save();   
            }
        return view('home', array('user'=>Auth::user()))->with('tweets', $user->tweets);
    }




    public function follows($id){
        // Find the User. Redirect if the User doesn't exist
        $user = User::where('id', $id)->firstOrFail();
        // Find logged in User
        $id = Auth::id();
        $me = User::find($id);
        $me->following()->attach($user->id);
        return redirect('/' . $id);
    }

    public function unfollows($id){
        // Find the User. Redirect if the User doesn't exist
        $user = User::where('id', $id)->firstOrFail();
        // Find logged in User
        $id = Auth::id();
        $me = User::find($id);
        $me->following()->detach($user->id);
        return redirect('/' . $id);
    }
}
