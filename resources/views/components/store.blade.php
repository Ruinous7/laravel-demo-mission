
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
<div>
    <nav class="navbar" style="border:1px solid lightgray; height: 90px">
        <div class="container-fluid">
            <ul class="nav nav-underline">
                <li class="nav-item">
                  <a class="nav-link" style="color :black; fontSize:22px">מוצרים</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" style="color :black; fontSize:22px">מועדפים</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<section>
    <br>
    <div class="basic-grid">
        @foreach ( $products as $product )
            <div class="card">
                <img src="https://img.icons8.com/?size=512&id=104&format=png" alt="Logo" width="30" height="24" style="position:absolute; left:20px; top:20px"/>
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <h5 class="card-title">₪{{ $product->price }}</h5>
                </div>
            </div>
        @endforeach
    </div>
</section>



