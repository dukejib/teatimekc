@extends('layouts.app')

@section('content')

<div class="container mt-2 justify-content-center">

    <div class="row">
        <!-- Include Menu -->
        <div class="col-lg-3">
            @include('includes.adminmenu')
        </div>
        <!-- Add Content here -->
        <div class="col-lg-9">

            @include('includes.errors')
            
            <div class="card shadow">
                <div class="card-header">{{ Auth::user()->name }}'s Profile</div>
            
                <div class="card-body">
                    <form action="{{ route('profile.update',['id' => $profile->user->id]) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-row">
    
                            <div class="col-lg-6 col-sm-12 col-md-12 text-center">
                                <img src="{{ asset($profile->avatar) }}" alt="" width="200px" height="auto" class="rounded-circle img-thumbnail shadow-sm">
                                <input type="file" name="avatar" id="avatar" class="form-control-file">
                                <label for="">Avatar pictures should be max 512px wide or 128px wide min</label>
                            </div>
                                
                            <div class="col-lg-6 col-sm-12 col-md-12">
                                
                                <div class="input-group mt-2 mb-2">
                                    <div class="input-group-text rounded-0">
                                        Job Title 
                                    </div>
                                    <input type="text" name="jobtitle" value="{{ $profile->jobtitle }}" class="form-control" required>
                                </div>
                                
                                <div class="input-group mt-2 mb-2">
                                    <div class="input-group-text rounded-0">About</div>
                                    <input type="text" name="about" class="form-control" value="{{ $profile->about }}" required>
                                </div>
            
                                <div class="input-group mt-2 mb-2">
                                    <div class="input-group-text rounded-0">
                                        <i class="fab fa-facebook"></i>  
                                    </div>
                                    <input type="text" name="facebook" value="{{ $profile->facebook }}" class="form-control" required>
                                </div>
            
                                <div class="input-group mt-2 mb-2">
                                    <div class="input-group-text rounded-0">
                                            <i class="fab fa-google"></i>
                                    </div>
                                    <input type="text" name="gmail" value="{{ $profile->gmail }}" class="form-control" required>
                                </div>
            
                                <div class="input-group mt-2 mb-2">
                                    <div class="input-group-text rounded-0">
                                        <i class="fab fa-twitter"></i>
                                    </div>
                                    <input type="text" name="twitter" value="{{ $profile->twitter }}" class="form-control" required>
                                </div>
            
                                <div class="input-group">
                                    <button class="btn btn-success btn-sm mt-2 mb-2 float-right">
                                        <i class="fas fa-save"></i>
                                        Update Profile
                                    </button>
                                </div>
                            </div>
                        </div>
    
    
                    </form>
                    
    
                </div>
            </div>

            <br>
            
            @if(Auth::user()->isAdmin != 2)
            {{-- Add Invite Link --}}
            <div class="card shadow">
                <div class="card card-header bg-secondary">
                    Invite a Member!
                </div>
                <div class="card card-body">
                    <form action="{{ route('invite.user') }}" method="post" class="form-inline">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="email" name="emailid" id="emailid" class="form-control" placeholder="Email for Invite..." aria-label="Email for Invitation" required>
                            <span class="input-group-btn">
                            <button type="submit" class="btn btn-success">
                                Invite!
                            </button>
                        </span>
                        </div>
                    </form>
                </div>
            </div>
            @endif
            
        </div>

    </div>

</div>
  
@endsection
