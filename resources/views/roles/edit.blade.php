<!-- resources/views/roles/edit.blade.php -->
@extends('layouts.sb-admin')

@section('content')
    <div class="container">
        <h1>Edit Role</h1>

        <form action="{{ route('roles.update', $role) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Role Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $role->name }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Role</button>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
