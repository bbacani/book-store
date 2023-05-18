@extends('auth.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if(!is_null($user))
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    User profile
                </div>
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <li class="list-group-item">Name: {{ $user->name }}</li>
                        <li class="list-group-item">Email: {{ $user->email }}</li>
                    </div>
                </div>
                <h5 class="d-flex justify-content-between">
                    <span>Order list</span>
                    <button class="btn btn-secondary btn-sm toggle-list">Hide</button>
                </h5>
                <ul class="list-group order-list">
                    @foreach ($orders as $order)
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <li class="list-group-item">Order Items: <div class="card">
                                    <div class="card-body">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">{{ __('Id') }}</th>
                                                    <th scope="col">{{ __('Title') }}</th>
                                                    <th scope="col">{{ __('Image') }}</th>
                                                    <th scope="col">{{ __('Pages') }}</th>
                                                    <th scope="col">{{ __('Price') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach (explode('|', $order->order_items) as $bookId)
                                                @php $book = App\Models\Book::find($bookId); @endphp
                                                @if ($book)
                                                <tr>
                                                    <th scope="row">{{ $book->id }}</th>
                                                    <td>{{ $book->book_title }}</td>
                                                    <td>
                                                        <a href="{{ $book->book_image }}" target="_blank">
                                                            <img src="{{ $book->book_image }}" alt="{{ $book->book_title }}" height="50">
                                                        </a>
                                                    </td>
                                                    <td>{{ $book->book_pages }}</td>
                                                    <td>{{ $book->book_price }}</td>
                                                </tr>
                                                @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">Order Subtotal: {{ $order->order_subtotal }}</li>
                            <li class="list-group-item">Order Date: {{ $order->order_date }}</li>
                            <li class="list-group-item">Order Completed:
                                @if ($order->order_completed == 1)
                                Yes
                                @else
                                No
                                @endif
                            </li>
                        </div>
                    </div>
                    @endforeach
                </ul>
                <br>

                <h5 class="d-flex justify-content-between">
                    <span>Shipment list</span>
                    <button class="btn btn-secondary btn-sm toggle-list">Hide</button>
                </h5>
                <ul class="list-group shipment-list">
                    @foreach ($shipments as $shipment)
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <li class="list-group-item">Shipment Items:
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">{{ __('Id') }}</th>
                                                    <th scope="col">{{ __('Title') }}</th>
                                                    <th scope="col">{{ __('Image') }}</th>
                                                    <th scope="col">{{ __('Pages') }}</th>
                                                    <th scope="col">{{ __('Price') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach (explode('|', $shipment->shipment_items) as $book_id)
                                                @php
                                                $book = App\Models\Book::find($book_id);
                                                @endphp
                                                @if ($book)
                                                <tr>
                                                    <th scope="row">{{ $book->id }}</th>
                                                    <td>{{ $book->book_title }}</td>
                                                    <td>
                                                        <a href="{{ $book->book_image }}" target="_blank">
                                                            <img src="{{ $book->book_image }}" alt="{{ $book->book_title }}" height="50">
                                                        </a>
                                                    </td>
                                                    <td>{{ $book->book_pages }}</td>
                                                    <td>{{ $book->book_price }}</td>
                                                </tr>
                                                @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">Shipment Date: {{ $shipment->shipment_date }}</li>
                            <li class="list-group-item">Shipment Sent:
                                @if ($shipment->shipment_sent == 1)
                                Yes
                                @else
                                No
                                @endif
                            </li>
                        </div>
                    </div>
                    @endforeach
                </ul>
            </div>
        </div>
        @else
        <h3>Not authorized</h3>
        @endif
    </div>
</div>
<script>
    document.querySelectorAll('.toggle-list').forEach(button => {
        const list = button.parentElement.nextElementSibling;
        button.addEventListener('click', () => {
            list.classList.toggle('d-none');
            const buttonText = list.classList.contains('d-none') ? 'Show' : 'Hide';
            button.textContent = buttonText;
        });
    });
</script>
@endsection