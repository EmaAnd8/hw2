<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <script src="{{asset('js/menu.js')}}" defer></script>
    <link rel="stylesheet" href="{{asset('/css/menu.css')}}">
    @yield('script')
    @yield('stile')
</head>

<body>
<div class="style">

    <header>

        <nav>
            <img src="{{ asset('img/Logo.png') }}" id="XL">


            <a href="{{route('home')}}">home</a>
            <a  href="{{route('artisti')}}">artisti</a>
            <a href="{{route('album')}}">album</a>
            <a href="{{route('autori')}}">autori</a>
            <a href="{{route('logout')}}">Logout</a>
            <div id="menu">
                <div></div>
                <div></div>
                <div></div>
            </div>


        </nav>

    </header>


</div>


<main>
    <div id="template">

<section id="profile">
    <div>
        <img src="{{ asset('img/contattaci.png') }}">
        <h1>Benvenuto {{$user['username']}}</h1>
        @yield('paragrafo')
    </div>
</section>


   @yield('content')



        <section class="hidden" id="modal-view">

        </section>
</div>

    @yield('iframes')
</main>


<!-- per menu a scomparsa -->
<section id="modal-view_1" class="hidden">
    <!-- <div id="close"></div>-->
    <div id="links">
        <a href="{{route('home')}}">home</a>
        <a  href="{{route('artisti')}}">artisti</a>
        <a href="{{route('album')}}">album</a>
        <a href="{{route('autori')}}">autori</a>
        <a href="{{route('logout')}}">Logout</a>
        <img src="{{asset('img/delete.png')}}">
    </div>
</section>

<footer class="style">
    <em>&copy; DBrecords srl</em>
    <address>Via Nazionale (RM)</address>
    <p>nome:Emanuele Andaloro Matricola:O46002006</p>
    <br>
    <a class="button1" href="https://it-it.facebook.com"></a>
    <a class="button2" href="https://twitter.com/?lang=it"></a>
    <a class="button3"  href="https://www.instagram.com"></a>
</footer>

</body>
</html>
