@extends('layouts.app')
<style>
    
    
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                    {{-- {{ dd($profileData) }} --}}
                    <div class="row">                
                        <div class="col-md-3">
                            <div class="profile-main">
                                <img src="{{ url('images/default-user.png') }}" class="img-circle" width="125"><br><br>
                                <h2>{{ $profileData->name }}</h2>
                                <h3>{{ $designation->designation }}</h3>
                                <h4>{{ $profileData->title }}</h4>
                            </div>
                            <hr>
                            <div class="skills">
                                <span>HTML </span> <span>CSS3 </span> <span>Javascript</span> <span>JQuery</span>
                                <span>HTML</span> <span>CSS3</span> <span>Javascript</span> <span>JQuery</span>
                            </div>
                            
                        </div>

                        <div class="col-md-9 leftborder">
                            <h2>Manage Profile</h2>
                            <div class="col-md-6">
                                <form method="POST" action="{{ url('profile/appln') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="ename">Name</label>
                                        <input type="text" class="form-control" id="ename" placeholder="Name" value="{{ $profileData->name }}" required>
                                    </div>
                                    <div class="form-group">
                                            <label for="title">Title</label>
                                            <textarea class="form-control" id="title" placeholder="Title" >{{ $profileData->title }}</textarea>
                                        </div>
                                    <div class="form-group">
                                        <label for="desig">Designation</label>                                        
                                        <select class="form-control designation" name="designation_id" required>
                                            @foreach ($designations as $des)
                                                <option value="{{ $des->id }}" @if($des->id == $profileData->designation_id) selected @endif>{{ $des->designation }}</option>             
                                            @endforeach                                                                                                                       
                                        </select>
                                    </div>
                                    @php
                                        //$skills_arr = $skills->toArray();   
                                    @endphp
                                    <div class="form-group">
                                        <label for="desig">Skills</label>                                        
                                        <select class="form-control pskills" name="skill_ids[]" multiple required>
                                            @foreach ($skills as $skill)
                                                <option value="{{ $skill->id }}" selected>{{ $skill->skills }}</option>   
                                            @endforeach                                            
                                        </select>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
