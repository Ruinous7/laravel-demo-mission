@props(['product'])

<style>

    .card{
        width: 12rem;
        height: 12rem;
        padding: 70px 0;
        text-align: center;
    }

</style>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $product->name }}</h5>
    </div>
</div>