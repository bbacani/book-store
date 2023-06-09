@extends('auth.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <!-- Left Side Menu -->
            <div class="list-group">
                <a href="#users" class="list-group-item list-group-item-action" data-bs-toggle="pill">Users</a>
                <a href="#orders" class="list-group-item list-group-item-action" data-bs-toggle="pill">Orders</a>
                <a href="#shipments" class="list-group-item list-group-item-action" data-bs-toggle="pill">Shipments</a>
                <a href="#books" class="list-group-item list-group-item-action" data-bs-toggle="pill">Books</a>
                <a href="#authors" class="list-group-item list-group-item-action" data-bs-toggle="pill">Authors</a>
                <a href="#categories" class="list-group-item list-group-item-action" data-bs-toggle="pill">Categories</a>
            </div>
            @if($count >= 0)
            <b>Favourite book:</b>
            <div>{{$fav_book->book_title}}</div>
            <div><b>Count:</b> {{$count}}</div>
            @else
            <b>Users haven't picked a favourite book!</b>
            @endif
        </div>
        <div class="col-md-9">
            <!-- Right Side Content -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Admin Dashboard</h5>
                </div>

                @if (session('status'))
                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                </div>
                @endif

                <!-- Content Sections -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade" id="users">
                            @include('admin.users.list')
                        </div>
                        <div class="tab-pane fade" id="orders">
                            @include('admin.orders.list')
                        </div>
                        <div class="tab-pane fade" id="shipments">
                            @include('admin.shipments.list')
                        </div>
                        <div class="tab-pane fade" id="books">
                            @include('admin.books.list')
                        </div>
                        <div class="tab-pane fade" id="authors">
                            @include('admin.authors.list')
                        </div>
                        <div class="tab-pane fade" id="categories">
                            @include('admin.categories.list')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection