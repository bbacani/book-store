<div class="card-body">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">{{ __('Id') }}</th>
                <th scope="col">{{ __('Title') }}</th>
                @if($extended_info)
                <th scope="col">{{ __('Image') }}</th>
                <th scope="col">{{ __('Description') }}</th>
                @endif
                <th scope="col">{{ __('Pages') }}</th>
                <th scope="col">{{ __('Price') }}</th>
                <th scope="col">{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr class="align-baseline">
                <th scope="row">{{ $book->id }}</th>
                <td>{{ $book->book_title }}</td>
                @if($extended_info)
                <td>
                    <a href="{{ $book->book_image }}" target="_blank">
                        <img src="{{ $book->book_image }}" alt="{{ $book->book_title }}" height="50">
                    </a>
                </td>
                <td>{{ $book->book_description }}</td>
                @endif
                <td>{{ $book->book_pages }}</td>
                <td>{{ $book->book_price }}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{ route('user.favourites.remove', $book->id) }}" class="btn btn-danger">Remove</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>