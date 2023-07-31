    

  
@extends('admin.layout.master')

<title>Profile</title>

@section('content')
<div class="sales-boxes">
        <div class="top-sales box">
            <div class="title">
                <div class="button"><a href="{{ route('profile.edit', $profile->id) }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">{{ __('Edit Profile') }}</span>
                    </a></div>
            </div>
            <div class="sales-details">
              <div class="row">
              @if ($profile->avatar) 
              <div>
                <img src="{{asset('assets/uploads/profile/'.$profile->avatar)}}" width="100px" height="100px" class="rounded-circle img-fluid" alt="avatar">
                </div>
                @else
                <div class="col-6 mt-3">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                    class="rounded-circle img-fluid" style="width: 150px;">
                </div>
                @endif   
                <h5 class="my-3">{{ $profile->user->name }}</h5>
                <p class="text-muted mb-1">{{ $profile->bio }}</p>
                <p class="text-muted mb-4">{{ $profile->address }}</p>
                <div class="d-flex justify-content-center mb-2">
                  <button type="button" class="btn btn-primary">Follow</button>
                  <button type="button" class="btn btn-outline-primary ms-1">Message</button>
                </div>

              </div>
            </div>
        </div>
        <div class="recent-sales box">
          
            <div class="sales-details">
              <div class="row">
              <div class="row" style="display:flex">
              <div class="col-sm-3">
                <p class="mb-0">Full Name:</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $profile->first_name}}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email:</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $profile->email }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $profile->phone }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Mobile</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $profile->mobile}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $profile->address}}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Skype</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $profile->skype_url}}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Instagram</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $profile->instagram_url}}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Facebook</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $profile->facebook_url}}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Twitter</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $profile->twitter_url}}</p>
              </div>
            </div>
              </div>
            </div>
        </div>
  </div>
        
   
          
          

@endsection