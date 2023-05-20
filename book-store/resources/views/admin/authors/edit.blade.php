@extends('auth.template')

@section('content')
    <!-- Add the form for editing a author -->
    <div class="card-body">
        <h5>Edit Author</h5>
        <form action="{{ route('admin.authors.update', $author->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ $previousValues['name'] }}" required>
            </div>

            <!-- Add the contact form fields -->
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone"
                    class="form-control @error('phone') is-invalid @enderror" value="{{ $author->contact->phone ?? '' }}"
                    required>
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email"
                    class="form-control @error('email') is-invalid @enderror" value="{{ $author->contact->email ?? '' }}"
                    required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <!-- End of contact form fields -->

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
