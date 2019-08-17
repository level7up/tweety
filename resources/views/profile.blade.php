@extends('layouts.profile')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-1">
                <div class="form-group" >
                        {!! Form::open(['action'=>'TweetsController@store' , 'method' => 'POST']) !!}
                        
                            {{Form::textarea('body','',['class'=> 'form-control','rows'=>'3', 'cols'=>'5', 'maxlength'=>'139','placeholder'=>'What is in your mind'])}}      
                            {{Form::submit('Submit' ,['class'=> 'btn btn-primary', 'style'=>'float:right;margin-top:-20px'])}}
                        {!! Form::close()!!}
                    </div>
                    <br>
            <div class="card">
                
                <div style="text-align:center" class="card-header"><h3>Tweets</h3></div>

                <div class="card-body">
                    <div class="list-group">
                        @forelse ($user->tweets()->get() as $tweet)
                        <div class="democontainer">
                                <img class="demoimage" src="uploads/images/{{$tweet->user->image}}" style="width:52px;border-radius:50%">
                                <h5 class="demotext"><strong>{{$tweet->user->name}}</strong></h5>
                            </div>
                            
                            <br>
                            <h4 style="color:#3E7DBA;"><a href="/tweets/{{$tweet->id}}">{{$tweet->body}}</a></h4>
                            <small>{{$tweet->created_at}}</small>
    
                            <hr>
                        @empty
                            <p>No tweet</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection