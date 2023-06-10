<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>laravel-demo-mission</title>
</head>
<style>
    .store-header { grid-area: store-header; }
    .cart-header { grid-area: cart-header; }
    .store { grid-area: store; }
    .cart { grid-area: cart; }
    .footer { grid-area: footer}

    .appContainer{
        display: grid;
        grid-template-areas:
        'store-header store-header store-header store-header store-header cart-header'
        'store store store store store cart'
        'footer footer footer footer footer footer'
    }
</style>
<body>
    <div class="appContainer">
        <!-- App's NavBar -->
        <div class="store-header">
            <x-store-header/>
        </div>
        <div class="cart-header">
            <x-cart-header/>
        </div>
        <!-- App's Store Component-->
        <div class="store">
            <x-store :products="$products"/>
        </div>
        <!-- App's Shopping Cart -->
        <div class="cart" >
            <x-cart :products="$products"/>
        </div>
        <!-- App's Footer-->
        <div className="footer" style="justifyContent:center">
            <x-footer/>
        </div>
    </div>
</body>
</html>
