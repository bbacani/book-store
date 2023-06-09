@extends('auth.template')

@section('content')
<div>
    <form action="{{ route('books.index') }}" method="GET">
        <div class="form-group">
            <label for="author">Author:</label>
            <select class="form-control" id="author" name="author">
                <option value="">All Authors</option>
                @foreach ($authors as $author)
                <option value="{{ $author->id }}" @if ($selected_author==$author->id) selected @endif>
                    {{ $author->author_name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="category">Category:</label>
            <select class="form-control" id="category" name="category">
                <option value="">All Categories</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if ($selected_category==$category->id) selected @endif>
                    {{ $category->category_name }}
                </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Filter</button>
    </form>
    <br>

    <div class="row gy-5 row-cols-1 row-cols-md-2 row-cols-lg-3">
        @foreach ($books as $book)
        @if (!$selected_category || $book->categories->contains('id', $selected_category))
        <div class="col">
            <div class="card h-100">
                <a href="/book/{{ $book->id }}">
                    <img src="{{ $book->book_image }}" class="card-img-top" alt="Book Cover">
                </a>
                <div class="card-body">
                    <h5 class="card-title">{{ $book->book_title }}</h5>
                    <p class="card-text">
                    <div class="collapse multi-collapse-book1 show" id="multiCollapseExample1">
                        {{ \Illuminate\Support\Str::limit($book->book_description, $limit = 100, $end = '...') }}
                        <button class="btn btn-outline-dark btn-sm more-less-btn" type="button" data-bs-toggle="collapse" data-bs-target=".multi-collapse-book1" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">
                            Show more
                        </button>
                    </div>
                    <div class="collapse multi-collapse-book1" id="multiCollapseExample2">
                        {{ $book->book_description }}
                        <button class="btn btn-outline-dark btn-sm more-less-btn" type="button" data-bs-toggle="collapse" data-bs-target=".multi-collapse-book1" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">
                            Show less
                        </button>
                    </div>
                    </p>
                </div>
                <div class="card-footer">
                    <b>Authors:</b>
                    |
                    @foreach ($book_authors as $book_author)
                    @if ($book_author->id == $book->id)
                    {{ $book_author->author_name }} |
                    @endif
                    @endforeach
                </div>
                <div class="card-footer">
                    <b>Categories:</b>
                    |
                    @foreach ($book_categories as $book_category)
                    @if ($book_category->id == $book->id)
                    {{ $book_category->category_name }} |
                    @endif
                    @endforeach
                </div>
                <div class="card-footer">
                    <b>Price:</b> {{ $book->book_price }}
                </div>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2">
                    <div class="col">
                        <a href="{{ route('cart.add', $book->id) }}" class="btn">
                            <button class="btn btn-primary add-to-cart-btn" data-book-id="{{ $book->id }}">Add to
                                Cart</button>
                        </a>
                    </div>
                    <div class="col">
                        <a href="{{ route('user.favourites.add', $book->id) }}" class="btn">
                            <button class="btn btn-primary add-to-cart-btn" data-book-id="{{ $book->id }}">Add to
                                Favourites</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>
@endsection