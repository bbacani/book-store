@extends('auth.template')

@section('content')
<div>
    @if(count($books) > 0)
    <h3>Cart items</h3>
    <div class="card">
        @include('books.info', ['books'=>$books])
        <div class="card-footer text-right d-flex justify-content-between align-items-center">
            <div>
                <h4>Subtotal: {{$subtotal}}</h3>
            </div>

            <form action="{{ route('cart.payment', $subtotal) }}">
                @csrf
                <button type="submit" class="btn btn-primary btn-sm">Proceed to checkout</button>
            </form>
        </div>
    </div>
    @else
    <h3>Cart is empty</h3>
    @endif
</div>
@endsection