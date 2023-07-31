@extends('admin.layout.master')

@section('content')
    <h1>Admin User Details</h1>
    <p><strong>Name:</strong> {{ $adminUser->name }}</p>
    <p><strong>Email:</strong> {{ $adminUser->email }}</p>
    <p><strong>Role:</strong> {{ $adminUser->role }}</p>
    <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Back</a>
@endsection
