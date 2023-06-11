<section>
    <style>

        header { grid-area: header; }
        main { grid-area: store; }
        aside { grid-area: cart; }

        .storeContainer{
            display: grid;
            grid-template-areas:
            'header header header header header cart'
            'store store store store store cart'
        }

        .card{
            width: 12rem;
            height: 12rem;
            padding: 70px 0;
            text-align: center;
        }
    </style>

    <section class="storeContainer">
        <header>
            <nav class="navbar" style="border:1px solid lightgray; height: 90px">
                <div class="container-fluid">
                    <ul class="nav nav-underline">
                        <li class="nav-item">
                          <a class="nav-link {{ $productsPage ? "active" : "" }}" wire:click="setProductsPage" style="color :black; fontSize:22px">מוצרים</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link {{ $favoritePage ? "active" : "" }}" wire:click="setFavoritePage" style="color :black; fontSize:22px">מועדפים</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <main>
            <div class="basic-grid">
                @if ($favoritePage==false)
                @foreach ( $products as $product )
                    <div class="card" wire:key="product-{{ $product->id }}" wire:click="setInOrder({{ $product->id }})">
                        @if ( $product->favorite )
                            <svg wire:click="setFavorite({{ $product->id }})" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6" width="30" height="24" style="position:absolute; left:20px; top:20px">
                                <path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                            </svg>
                        @else
                            <svg wire:click="setFavorite({{ $product->id }})" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" width="30" height="24" style="position:absolute; left:20px; top:20px">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <h5 class="card-title">₪{{ $product->price }}</h5>
                        </div>
                    </div>
                @endforeach
                @endif
                @if ($favoritePage)
                    @foreach ( $products as $product )
                        @if ( $product->favorite )
                            <div>
                                <div class="card" wire:key="product-{{ $product->id }}" wire:click="setInOrder({{ $product->id }})">
                                    <svg wire:click="setFavorite({{ $product->id }})" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6" width="30" height="24" style="position:absolute; left:20px; top:20px">
                                        <path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                                    </svg>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <h5 class="card-title">₪{{ $product->price }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </main>
        <aside>
            <table class="table table-hover" style="border:1px solid lightgray">
                <thead style="height:89px">
                    <tr>
                      <th scope="col">יחידות</th>
                      <th scope="col">שם המוצר &nbsp;&nbsp;&nbsp;&nbsp;</th>
                      <th scope="col">סיכום</th>
                      <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $products as $product )
                        <tr>
                            <th scope="row">{{ $product->qty }}</th>
                            <td>{{ $product->name }}</td>
                            <td>₪{{ $product->price }}</td>
                            <td>
                               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                    <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                                </svg>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </aside>
    </section>
</section>




