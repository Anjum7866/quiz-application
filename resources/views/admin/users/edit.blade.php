@extends('layout.master')

@section('content')
    <h1>Edit Admin User</h1>
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
                <option value="admin" @if($adminUser->role === 'admin') selected @endif>Admin</option>
                <option value="superadmin" @if($adminUser->role === 'superadmin') selected @endif>Superadmin</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
