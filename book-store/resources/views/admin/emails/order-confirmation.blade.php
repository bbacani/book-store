@extends('auth.template')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Order Confirmation</title>
    </head>

    <body>
        <p>Dear {{ $order->user->name }},</p>

        <p>Thank you for your order! We have received the following information:</p>

        <ul>
            <li><strong>Order Id:</strong> {{ $order->id }}</li>
            <li class="list-group-item">Order Items: <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('Id') }}</th>
                                    <th scope="col">{{ __('Title') }}</th>
                                    <th scope="col">{{ __('Price') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (explode('|', $order->order_items) as $item)
                                    @php
                                        $book = DB::table('books')
                                            ->where('id', $item)
                                            ->first();
                                    @endphp
                                    @if ($book)
                                        <tr>
                                            <th scope="row">{{ $book->id }}</th>
                                            <td>{{ $book->book_title }}</td>
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
        </ul>

        <p>If you have any questions or concerns about your order, please don't hesitate to contact us.</p>

        <p>Thank you for shopping with us!</p>
    </body>

    </html>
@endsection
