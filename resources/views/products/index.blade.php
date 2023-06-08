@extends('products.layout')

@section('content')

@foreach ( $products as $product )

<div class="container">
    <ul>
        <li><b>{{ $product->name }}</b></li>
        <li>{{ $product->price }}</></li>
        <li>{{ $product->discount }}</></li>
        <li>{{ $product->favorite == '1' ? "Favorite Item" : " Not a Favorite Item" }}</></li>
    </ul>
</div>

@endforeach

@endsection
