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
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
