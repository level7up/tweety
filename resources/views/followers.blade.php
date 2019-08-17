@extends('layouts.profile')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">Followers</div>

                <div class="card-body">
                    <div class="list-group">
                    @forelse ($list as $followers)
                        <a href="{{ url('/' . $followers->id) }}" class="list-group-item">
                            <h3 class="list-group-item-text">&#64;{{ $followers->name }}</h3>
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