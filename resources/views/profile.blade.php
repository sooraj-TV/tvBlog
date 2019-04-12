@extends('layouts.app')
<style>


</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">My Profile</div>

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
                            <hr>


                        </div>

                        <div class="col-md-9 leftborder">
                            <h2>Manage Profile</h2><hr>
                            @if (\Session::has('success'))
                                <div class="alert alert-success">
                                    {!! \Session::get('success') !!}
                                </div>
                            @endif
                            <form method="POST" action="{{ url('profile-appln') }}">
                                <div class="row">
                                <div class="col-md-6">
                                    @csrf
                                    <h5>Basic Info</h5><hr>
                                    <div class="form-group">
                                        <label for="ename">Full Name</label>
                                        <input type="text" class="form-control" name="name" id="ename" placeholder="Name" value="{{ $profileData->name }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="desig">Designation</label>
                                        <select class="form-control designation" name="designation_id" required>
                                            @foreach ($designations as $des)
                                                <option value="{{ $des->id }}" @if($des->id == $profileData->designation_id) selected @endif>{{ $des->designation }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Profile Title</label> <small><i>(Eg: I am a Javascript/Fullstack Developer)</i></small>
                                        <textarea class="form-control" name="title" id="title" placeholder="Your primary skill" >{{ $profileData->title }}</textarea>
                                    </div>

                                    @php
                                        $user_skills_arr = array();
                                        foreach($user_skills as $uk){
                                            array_push($user_skills_arr,$uk->skill_id);
                                        }
                                    @endphp
                                    <div class="form-group">
                                        <label for="desig">Technical Skills</label>
                                        <select class="form-control pskills" name="skill_ids[]" multiple required>
                                            @foreach ($skills as $skill)
                                                <option value="{{ $skill->id }}" @if(in_array($skill->id, $user_skills_arr)) selected @endif>{{ $skill->skills }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h5>Contact Info</h5><hr>
                                    <div class="form-group">
                                        <label for="pemail">Personal Email</label>
                                        <input type="text" class="form-control" name="email_personal" id="pemail" value="{{ $profileData->email_personal }}" placeholder="Personal Email" >
                                    </div>
                                    <div class="form-group">
                                        <label for="phoneN">Phone Number</label>
                                        <input type="text" class="form-control" name="phone_number" id="phoneN" value="{{ $profileData->phone_number }}" placeholder="Phone Number" >
                                    </div>
                                    <div class="form-group">
                                        <label for="skypeO">Skype ID (Official)</label>
                                        <input type="text" class="form-control" name="skype_id_official" id="skypeO" value="{{ $profileData->skype_id_official }}" placeholder="Skype ID(Official)" >
                                    </div>
                                    <div class="form-group">
                                        <label for="skypeP">Skype ID (Personal)</label>
                                        <input type="text" class="form-control" name="skype_id_personal" id="skypeP" value="{{ $profileData->skype_id_personal }}" placeholder="Skype ID(Persoanal)" >
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="profileSum">Profile Summary</label> <small><i>(Your technical strength in detail)</i></small>
                                        <textarea class="form-control" name="profile_summary" id="profileSum" placeholder="Profile Summary" style="height: 150px;">{{ $profileData->profile_summary }}</textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
