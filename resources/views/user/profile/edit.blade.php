    

  
@extends('admin.layout.master')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
<style>
  
  
.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: medium
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}
</style>
<title>Profile</title>

@section('content')
<div class="sales-boxes">
@if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
            
         
        <div class="recent-sales box">
        <div class="sales-details">
        <form action="{{ route('profile.update', $profile->user_id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
             
          <div class="row">
              <div class="col-md-4 border-right">
              @if ($profile->avatar) 
                      <div>
                      <img src="{{asset('assets/uploads/profile/'.$profile->avatar)}}" style="width: 150px;" class="rounded-circle img-fluid" alt="avatar">
                      <input type="file" name="avatar"  id="avatar"  >   
                      </div>
                      @else
                      <div class="col-6 mt-3">
                          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                          class="rounded-circle img-fluid" style="width: 150px;">
                          <input type="file" name="avatar"  id="avatar"  >
                          @error('avatar')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                    @endif
              </div>
              <div class="col-md-8 border-right">
                  <div class="p-3 py-5">
                      <div class="d-flex justify-content-between align-items-center mb-3">
                          <h3 class="text-right"><strong>Profile Settings</strong></h3>
                      </div>
                      <div class="row mt-2">
                          <div class="col-md-6"><label class="labels">Name</label><input type="text" name="first_name" class="form-control" value="{{ $profile->first_name }}" > </div>
                          <div class="col-md-6"><label class="labels">Surname</label>    <input type="text" name="last_name" class="form-control" value="{{ $profile->last_name }}" > </div>
                      </div>
                      <div class="row mt-3">
                          <div class="col-md-12"><label class="labels">Mobile Number</label>  <input type="text" name="mobile" class="form-control" placeholder="enter mobile no " value="{{ $profile->mobile }}" > </div>
                          <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" placeholder="enter address "  name="address" value="{{ $profile->address }}"></div>
                          <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" name="email" value="{{ $profile->email }}"></div>
                          <div class="col-md-12"><label class="labels">Skype ID</label><input type="text" class="form-control" placeholder="skype_url" name="skype_url" value="{{ $profile->skype_url }}"></div>
                          <div class="col-md-12"><label class="labels">Instagram ID</label><input type="text" class="form-control" placeholder="instagram_url" name="instagram_url" value="{{ $profile->instagram_url }}"></div>
                          <div class="col-md-12"><label class="labels">Facebook ID</label><input type="text" class="form-control" placeholder="facebook_url" name="facebook_url" value="{{ $profile->facebook_url }}"></div>
                          <div class="col-md-12"><label class="labels">Twitter ID</label><input type="text" class="form-control" placeholder="twitter_url" name="twitter_url" value="{{ $profile->twitter_url }}"></div>
                      </div>
                  <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
              </div>
              </div>
          </div>
          </form>
    </div>
    </div>
</div>

@endsection

