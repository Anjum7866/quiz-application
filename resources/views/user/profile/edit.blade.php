@extends('layout.master')

@section('content')
<div class="container py-5">
<form action="{{ route('profile.update', $profile->user_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
 <div class="row">
   <div class="col-lg-4">
     <div class="card mb-4">
       <div class="card-body text-center">
       @if ($profile->avatar) 
       <div>
        <img src="{{asset('assets/uploads/profile/'.$profile->avatar)}}" width="100px" height="100px" class="rounded-circle img-fluid" alt="avatar">
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
   <div class="col-lg-8">
     <div class="card mb-4">
       <div class="card-body">
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

      
            <h1>Edit Profile</h1>

            <div class="row">
                <div class="col-sm-3">
                    <label for="first_name">First Name:</label>
                </div>
                <div class="col-sm-8">
                    <input type="text" name="first_name" class="form-control" value="{{ $profile->first_name }}" required> 
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <label for="last_name">Last Name:</label>
                </div>
                <div class="col-sm-8">
                    <input type="text" name="last_name" class="form-control" value="{{ $profile->last_name }}" required> 
                </div>
            </div>
            <hr>
         <div class="row">
           <div class="col-sm-3">
           <label for="email">Email:</label>
           </div>
           <div class="col-sm-8">
                    <input type="text" name="email" class="form-control" value="{{ $profile->email }}" required> 
           </div>
         </div>
         <hr>
         <div class="row">
           <div class="col-sm-3">
             <p class="mb-0">Phone</p>
           </div>
           <div class="col-sm-9">
           <input type="text" name="phone" class="form-control" value="{{ $profile->phone }}" required> 
           </div>
         </div>
         <hr>
         <div class="row">
           <div class="col-sm-3">
             <p class="mb-0">Mobile</p>
           </div>
           <div class="col-sm-9">
           <input type="text" name="mobile" class="form-control" value="{{ $profile->mobile }}" required> 
         </div>
         </div>
         <hr>
         <div class="row">
           <div class="col-sm-3">
             <p class="mb-0">Address</p>
           </div>
           <div class="col-sm-9">
           <input type="text" name="address" class="form-control" value="{{ $profile->address }}" required> 
           </div>
         </div>
         <hr>
         <div class="row">
           <div class="col-sm-3">
             <p class="mb-0">Skype</p>
           </div>
           <div class="col-sm-9">
           <input type="text" name="skype_url" class="form-control" value="{{ $profile->skype_url }}" required> 
           </div>
         </div>
         <hr>
         <div class="row">
           <div class="col-sm-3">
             <p class="mb-0">Instagram</p>
           </div>
           <div class="col-sm-9">
           <input type="text" name="instagram_url" class="form-control" value="{{ $profile->instagram_url }}" required> 
           </div>
         </div>
         <hr>
         <div class="row">
           <div class="col-sm-3">
             <p class="mb-0">Facebook</p>
           </div>
           <div class="col-sm-9">
           <input type="text" name="facebook_url" class="form-control" value="{{ $profile->facebook_url }}" required> 
           </div>
         </div>
         <hr>
         <div class="row">
           <div class="col-sm-3">
             <p class="mb-0">Twitter</p>
           </div>
           <div class="col-sm-9">
           <input type="text" name="twitter_url" class="form-control" value="{{ $profile->twitter_url }}" required> 
           </div>
         </div>
         <hr>
            <button class="btn btn-primary" type="submit">Save</button>
       
         
       </div>
     </div>
 
   </div>
 </div>
 </form>
</div>

@endsection

