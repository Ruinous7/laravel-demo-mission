
@props(['products'])

<style>
    .basic-grid {
      display: grid;
      gap: 1px;
      grid-template-columns: repeat(5,1fr) ;
      justify-content: center;
    }

    .card{
        width: 12rem;
        height: 12rem;
        padding: 70px 0;
        text-align: center;
    }
</style>

<div class="basic-grid">
    @foreach ( $products as $product )
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
            </div>
        </div>
    @endforeach
</div>


