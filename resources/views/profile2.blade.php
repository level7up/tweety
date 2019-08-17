@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <img src="/uploads/images/{{$user->image}}" style="width:150px;height:150px;border-radius:50%;margin-right:55px;">
            <h4>{{$user->name}} Profile's</h4>
            <form action="/profile" enctype="multipart/form-data" method="POST">
                <label>Update Profile Image</label>
                <input type="file"  name="image">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="submit" style="float:right" class="btn btn-sm btn-primary">
            </form>

            <hr>
            <div class="form-group" >
                {!! Form::open(['action'=>'TweetsController@store' , 'method' => 'POST']) !!}
                
                    {{Form::textarea('body','',['class'=> 'form-control','rows'=>'3', 'cols'=>'5', 'maxlength'=>'139','placeholder'=>'What is in your mind'])}}      
                    {{Form::submit('Submit' ,['class'=> 'btn btn-primary', 'style'=>'float:right;margin-top:-20px'])}}
                {!! Form::close()!!}
            </div>
            <br>
            <div class="card-body">
                @if(count($tweets)>0)
                    @foreach ($tweets as $tweet)
                        <div class="democontainer">
                            <img class="demoimage" src="uploads/images/{{$tweet->user->image}}" style="width:52px;border-radius:50%">
                            <h4 class="demotext"><strong>{{$tweet->user->name}}</strong></h4>
                        </div>
                        <br>
                        <br>
                        <br>
                        <h4 style="color:#3E7DBA;"><a href="/tweets/{{$tweet->id}}">{{$tweet->body}}</a></h4>
                        <small>{{$tweet->created_at}}</small>

                        <hr>
                    @endforeach
                @else
                <h2 style="text-align:center;color:#3E7DBA;">
                    You have no tweets..
                </h2>

                @endif
            </div>
        </div>
  
    </div>
</div>
@endsection
