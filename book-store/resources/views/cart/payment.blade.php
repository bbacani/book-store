@extends('auth.template')

@section('content')
<div class="d-flex justify-content-center align-items-center">
    <form action="{{ route('cart.buy') }}">
        @csrf
        <button type="submit" class="btn btn-primary btn-sm">Buy</button>
    </form>
    <form action="{{ route('cart.cart') }}">
        @csrf
        <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
    </form>
</div>
@endsection