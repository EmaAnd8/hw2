

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
                     <meta charset="utf-8">
                     <meta name="viewport" content="width=device-width, initial-scale=1">
                     <meta name="csrf-token" content="{{ csrf_token() }}" id="token" >
                     <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
                     <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
                     <link rel="stylesheet" href='{{ asset('css/home.css') }}'>
                     <script src="{{ asset('js/home_inter.js') }}" defer></script>
                     <title>home</title>
                     </head>

            <body>

                <div class="style">

                     <header>

                         <nav>
                                <img src="{{ asset('img/Logo.png') }}" id="XL">
                                <div id="search">
                                 <img src="{{ asset('img/Ricerca.png ') }}">
                                 <input type="text" id="X12">
                                 </div>

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


                    <section id="profile">
                        <div>
                            <img src="{{ asset('img/contattaci.png') }}">
                            <h1>Benvenuto {{$user['username']}}</h1>
<p>
    La tua home page personalizzata ti offre tutta la musica che ami in un unico posto.
    Dai un'occhiata ai tuoi consigli e inizia ad ascoltare: più musica ascolti, migliori saranno i consigli che otterrai!
</p>
</div>
</section>


<main id="main-container">
    @csrf
    <section id="contents">

        <div id="container1" >
            <h1>Album</h1>
            <div class="X1234">
            </div>
        </div>
        <div id="container2" >
            <h1>Tracks</h1>
            <div class="X1234">
            </div>
        </div>
        <div id="container3">
            <h1>Artists</h1>
            <div class="X1234">
            </div>
        </div>

    </section>
    <section id="contents_hidden">


        <div id="cont-container1" class="hidden">
            <h1>Album</h1>
            <div class="X1234">
            </div>
        </div>
        <div id="cont-container2" class="hidden">
            <h1>Tracks</h1>
            <div class="X1234">
            </div>
        </div>
        <div id="cont-container3" class="hidden">
            <h1>Artists</h1>
            <div class="X1234">
            </div>
        </div>

    </section>

</main>

<main  id="lyrics">


    <section>
        <h1>Cerca la canzone che ti piace!</h1>

        <form>
            <div>
                <label>

                    <input type="text" name="artista"  id="artist" placeholder="Artista" >
                </label>
            </div>

            <div>
                <label>

                    <input type="text" name="titolo"  id="song" placeholder="titolo canzone">
                </label>
            </div>

            <div>

                <label> &nbsp <input type="button" id="invio" value="cerca"></label>
            </div>

        </form>
        <iframe class="hidden" src="" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>


    </section>

    <section>
        <div id="testo">

        </div>
    </section>

</main>

   <!-- per menu a scomparsa -->
    <section id="modal-view" class="hidden">
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





