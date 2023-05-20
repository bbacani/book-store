<h5 class="d-flex justify-content-between">
    <span>Order List</span>
</h5>

<ul class="list-group order-list">
    @foreach ($orders as $order)
        <li class="list-group-item">
            <div class="card-body">
                <div>
                    <p><strong>User ID:</strong> {{ $order->user_id }}</p>
                    <p><strong>User Name:</strong> {{ $order->user_name }}</p>
                    <p><strong>User Address:</strong> {{ $order->user_address }}</p>
                    <div class="card">
                        <div class="card-body">
                            <h6><strong>Order Items:</strong></h6>
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
                                    @foreach (explode('|', $order->order_items) as $bookId)
                                        @php $book = $books->firstWhere('id', $bookId); @endphp
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
                    <p><strong>Order Subtotal:</strong> {{ $order->order_subtotal }}</p>
                    <p><strong>Order Date:</strong> {{ $order->order_date }}</p>
                </div>
                <div class="d-flex">
                    <a href="{{ route('admin.shipments.create', $order->id) }}" class="btn btn-primary btn-lg">Ship</a>
                    <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-lg">Delete</button>
                    </form>
                </div>
            </div>
        </li>
    @endforeach
</ul>
