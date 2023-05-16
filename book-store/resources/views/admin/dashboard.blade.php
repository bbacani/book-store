@extends('auth.template')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Admin Dashboard
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>

                    <!-- Add Admin Dashboard Content Here -->
                    <div class="card-body">
                        <h5 class="d-flex justify-content-between">
                            <span>Customer list</span>
                            <button class="btn btn-secondary btn-sm toggle-list">Hide</button>
                        </h5>
                        <ul class="list-group customer-list">
                            @foreach ($users as $user)
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <div>
                                        <li class="list-group-item">Id: {{ $user->id }}</li>
                                        <li class="list-group-item">Name: {{ $user->name }}</li>
                                        <li class="list-group-item">Email: {{ $user->email }}</li>
                                        <li class="list-group-item">Is Admin:
                                            @if ($user->is_admin == 1)
                                                Yes
                                            @else
                                                No
                                            @endif
                                        </li>
                                    </div>
                                    <div>
                                        <a href="{{ route('admin.users.edit', $user->id) }}"
                                            class="btn btn-warning btn-lg ml-2">Edit</a>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-lg">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </ul>
                        <br>

                        <h5 class="d-flex justify-content-between">
                            <span>Order list</span>
                            <button class="btn btn-secondary btn-sm toggle-list">Hide</button>
                        </h5>
                        <ul class="list-group order-list">
                            @foreach ($orders as $order)
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <div>Customer Id: {{ $order->user_id }}</div>
                                            <div>Customer Name: {{ $order->user_name }}</div>
                                            <div>Order Items Ids: {{ $order->order_items }}</div>
                                            <div>Order Completed:
                                                @if ($order->order_completed == 1)
                                                    Yes
                                                @else
                                                    No
                                                @endif
                                            </div>
                                            <div>Date: {{ $order->order_date }}</div>
                                        </div>
                                        <div>
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
                        <br>

                        <h5 class="d-flex justify-content-between">
                            <span>Shipment list</span>
                            <button class="btn btn-secondary btn-sm toggle-list">Hide</button>
                        </h5>
                        <ul class="list-group shipment-list">
                            @foreach ($shipments as $shipment)
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <div>Order Id: {{ $shipment->order_id }}</div>
                                            <div>Shipment Items Ids: {{ $shipment->shipment_items }}</div>
                                            <div>Shipment Completed:
                                                @if ($shipment->shipment_completed == 1)
                                                    Yes
                                                @else
                                                    No
                                                @endif
                                            </div>
                                            <div>Date: {{ $shipment->shipment_date }}</div>
                                        </div>
                                        <div>
                                            <form action="{{ route('admin.shipments.destroy', $shipment->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-lg">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <br>

                        <h5 class="d-flex justify-content-between">
                            <span>Book list</span>
                            <button class="btn btn-secondary btn-sm toggle-list">Hide</button>
                        </h5>
                        <div class="card book-list">
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Pages</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($books as $book)
                                            <tr>
                                                <th scope="row">{{ $book->id }}</th>
                                                <td>{{ $book->book_title }}</td>
                                                <td>
                                                    <a href="{{ $book->book_image }}" target="_blank">
                                                        <img src="{{ $book->book_image }}" alt="{{ $book->book_title }}"
                                                            height="50">
                                                    </a>
                                                </td>
                                                <td>{{ $book->book_description }}</td>
                                                <td>{{ $book->book_pages }}</td>
                                                <td>{{ $book->book_price }}</td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Book actions">
                                                        <a href="{{ route('admin.books.edit', $book->id) }}"
                                                            class="btn btn-warning btn-sm">Edit</a>
                                                        <form action="{{ route('admin.books.destroy', $book->id) }}"
                                                            method="POST" style="display: inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm">Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('admin.books.create') }}" class="btn btn-primary btn-sm">Add Book</a>
                            </div>
                        </div>
                        <br>

                        <h5 class="d-flex justify-content-between">
                            <span>Category list</span>
                            <button class="btn btn-secondary btn-sm toggle-list">Hide</button>
                        </h5>
                        <div class="card category-list">
                            <div class="card category-list">
                                <div class="card-body">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $category)
                                                <tr>
                                                    <th scope="row">{{ $category->id }}</th>
                                                    <td>{{ $category->category_name }}</td>
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Category actions">
                                                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                                                                class="btn btn-warning btn-sm">Edit</a>
                                                            <form
                                                                action="{{ route('admin.categories.destroy', $category->id) }}"
                                                                method="POST" style="display: inline-block;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm">Delete</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer text-right">
                                    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm">Add
                                        Category</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
