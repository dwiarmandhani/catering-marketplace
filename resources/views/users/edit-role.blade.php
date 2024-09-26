@extends('layouts.sb-admin')

@section('content')
    <div class="container">
        <h1>Edit Role for {{ $user->name }}</h1>

        <form action="{{ route('users.updateRole', $user) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="roles">Select Roles</label>
                <select name="roles[]" id="roles" class="form-control" multiple>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ $user->roles->contains($role) ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Update Role</button>
        </form>
    </div>
@endsection
