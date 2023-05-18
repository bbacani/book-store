@extends('auth.template')

@section('content')
<div>
    @if(count($books) > 0)
    <h3>Cart items</h3>
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">{{ __('Id') }}</th>
                        <th scope="col">{{ __('Title') }}</th>
                        <th scope="col">{{ __('Image') }}</th>
                        <th scope="col">{{ __('Description') }}</th>
                        <th scope="col">{{ __('Pages') }}</th>
                        <th scope="col">{{ __('Price') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                    <tr>
                        <th scope="row">{{ $book->id }}</th>
                        <td>{{ $book->book_title }}</td>
                        <td>
                            <a href="{{ $book->book_image }}" target="_blank">
                                <img src="{{ $book->book_image }}" alt="{{ $book->book_title }}" height="50">
                            </a>
                        </td>
                        <td>{{ $book->book_description }}</td>
                        <td>{{ $book->book_pages }}</td>
                        <td>{{ $book->book_price }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer text-right d-flex justify-content-between align-items-center">
            <div>
                <h4>Subtotal: {{$subtotal}}</h3>
            </div>

            <form action="{{ route('cart.payment', $subtotal) }}">
                @csrf
                <button type="submit" class="btn btn-primary btn-sm">Proceed to checkout</button>
            </form>
        </div>
    </div>
    @else
    <h3>Cart is empty</h3>
    @endif
</div>
@endsection