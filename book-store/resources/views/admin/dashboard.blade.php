@extends('auth.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{session('status')}}
                        </div>
                    @endif
                    You are logged in as an administrator!
                </div>
                
                <!-- Add Admin Dashboard Content Here -->
                <div class="card-body">
                    <h5>Admin Dashboard</h5>
                    <br>
                    <h6>Customer list</h6>
                    <ul class="list-group">
                    @foreach($users as $user)
                    <div class="card-body">
                        <li class="list-group-item">Id: {{$user->id}}</li>
                        <li class="list-group-item">Name: {{$user->name}}</li>
                        <li class="list-group-item">Email: {{$user->email}}</li>
                        <li class="list-group-item">Is Admin: 
                            @if($user->is_admin == 1)         
                                Yes      
                            @else
                                No
                            @endif
                        </li>
                    </div>
                    @endforeach
                    </ul>
                    <br>
                    <h6>Book list</h6>
                    <ul class="list-group">
                    @foreach($books as $book)
                    <div class="card-body">
                        <li class="list-group-item">Id: {{$book->id}}</li>
                        <li class="list-group-item">Title: {{$book->book_title}}</li>
                        <li class="list-group-item">Image: <a href="{{$book->book_image}}">{{explode("/", $book->book_image)[1]}}</a></li>
                        <li class="list-group-item">Description: {{$book->book_description}}</li>
                        <li class="list-group-item">Number of pages: {{$book->book_pages}}</li>
                        <li class="list-group-item">Price: {{$book->book_price}}</li>
                    </div>
                    @endforeach
                    </ul>
                    <br>
                    <h6>Order list</h6>
                    <ul class="list-group">
                    @foreach($orders as $order)
                    <div class="card-body">
                        <li class="list-group-item">Customer Id: {{$order->user_id}}</li>
                        <li class="list-group-item">Customer Name: {{$order->user_name}}</li>
                        <li class="list-group-item">Order Items Ids: {{$order->order_items}}</li>
                        <li class="list-group-item">Date: {{$order->order_date}}</li>
                    </div>
                    @endforeach
                    </ul>
                    <br>
                    <h6>Shipment list</h6>
                    <ul class="list-group">
                    @foreach($shipments as $shipment)
                    <div class="card-body">
                        <li class="list-group-item">Order Id: {{$shipment->order_id}}</li>
                        <li class="list-group-item">Shipment Items Ids: {{$order->order_items}}</li>
                        <li class="list-group-item">Date: {{$shipment->shipment_date}}</li>
                    </div>
                    @endforeach
                    </ul>
                    <br>
                    <h6>Category list</h6>
                    <ul class="list-group">
                    @foreach($categories as $category)
                    <li class="list-group-item">{{$category->category_name}}</li>
                    @endforeach
                    </ul>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection