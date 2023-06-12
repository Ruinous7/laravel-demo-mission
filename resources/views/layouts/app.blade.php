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
    /*.store-header { grid-area: store-header; }
    .cart-header { grid-area: cart-header; }
    main {grid-area: main;}

    .appContainer{
        display: grid;
        grid-template-areas:
        'header-header header-header header-header header-header header-header cart-header'
        'main main main main main main'

    }*/
</style>
<body class="appContainer">
@livewireStyles
    <header>
        <x-store-header class="store-header"/>
    </header>
    <main>
        @livewire('store')
    </main>
    <x-made-by/>
@livewireScripts
</body>
</html>
