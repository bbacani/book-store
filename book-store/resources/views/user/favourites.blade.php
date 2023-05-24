@extends('auth.template')

@section('content')
<div class="container">
    @if(!is_null($user))
    @if(count($books) > 0)
    <h3>Favourites</h3>
    <div class="card">
        <div class="card-header">
            Books
        </div>
        @include('books.info', ['books'=>$books])
    </div>
    @else
    <h3>No favourites</h3>
    @endif
    @else
    <h3>Not authorized</h3>
    @endif
</div>
@endsection