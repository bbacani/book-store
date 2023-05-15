@extends('auth.template')

@section('content')
    <!-- Add the form for editing a book -->
    <div class="card-body">
        <h5>Edit Book</h5>
        <form action="{{ route('admin.books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title', $book->title) }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description"
                    class="form-control @error('description') is-invalid @enderror"
                    value="{{ old('description', $book->description) }}" required>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="text" name="image" id="image"
                    class="form-control @error('image') is-invalid @enderror" value="{{ old('image', $book->image) }}"
                    required>
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="pages">Pages</label>
                <input type="number" name="pages" id="pages"
                    class="form-control @error('pages') is-invalid @enderror" value="{{ old('pages', $book->pages) }}"
                    required>
                @error('pages')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price"
                    class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $book->price) }}"
                    step="0.01" required>
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
