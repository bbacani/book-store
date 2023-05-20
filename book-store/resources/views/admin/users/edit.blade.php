@extends('auth.template')

@section('content')
    <!-- Add the form for editing a user -->
    <div class="card-body">
        <h5>Edit User</h5>
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $user->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email"
                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}"
                    required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="address" name="address" id="address"
                    class="form-control @error('address') is-invalid @enderror" value="{{ old('address', $user->address) }}"
                    required>
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="is_admin">Admin?</label>
                <select name="is_admin" id="is_admin" class="form-control @error('is_admin') is-invalid @enderror"
                    required>
                    <option value="0" @if (!$user->is_admin) selected @endif>No</option>
                    <option value="1" @if ($user->is_admin) selected @endif>Yes</option>
                </select>
                @error('is_admin')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
