@extends('auth.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <!-- Left Side Menu -->
                <div class="list-group">
                    <a href="#profile" class="list-group-item list-group-item-action" data-bs-toggle="pill">Profile</a>
                    <a href="#orders" class="list-group-item list-group-item-action" data-bs-toggle="pill">Orders</a>
                    <a href="#shipments" class="list-group-item list-group-item-action" data-bs-toggle="pill">Shipments</a>
                </div>
            </div>
            <div class="col-md-9">
                <!-- Right Side Content -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">User Dashboard</h5>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>

                    <!-- Content Sections -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade" id="profile">
                                <div class="card">
                                    <div class="card-header">
                                        User Profile
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group">
                                            <li class="list-group-item">Name: {{ $user->name }}</li>
                                            <li class="list-group-item">Email: {{ $user->email }}</li>
                                            <li class="list-group-item">Address: {{ $user->address }}</li>
                                        </ul>
                                        <a href="{{ route('user.update.address.get') }}" class="btn btn-primary mt-3">Update
                                            Address</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="orders">
                                <div class="card">
                                    <div class="card-header">
                                        Order List
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group">
                                            @foreach ($orders as $order)
                                                <li class="list-group-item">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Order Details</h5>
                                                            <table class="table table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">ID</th>
                                                                        <th scope="col">Title</th>
                                                                        <th scope="col">Pages</th>
                                                                        <th scope="col">Price</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach (explode('|', $order->order_items) as $bookId)
                                                                        @php $book = App\Models\Book::find($bookId); @endphp
                                                                        @if ($book)
                                                                            <tr>
                                                                                <th scope="row">{{ $book->id }}</th>
                                                                                <td>{{ $book->book_title }}</td>
                                                                                <td>{{ $book->book_pages }}</td>
                                                                                <td>{{ $book->book_price }}</td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                            <p class="card-text">
                                                                Order Subtotal: {{ $order->order_subtotal }}
                                                            </p>
                                                            <p class="card-text">
                                                                Order Date: {{ $order->order_date }}
                                                            </p>
                                                            <p class="card-text">
                                                                Order Completed:
                                                                {{ $order->order_completed ? 'Yes' : 'No' }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="shipments">
                                <div class="card">
                                    <div class="card-header">
                                        Shipment List
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group">
                                            @foreach ($shipments as $shipment)
                                                <li class="list-group-item">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Shipment Details</h5>
                                                            <table class="table table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">ID</th>
                                                                        <th scope="col">Title</th>
                                                                        <th scope="col">Pages</th>
                                                                        <th scope="col">Price</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach (explode('|', $shipment->shipment_items) as $bookId)
                                                                        @php $book = App\Models\Book::find($bookId); @endphp
                                                                        @if ($book)
                                                                            <tr>
                                                                                <th scope="row">{{ $book->id }}</th>
                                                                                <td>{{ $book->book_title }}</td>
                                                                                <td>{{ $book->book_pages }}</td>
                                                                                <td>{{ $book->book_price }}</td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                            <p class="card-text">
                                                                Shipment Date: {{ $shipment->shipment_date }}
                                                            </p>
                                                            <p class="card-text">
                                                                Shipment Sent:
                                                                {{ $shipment->shipment_sent ? 'Yes' : 'No' }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
