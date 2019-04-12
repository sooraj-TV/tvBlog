@extends('layouts.app')
<style>


</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ $profileData->name }}'s Profile
                </div>

                <div class="card-body">
                    {{-- {{ dd($profileData) }} --}}
                    <div class="row">
                        <div class="col-md-3">
                            <div class="profile-main">
                                <img src="{{ url('images/default-user.png') }}" class="img-circle" width="125"><br><br>
                                <h2>{{ $profileData->name }}</h2>
                                <h3>{{ $profileData->user_designation }}</h3>
                                <h4>{{ $profileData->title }}</h4>
                            </div>
                            {{-- <hr> --}}
                            <div class="contact-info">
                                <table class="table">
                                    <tr><td><i class="far fa-envelope"></i> {{ $profileData->email }} <small class="label-gray">Office</small></td></tr>
                                    <tr><td><i class="far fa-envelope"></i> {{ $profileData->email_personal }} <small class="label-gray">Personal</small></td></tr>
                                    <tr><td><i class="fas fa-mobile-alt"></i> {{ $profileData->phone_number }}</td></tr>
                                    <tr><td><i class="fab fa-skype"></i> {{ $profileData->skype_id_official }} <small class="label-gray">Office</small></td></tr>
                                    <tr><td><i class="fab fa-skype"></i> {{ $profileData->skype_id_personal }} <small class="label-gray">Personal</small></td></tr>
                                </table>
                            </div>


                        </div>

                        <div class="col-md-9 leftborder">
                            <h4>Technical Skills</h4><hr>
                            <div class="skills">
                                @foreach ($user_skills as $uskill)
                                    <span>{{ $uskill->skills }}</span>
                                @endforeach
                            </div>
                            <br>
                            <h4>Profile Summary</h4><hr>
                            {{ $profileData->profile_summary }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
