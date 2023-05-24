@extends('auth.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <a href="../{{ $book->book_image }}" target="_blank">
                <img src="../{{ $book->book_image }}" class="img-fluid" alt="{{ $book->book_title }}">
            </a>
        </div>
        <div class="col-md-8">
            <h2>{{ $book->book_title }}</h2>
            <p>{{ $book->book_description }}</p>
            <div class="card-footer">
                <b>Price:</b> {{ $book->book_price }}
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

        </div>
    </div>
</div>
@endsection