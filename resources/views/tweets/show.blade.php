@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <img class="demoimage" src="../uploads/images/{{$tweet->user->image}}" style="width:72px;border-radius:50%">

        <div class="well">
            <h1><strong>&#64;{{$tweet->user->name}}</strong></h1>
            <br>
            <h1 style="color:#3E7DBA;">{{$tweet->body}} </h1><hr>
           
        </div> 
        <small>{{$tweet->created_at}}</small>
        @if (Auth::user()->id== $tweet->user_id)
            {!! Form::open(['action'=>['TweetsController@destroy', $tweet->id],'method'=>'POST', 'class'=>'pull-right']) !!}           
                {{Form::hidden('_method' , 'DELETE')}}
                {{Form::submit('Delete' , ['class'=>'btn btn-danger'])}}
            {!! Form::close()!!}
        @endif
    </div>
@endsection