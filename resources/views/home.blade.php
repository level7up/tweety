@extends('layouts.app')
<style>

</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br>
            {!! Form::open(['action'=>'TweetsController@store' , 'method' => 'POST']) !!}
            <div class="form-group" >
                
                {{Form::textarea('body','',['class'=> 'form-control','rows'=>'3', 'cols'=>'5', 'maxlength'=>'139','placeholder'=>'What is in your mind'])}}      
               
               <br>
                {{Form::submit('Submit' ,['class'=> 'btn btn-primary', 'style'=>'float:right;margin-top:-20px'])}}
            </div>
            {!! Form::close()!!}
            <br>
            <div class="card">
                <div class="card-header">
                   <h4> Profile</h4>
                </div>

                <div class="card-body">
                    @forelse ($user->timeline() as $tweet)
                        <div class="democontainer">
                            <img class="demoimage" src="uploads/images/{{$tweet->user->image}}" style="width:52px;border-radius:50%;object-fit: cover;">
                            <h4 class="demotext"><a style="color:black;text-decoration:none;"  href="/{{$tweet->user_id}}">{{$tweet->user->name}}</a></strong></h4>
                        </div>
                        <br><br><br>
                        <a style="text-decoration:none;" href="/tweets/{{$tweet->id}}">
                            <div >
                                <h4 style="color:#3E7DBA;">{{$tweet->body}}</h4>
                                <small>{{$tweet->created_at}}</small>
                            </div>
                        </a>

                        <hr>
                    @empty
                        <p>No tweet</p>
                    @endforelse
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
