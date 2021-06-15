<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Reset Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href='{{ asset('css/login.css') }}'>
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <script src="{{asset('js/resetpassword.js')}}"  type="text/javascript" defer></script>
</head>

<body>

<section>



    <div id="main-div">

        <form name="reset"  action ="{{url('/reset_password/'.$user->email.'/'.$code)}}" method="post">
            {{csrf_field()}}
            <img src="{{ asset('img/Logo.png')}}">
            <h1>Reset</h1>
            <div>
                <label>

                    <input type="password" name="password"  id="password" placeholder="password">
                </label>
            </div>

            <div>
                <label>

                    <input type="password" name="conferma_password"  id="conferma_password" placeholder="conferma password">
                </label>
            </div>

            <div>

                <label> &nbsp <input type="submit" id="invio" value="send"></label>
            </div>
        </form>

    </div>
</section>
