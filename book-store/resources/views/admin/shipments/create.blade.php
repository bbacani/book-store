@extends('auth.template')

@section('content')
    <div class="container">
        <h1>Create Shipment</h1>
        <form id="shipment_form" method="POST" action="{{ route('admin.shipments.store', $order->id) }}">
            @csrf
            <div class="form-group">
                <label for="shipment_date">Shipment Date</label>
                <input id="shipment_date" type="date" class="form-control @error('shipment_date') is-invalid @enderror"
                    name="shipment_date" value="{{ old('shipment_date') }}" required autofocus>
                @error('shipment_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="shipment_items">Shipment Items</label>
                <div class="checkbox-list">
                    @foreach (explode('|', $order->order_items) as $item)
                        @php
                            $book = DB::table('books')
                                ->where('id', $item)
                                ->first();
                        @endphp
                        @unless (!$book)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="item_{{ $item }}"
                                    name="shipment_items[]" value="{{ $item }}">
                                <label class="form-check-label" for="item_{{ $item }}">
                                    {{ $book->book_title }} - Price: {{ $book->book_price }}
                                </label>
                            </div>
                        @endunless
                    @endforeach
                </div>
                @error('shipment_items')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Ship Items</button>
        </form>
    </div>

    <script>
        document.getElementById('shipment_form').addEventListener('submit', function(event) {
            const checkboxes = document.querySelectorAll('input[type="checkbox"][name="shipment_items[]"]');
            let checked = false;
            checkboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    checked = true;
                }
            });
            if (!checked) {
                event.preventDefault();
                alert('Please select at least one shipment item.');
            }
        });
    </script>
@endsection
