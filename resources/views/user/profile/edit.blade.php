<title>Edit Profile</title>

@extends('admin.layout.master')

@section('content')
<div class="sales-boxes">
        <div class="recent-sales box">
            <div class="title">Edit Profile</h2>
                <div class="button"><a class="btn btn-primary" href="{{ route('profile.show',$profile->user_id) }}"> Back</a></div>
            </div>
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
                
            
            <div class="sales-details">

              <form action="{{ route('profile.update', $profile->user_id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
              <div class="row">
                <div class="col-lg-4">
                  <div class="card mb-4">
                    <div class="card-body text-center">
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
                                  <input type="text" name="first_name" class="form-control" value="{{ $profile->first_name }}" > 
                              </div>
                          </div>
                          <hr>
                          <div class="row">
                              <div class="col-sm-3">
                                  <label for="last_name">Last Name:</label>
                              </div>
                              <div class="col-sm-8">
                                  <input type="text" name="last_name" class="form-control" value="{{ $profile->last_name }}" > 
                              </div>
                          </div>
                          <hr>
                      <div class="row">
                        <div class="col-sm-3">
                        <label for="email">Email:</label>
                        </div>
                        <div class="col-sm-8">
                                  <input type="text" name="email" class="form-control" value="{{ $profile->email }}" > 
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Phone</p>
                        </div>
                        <div class="col-sm-9">
                        <input type="text" name="phone" class="form-control" value="{{ $profile->phone }}" > 
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Mobile</p>
                        </div>
                        <div class="col-sm-9">
                        <input type="text" name="mobile" class="form-control" value="{{ $profile->mobile }}" > 
                      </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Address</p>
                        </div>
                        <div class="col-sm-9">
                        <input type="text" name="address" class="form-control" value="{{ $profile->address }}" > 
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Skype</p>
                        </div>
                        <div class="col-sm-9">
                        <input type="text" name="skype_url" class="form-control" value="{{ $profile->skype_url }}" > 
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Instagram</p>
                        </div>
                        <div class="col-sm-9">
                        <input type="text" name="instagram_url" class="form-control" value="{{ $profile->instagram_url }}" > 
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Facebook</p>
                        </div>
                        <div class="col-sm-9">
                        <input type="text" name="facebook_url" class="form-control" value="{{ $profile->facebook_url }}" > 
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Twitter</p>
                        </div>
                        <div class="col-sm-9">
                        <input type="text" name="twitter_url" class="form-control" value="{{ $profile->twitter_url }}" > 
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
</div></div>
</div>

@endsection

