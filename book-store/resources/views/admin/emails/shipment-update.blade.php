@extends('auth.template')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Shipment Update</title>
    </head>

    <body>
        <p>Dear {{ $shipment->order->user->name }},</p>

        <p>We wanted to let you know that there has been an update to your shipment.</p>

        <p>Your order has been shipped to the following address:
            <br><b>{{ $shipment->shipment_address }}</b></br>.
        </p>

        <p>The following items have been shipped:</p>

        <ul>
            <li><strong>Shipment Id:</strong> {{ $shipment->id }}</li>
            <li class="list-group-item">Shipment Items: <div class="card">
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
                                @foreach (explode('|', $shipment->shipment_items) as $item)
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
            <li class="list-group-item">Shipment Date: {{ $shipment->shipment_date }}</li>
            <li class="list-group-item">Shipment Sent:
                @if ($shipment->shipment_sent == 1)
                    Yes
                @else
                    No
                @endif
            </li>
        </ul>

        <p>If you have any questions or concerns about your shipment, please don't hesitate to contact us.</p>

        <p>Thank you for shopping with us!</p>
    </body>

    </html>
@endsection
