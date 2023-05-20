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
                    value="{{ $previousValues['title'] }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description"
                    class="form-control @error('description') is-invalid @enderror"
                    value="{{ $previousValues['description'] }}" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="text" name="image" id="image"
                    class="form-control @error('image') is-invalid @enderror" value="{{ $previousValues['image'] }}"
                    required>
            </div>
            <div class="form-group">
                <label for="pages">Pages</label>
                <input type="number" name="pages" id="pages"
                    class="form-control @error('pages') is-invalid @enderror" value="{{ $previousValues['pages'] }}"
                    required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price"
                    class="form-control @error('price') is-invalid @enderror" value="{{ $previousValues['price'] }}"
                    step="0.01" required>
            </div>
            <div class="form-group">
                <label for="authors">Authors</label><br>
                @foreach ($authors as $author)
                    <input type="checkbox" name="authors[]" value="{{ $author->id }}"
                        {{ in_array($author->id, $previousValues['authors']) ? 'checked' : '' }}>
                    {{ $author->author_name }}<br>
                @endforeach
            </div>
            <div class="form-group">
                <label for="categories">Categories</label><br>
                @foreach ($categories as $category)
                    <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                        {{ in_array($category->id, $previousValues['categories']) ? 'checked' : '' }}>
                    {{ $category->category_name }}<br>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
