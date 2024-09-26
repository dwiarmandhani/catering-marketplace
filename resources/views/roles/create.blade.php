<!-- resources/views/roles/create.blade.php -->
@extends('layouts.sb-admin')

@section('content')
    <div class="container">
        <h1>Create Role</h1>

        <form action="{{ route('roles.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Role Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <button type="submit" class="btn btn-success">Create Role</button>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
