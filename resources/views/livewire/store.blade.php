<section>

    <!-- Store's Styling -->

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

        .card-container{
            display: grid;
            justify-content: center;
            grid-template-columns:repeat(3,1fr)
        }

        .card{
            box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
            width: 12rem;
            height: 6rem;
            text-align: center;
        }
    </style>

    <section class="storeContainer">

        <!-- Store's Header  -->

        <header>
            <nav class="navbar" style="border:1px solid lightgray; height: 90px">
                <div class="container-fluid">
                    <!-- Task 1, 2 (Client Side) - Navigating Between Product's and Favorite's. -->
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

        <!-- Store's Product's  -->

        <main class="card-container" style="position:relative">
            @if ($favoritePage==false)
            @foreach ( $products as $product )
                <div class="card" wire:key="product-{{ $product->id }}" >
                    @if ( $product->favorite )
                        <!-- Task 4 (Client Side) - Setting Product as Favorite(true/false) & Changing it's data in the DB  -->
                        <svg wire:click="setFavorite({{ $product->id }})" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6" width="30" height="24" style="position:absolute; left:20px; top:20px">
                            <path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                        </svg>
                    @else
                        <svg wire:click="setFavorite({{ $product->id }})" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" width="30" height="24" style="position:absolute; left:20px; top:20px">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                    @endif
                    <!-- Task 5 (Client Side) - Setting Product in the Cart when clicked on & and changing it's 'cart_item'->'qty' value counterpart in the DB -->
                    <div class="card-body" wire:click.lazy="setInOrder({{ $product->id }})">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <h5 class="card-title">₪{{ $product->price }}</h5>
                    </div>
                </div>
            @endforeach
            @endif
            @if ($favoritePage)
                @foreach ( $products as $product )
                    @if ( $product->favorite )
                        <div class="card" wire:key="product-{{ $product->id }}">
                            <svg wire:click="setFavorite({{ $product->id }})" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6" width="30" height="24" style="position:absolute; left:20px; top:20px">
                                <path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                            </svg>
                            <div class="card-body" wire:click.lazy="setInOrder({{ $product->id }})" >
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <h5 class="card-title">₪{{ $product->price }}</h5>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </main>

        <!-- Store's Shopping Cart  -->

        <aside>
            <table class="table table-hover" style="border:1px solid lightgray">

                <!-- Shopping Cart's Header  -->

                <thead style="height:89px">
                    <tr>
                        <th scope="col">
                            <div style="position:relative; top:-20px">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="30" height="24" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                </svg>
                                סל מוצרים
                            </div>
                            יחידות
                        </th>
                        <th scope="col">שם המוצר</th>
                        <th scope="col">סיכום</th>
                    </tr>
                </thead>

                <!-- Task 3 (Client Side) - Displaying Cart Items  -->

                <tbody>
                    @foreach ( $cart_items as $product )
                        @if($product->qty>0)
                            <tr>
                                <th scope="row">{{ $product->qty }}</th>
                                <td>
                                    {{ $product->name }}<br><span style="font-size: 14px">₪{{ $product->price_num }}</span>
                                    @if($product->discount_num>0)<span style="font-size: 14px">/ {{ $product->discount_num }}% הנחה</span>
                                    @endif
                                </td>
                                <td>
                                    <!-- Task 6 (Client Side) - Displaying the Product's final Price with discount & quantity calculated -->
                                    @if($product->discount_num==0)
                                        ₪{{ $product->price_sum }}
                                        <!-- Task 7 (Client Side) - Removing the Product from the Cart when clicked on & and changing it's 'cart_item'->'qty' value counterpart in the DB -->
                                        <svg wire:click="removeFromOrder({{ $product->id }})" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6" width="24" height="18">
                                            <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                                        </svg>
                                    @else
                                        ₪{{ $product->price_sum }}
                                        <svg wire:click="removeFromOrder({{ $product->id }})" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6" width="24" height="18">
                                            <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                                        </svg>
                                        <br><span style="font-size: 14px">-₪{{ $product->discount_sum }}</span>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    <!-- Task 8 (Client Side) - Displaying the Carts Final Sum with Vat Included -->
                    <tr>
                        <th>%17 מע"מ</th>
                        <th></th>
                        <th>{{ number_format($vat,2) }}</th>
                    </tr>
                    <tr>
                        <th>סה"כ</th>
                        <th></th>
                        <th>{{  number_format($totalSum,2) }}</th>
                    </tr>
                </tbody>
            </table>
        </aside>
    </section>
</section>




