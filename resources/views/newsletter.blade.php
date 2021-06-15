<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>NewsLetter</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" id="token">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet"  href='{{ asset('css/newsletter.css') }}'>
    <script src="{{asset('js/newsletter.js')}}" defer></script>
</head>

<body>

<section>



    <div>

        <form name="newsletter"  method="post">
            @csrf
            <img src="{{ asset('img/Logo.png')}}">
            <h1>NewsLetter</h1>
                     <span>
                        Se ci comunichi il tuo indirizzo e-mail,
                        riceverai la newsletter mensile che ti aggiorna in anteprima su notizie, eventi, lanci di nuovi prodotti e molto di più!
                    </span>
            <br>
            <br>
            <div>
                <label>
                    <input type="text" name="email" placeholder="E-mail" id="email" >
                </label>
            </div>
            <div>
                <label>
                    <textarea id="description" name="descrizione" rows="4" cols="50" placeholder="Qui puoi farci le tue domande?" ></textarea>
                </label>
            </div>
            <label><input type="submit" id="invio" value="send"></label>
            <div>
                <label id="checker">
                    <input type="checkbox" name="check" value="1"  id="accettazione">
                    <span>Acconsento al trattamento dei miei dati personali</span>
                </label>

            </div>
            <label><span>Vuoi saperne di più?</span> <span><a href="{{ route('registrazione')}}">Registrati</a></span></label>
            <div>
                <label>
                    <a class="button1" href="https://it-it.facebook.com"></a>
                    <a class="button2" href="https://twitter.com/?lang=it"></a>
                    <a class="button3"  href="https://www.instagram.com"></a>
                </label>
            </div>
        </form>

    </div>
</section>


</body>
</html>

