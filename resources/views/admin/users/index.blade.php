<title>Admin User</title>

@extends('admin.layout.master')

@section('content')
<div class="sales-boxes">
        <div class="recent-sales box">
            <div class="title">Admin Users List</h2>
                <div class="button"><a href="{{ route('admin.users.create') }}">Create New Admin User</a></div>
            </div>
            <div class="sales-details">
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
                                        <div class="row">
                                            <form action="{{ route('admin.users.destroy', $adminUser->id) }}" method="POST" class="d-inline">
                                            <a href="{{ route('admin.users.show', $adminUser->id) }}" class="btn btn-info btn-sm">View</a>
                                            <a href="{{ route('admin.users.edit', $adminUser->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" >Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No admin users found.</p>
                @endif
            </div>
        </div>
</div>
@endsection
