@extends('auth.template')

@section('content')
    <div class="container">
        <h1>Edit Shipment</h1>
        <form form id="shipment_form" method="POST" action="{{ route('admin.shipments.update', $shipment->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="shipment_date">Shipment Date</label>
                <input id="shipment_date" type="date" class="form-control @error('shipment_date') is-invalid @enderror"
                    name="shipment_date" value="{{ old('shipment_date', $shipment->shipment_date) }}" required autofocus>
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
                            $checked = in_array($item, explode('|', $shipment->shipment_items));
                        @endphp
                        @unless (!$book)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="item_{{ $item }}"
                                    name="shipment_items[]" value="{{ $item }}"
                                    @if ($checked) checked @endif>
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
            <div class="form-group">
                <label for="shipment_sent">Shipment Sent?</label>
                <select name="shipment_sent" id="shipment_sent"
                    class="form-control @error('shipment_sent') is-invalid @enderror" required>
                    <option value="0" @if (!$shipment->shipment_sent) selected @endif>No</option>
                    <option value="1" @if ($shipment->shipment_sent) selected @endif>Yes</option>
                </select>
                @error('shipment_sent')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update Shipment</button>
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
