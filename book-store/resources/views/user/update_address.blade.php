@extends('auth.template')

@section('content')
    <div class="tab-pane" id="profile">
        <div class="card">
            <div class="card-header">
                User Profile
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item">Name: {{ $user->name }}</li>
                    <li class="list-group-item">Email: {{ $user->email }}</li>
                    <li class="list-group-item">Address: {{ $user->address }}</li>
                </ul>
                <form action="{{ route('user.update.address.put') }}">
                    @csrf
                    <!-- Include this CSRF token for security -->
                    <div class="form-group">
                        <label for="newAddress">New Address</label>
                        <input type="text" class="form-control" id="newAddress" name="newAddress" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
