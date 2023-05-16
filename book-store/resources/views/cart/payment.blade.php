@extends('auth.template')

@section('content')
<div class="d-flex justify-content-center align-items-center">
    <form action="{{ route('cart.buy', true) }}">
        @csrf
        <button type="submit" class="btn btn-primary btn-sm">Buy</button>
    </form>
    <form action="{{ route('cart.buy', false) }}">
        @csrf
        <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
    </form>
</div>
@endsection