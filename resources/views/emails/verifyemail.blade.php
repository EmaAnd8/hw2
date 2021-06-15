<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Conferma</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href='{{ asset('css/login.css') }}'>
</head>

<body>

<section>



    <div id="main-div">
        @if(session('status'))
            <div class="'alert alert-success" role="alert">{{session('status')}}</div>
        @endif

        <form name="login"  method="post" action="">
            @csrf
            <img src="{{ asset('img/Logo.png')}}">
            <h1>Benvenuto {{$user['name']}}</h1>
            <input type="hidden" name="username" value="{{$user['name']}}">
            <p>usa questo link per attivare l'email</p>
            <a href={{'http://localhost/hw2/public/register/verification/'.urlencode($user['name']).'/'.urlencode($user['verification_code'])}}>clicca qui per verificare la tua email</a>


        </form>

    </div>
</section>



</body>
</html>
