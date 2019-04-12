@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">

                        </div>
                        <div class="col-md-4">
                            <h4>Connections</h4><hr>
                            <div class="profile-list">
                                @foreach ($profiles as $profile)
                                <a href="{{ url('profile/'.$profile->user_id) }}">
                                    <div class="media">
                                        <img src="{{ url('images/default-user.png') }}" class="mr-3 img-circle" width="32">
                                        <div class="media-body">
                                            <h6 class="m-0">{{ $profile->name }}</h6>
                                            <span>{{ $profile->user_designation }}</span>
                                        </div>
                                    </div>
                                </a>
                                @endforeach

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
