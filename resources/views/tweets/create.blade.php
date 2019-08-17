@extends('layouts.app')

@section('content')
        <br>
        <h1> Create Tweet</h1>
        {!! Form::open(['action'=>'TweetsController@store' , 'method' => 'POST']) !!}
            <div class="form-group">
                {{Form::label('body','Tweet')}}
                {{Form::textarea('body','',['class'=> 'form-control', 'maxlength'=>'139','placeholder'=>'What is in your mind'])}}      
                {{Form::submit('Submit' ,['class'=> 'btn btn-primary', 'style'=>'float:right;margin-top:-20px'])}}
            </div>
        {!! Form::close()!!}
           
@endsection