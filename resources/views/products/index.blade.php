@extends('products.layout')

@section('content')

<style>

    .basic-grid {
      display: grid;
      gap: 2rem;
      grid-template-columns: repeat(5,1fr) ;
      justify-content: center;
    }

</style>

<div>
    <header>
        <nav class="navbar" style="border:1px solid lightgray; height: 90px">
            <div class="container-fluid">
                <ul class="nav nav-underline">
                    <li class="nav-item">
                      <a class="nav-link">מוצרים</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link">מועדפים</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <section>
    </section>
</div><br>

<section class="basic-grid">
    @foreach ( $products as $product )

        <x-product-card :product="$product"/>

    @endforeach
</section>


@endsection
