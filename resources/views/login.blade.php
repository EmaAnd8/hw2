
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href='{{ asset('css/login.css') }}'>
</head>

<body>

<section>



    <div id="main-div">

        <form name="login"  method="post">
            @csrf
            <img src="{{ asset('img/Logo.png')}}">
            <h1>Accedi</h1>
            <div>
                <label>

                    <input type="text" name="username"  id="user" placeholder="Username"  maxlength="15">
                </label>
            </div>

            <div id="pwd-div">
                <label>

                    <input type="password" name="password"  id="pwd" placeholder="Password" maxlength="15">
                </label>
            </div>


            <div>

                <label> &nbsp <input type="submit" id="invio" value="Login"></label>
            </div>


            <label><span>Non hai un account?</span> <span><a href="{{route("registrazione")}}">Registrati</a></span></label>
            <label><span><a href="{{route("forgot")}}">Hai dimenticato la password?</a></span></label>
            @if($error!==''&&$error!==null)
                <span class="error">{{$error}}</span>
            @endif
        </form>

    </div>
</section>



</body>
</html>
