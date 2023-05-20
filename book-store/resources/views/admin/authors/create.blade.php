@extends('auth.template')

@section('content')
    <!-- Add the form for creating a author -->
    <div class="card-body">
        <h5>Create Author</h5>
        <form action="{{ route('admin.authors.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Add the contact form fields -->
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone"
                    class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required>
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email"
                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <!-- End of contact form fields -->

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
