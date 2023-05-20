<h5 class="d-flex justify-content-between">
    <span>Order List</span>
    <button class="btn btn-secondary btn-sm toggle-list">Hide</button>
</h5>
<ul class="list-group order-list">
    @foreach ($orders as $order)
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <li class="list-group-item">User Id: {{ $order->user_id }}</li>
                <li class="list-group-item">User Name: {{ $order->user_name }}</li>
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
                                        @php $book = $books->firstWhere('id', $bookId); @endphp
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
            <div class="d-flex">
                <a href="{{ route('admin.shipments.create', $order->id) }}" class="btn btn-primary btn-lg">Ship
                </a>
                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-lg">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
</ul>
<br>
