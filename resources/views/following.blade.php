@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Following</div>

                <div class="panel-body">
                    <div class="list-group">
                    @forelse ($list as $following)
                        <a href="/{{$following->id}}" class="list-group-item">
                            <h4 class="list-group-item-heading">
                                <img class="list-item md" src="/uploads/images/{{$following->image}}" style="width:50px;height:50px;border-radius:50%;margin-right:55px;">
                                &#64;{{ $following->name }}
                            </h4>
                        </a>
                    @empty
                        <p>No users</p>
                    @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection