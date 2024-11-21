@php
    $products = $memberbyproduct->products;
@endphp
@if ($products->count() > 0)
    <option value="">Select Product {{ $products->count() }}</option>
    @foreach ($memberbyproduct->products as $product)
        @if ($selectProduct)
            <option value="{{ $product->id }}" {{ ($product->id == $selectProduct->id) ? 'selected':'' }}>{{ $product->product_id }}</option>
        @else
            <option value="{{ $product->id }}">{{ $product->product_id }}</option>
        @endif
    @endforeach
@else
    <option value="">Product Not Found</option>    
@endif


