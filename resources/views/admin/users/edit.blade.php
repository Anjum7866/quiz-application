<title>Admin User</title>
@extends('admin.layout.master')

@section('content')
<div class="sales-boxes">
        <div class="recent-sales box">
            <div class="title">Edit Admin User
            <br>
            <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Back</a><br><br>
               
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
                <div class="row">
                    <form action="{{ route('admin.users.update', $adminUser->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $adminUser->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $adminUser->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-control" required>
                            <option value="teacher" @if($adminUser->role === 'teacher') selected @endif>Teacher</option>
                                  
                            <option value="admin" @if($adminUser->role === 'admin') selected @endif>Admin</option>
                            <option value="superadmin" @if($adminUser->role === 'superadmin') selected @endif>Superadmin</option>
                            </select>
                        </div><br>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>    
            </div>
        </div>
</div>    
@endsection
