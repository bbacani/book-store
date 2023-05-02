@extends('auth.template')

@section('content')
<div>
    <h1>All Books</h1>
    @foreach($books as $book)
    <div class="row gy-5 row-cols-1 row-cols-md-2 row-cols-lg-3">
        <!-- In Search of Lost Time by Marcel Proust -->
        <div class="col">
            <div class="card h-100">
                <img src="assets/{{$book->book_image}}" class="card-img-top" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">{{$book->book_title}}</h5>
                    <p class="card-text">
                    <div class="collapse multi-collapse-book1 show" id="multiCollapseExample1">
                        {{ \Illuminate\Support\Str::limit($book->book_description, $limit = 100, $end = '...') }}
                        <button class="btn btn-outline-dark btn-sm more-less-btn" type="button" data-bs-toggle="collapse" data-bs-target=".multi-collapse-book1" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">
                            Show more
                        </button>
                    </div>
                    <div class="collapse multi-collapse-book1" id="multiCollapseExample2">
                        {{$book->book_description}}
                        <button class="btn btn-outline-dark btn-sm more-less-btn" type="button" data-bs-toggle="collapse" data-bs-target=".multi-collapse-book1" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">
                            Show less
                        </button>
                    </div>
                    </p>
                </div>
                <div class="card-footer">
                    <b>Tags:</b>
                    Classic Literature,
                    Philosophy
                </div>
                <button class="btn btn-primary add-to-cart-btn" data-book-id="1">Add to Cart</button>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection