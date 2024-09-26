<!-- resources/views/users/index.blade.php -->
@extends('layouts.sb-admin')

@section('content')
    <div class="container">
        <h1>Manage Users</h1>
        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Create User</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->roles->pluck('name')->implode(', ') }}</td> <!-- Display roles -->
                        <td>
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('users.editRole', $user) }}" class="btn btn-info">Edit Role</a> <!-- Edit Role Button -->
                            <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
