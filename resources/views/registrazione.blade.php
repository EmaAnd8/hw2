<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Sign up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{asset('js/signup.js')}}" defer></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href='{{ asset('css/registrazione.css') }}'>
</head>

<body>



<main>
    <section id="locus">
        <div id="logo" >
            <img src="{{ asset('img/concert.jpg')}}">
        </div>
    </section>

    <section id="locus-form">





        <div id="main-div">

            <form name="registration"  method="post">
                @csrf
                <img src="{{ asset('img/Logo.png')}}">
                <h1>Registrati</h1>
                <div>
                    <label>

                        <input type="text" name="username"  id="user" placeholder="Username"  maxlength="15">
                    </label>
                </div>


                <div >
                    <label>

                        <input type="text" name="nome" id="name" placeholder="Nome" >
                    </label>
                </div>
                <div >
                    <label>

                        <input type="text" name="cognome" id="surname" placeholder="Cognome" >
                    </label>
                </div>
                <div>
                    <label>

                        <input type="text" name="email"  id="e-mail"  placeholder="Email">
                    </label>
                </div>
                <div>
                    <label>

                        <input type="text" name="conferma_email"  id="conferma_mail" placeholder="Conferma Email" >
                    </label>
                </div>
                <div>
                    <label>

                        <input type="password" name="password"  id="pwd" placeholder="Password"  maxlength="15">
                    </label>
                </div>

                <div>
                    <label>

                        <input type="password" name="conferma_password"  id="conferma_pwd" placeholder="Conferma Password"  maxlength="15">
                    </label>
                </div>

                <div>

                    <label> &nbsp <input type="submit" id="invio" value="Sign up"></label>
                </div>
                <div>
                    <label id="checker">
                        <input type="checkbox" name="check[]" value="1"  id="accettazione">
                        <span>Acconsento al trattamento dei miei dati personali</span>
                    </label>

                </div>

                <label><span>Hai un account?<a href="{{route("login")}}">Accedi</a> o <a href="{{route("newsletter")}}">Newsletter</a></span> </label>
            </form>

        </div>
    </section>
</main>

</body>
</html>

