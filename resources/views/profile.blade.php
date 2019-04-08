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
                                <span>HTML </span> <span>CSS3</span> <span>Javascript</span> <span>JQuery</span>
                                <span>HTML</span> <span>CSS3</span> <span>Javascript</span> <span>JQuery</span>
                            </div>
                            
                        </div>

                        <div class="col-md-9 leftborder">
                            <h2>Manage Profile</h2>
                            <div class="col-md-6">
                                <form>
                                    <div class="form-group">
                                        <label for="ename">Name</label>
                                        <input type="text" class="form-control" id="ename" placeholder="Name" value="Sooraj">
                                    </div>
                                    <div class="form-group">
                                        <label for="desig">Designation</label>                                        
                                        <select class="form-control designation" name="designation_id">
                                            <option value="AL">Alabama</option>                                            
                                            <option value="WY">Wyoming</option>
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
