<h5 class="d-flex justify-content-between">
    <span>Shipment List</span>
</h5>
<ul class="list-group shipment-list">
    @foreach ($shipments as $shipment)
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <li class="list-group-item">Order Id: {{ $shipment->order_id }}</li>
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
                                                        <img src="{{ $book->book_image }}"
                                                            alt="{{ $book->book_title }}" height="50">
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
            <div class="d-flex">
                <a href="{{ route('admin.shipments.edit', $shipment->id) }}" class="btn btn-warning btn-lg">Edit
                </a>
                <form action="{{ route('admin.shipments.destroy', $shipment->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-lg">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
</ul>
<br>
