@extends('app')
@section('page_title', 'EditUser')
@section('content')
<div class="container my-4">

    <div class="card">
        <div class="card-header">
            <div class=" d-flex justify-content-between align-items-center">
            <h4>Edit User</h4>
            <div><a class="btn btn-outline-dark" href="{{route('users.index')}}">back to user</a></div>
            </div>
        </div>

        <div class="card-body">
            <form action="{{route('users.update',$users->id)}}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $users->name }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $users->email }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select name="role" class="form-select">
                        <option value="admin" {{ $users->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="user" {{ $users->role == 'user' ? 'selected' : '' }}>User</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ $users->phone }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea name="address" class="form-control">{{ $users->address }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update User</button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>

            </form>

        </div>
    </div>

</div>
@endsection