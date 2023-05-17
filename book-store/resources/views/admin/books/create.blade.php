@extends('auth.template')

@section('content')
    <!-- Add the form for creating a book -->
    <div class="card-body">
        <h5>Create Book</h5>
        <form action="{{ route('admin.books.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title') }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description"
                    class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}"
                    required>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="text" name="image" id="image"
                    class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" required>
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="pages">Pages</label>
                <input type="number" name="pages" id="pages"
                    class="form-control @error('pages') is-invalid @enderror" value="{{ old('pages') }}" required>
                @error('pages')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price"
                    class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" step="0.01"
                    required>
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="categories">Categories</label><br>
                @foreach ($categories as $category)
                    <input type="checkbox" name="categories[]" value="{{ $category->id }}">
                    {{ $category->category_name }}<br>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
