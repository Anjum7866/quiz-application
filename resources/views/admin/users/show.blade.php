<title>Admin User Details</title>
@extends('admin.layout.master')

@section('content')
<div class="sales-boxes" >
        <div class="recent-sales box" >
        <a href="{{ route('admin.users.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a><br>
          
            <div class="title">Admin User Details<br>
               
          </div>
              <div class="sales-details">
                <div class="row">
                    <br>
                    <p><strong>Name:</strong> {{ $adminUser->name }}</p>
                    <p><strong>Email:</strong> {{ $adminUser->email }}</p>
                    <p><strong>Role:</strong> {{ $adminUser->role }}</p><br>
                </div>
            </div>
        </div>
</div>
@endsection
