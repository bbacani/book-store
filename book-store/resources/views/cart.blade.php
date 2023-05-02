@extends('auth.template')

@section('content')
<div>
    <h3>Cart items</h3>
    <ul>
        @foreach(explode('|',$cart->order_items) as $bookid)
        <li>{{ $bookid }}</li>
        @endforeach
        </ol>
</div>
@endsection