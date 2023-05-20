<h5 class="d-flex justify-content-between">
    <span>Shipment List</span>
</h5>

<ul class="list-group shipment-list">
    @foreach ($shipments as $shipment)
        <li class="list-group-item">
            <div class="card-body">
                <div>
                    <p><strong>Order ID:</strong> {{ $shipment->order_id }}</p>
                    <p><strong>Shipment Address:</strong> {{ $shipment->shipment_address }}</p>
                    <div class="card">
                        <div class="card-body">
                            <h6><strong>Shipment Items:</strong></h6>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">{{ __('ID') }}</th>
                                        <th scope="col">{{ __('Title') }}</th>
                                        <th scope="col">{{ __('Image') }}</th>
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
                                                <td>{{ $book->id }}</td>
                                                <td>{{ $book->book_title }}</td>
                                                <td>
                                                    <a href="{{ $book->book_image }}" target="_blank">
                                                        <img src="{{ $book->book_image }}"
                                                            alt="{{ $book->book_title }}" height="50">
                                                    </a>
                                                </td>
                                                <td>{{ $book->book_price }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <p><strong>Shipment Date:</strong> {{ $shipment->shipment_date }}</p>
                    <p><strong>Shipment Sent:</strong>
                        @if ($shipment->shipment_sent == 1)
                            Yes
                        @else
                            No
                        @endif
                    </p>
                </div>
                <div class="d-flex">
                    <a href="{{ route('admin.shipments.edit', $shipment->id) }}"
                        class="btn btn-warning btn-lg">Edit</a>
                    <form action="{{ route('admin.shipments.destroy', $shipment->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-lg">Delete</button>
                    </form>
                </div>
            </div>
        </li>
    @endforeach
</ul>
