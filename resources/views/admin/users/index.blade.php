@extends('layout.master')

@section('content')
    <h1>Admin Users List</h1>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">Create New Admin User</a>
    @if ($adminUsers->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($adminUsers as $adminUser)
                    <tr>
                        <td>{{ $adminUser->name }}</td>
                        <td>{{ $adminUser->email }}</td>
                        <td>{{ $adminUser->role }}</td>
                        <td>
                            <a href="{{ route('admin.users.show', $adminUser->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('admin.users.edit', $adminUser->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('admin.users.destroy', $adminUser->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this admin user?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No admin users found.</p>
    @endif
@endsection
