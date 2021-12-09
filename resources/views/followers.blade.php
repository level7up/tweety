@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">Followers</div>

                <div class="card-body">
                    <div class="list-group">
                    @forelse ($list as $followers)
                        <a href="/{{$followers->id}}" class="list-group-item">
                            <h3 class="list-group-item-text">
                                <img class="list-item md" src="/uploads/images/{{$followers->image}}" style="width:50px;height:50px;border-radius:50%;margin-right:55px;">
                                &#64;{{ $followers->name }}
                            </h3>
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