<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Forgot</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href='{{ asset('css/login.css') }}'>
</head>

<body>

<section>



    <div id="main-div">

        <form name="forgot"  action="{{url('/forgot_password')}}" method="post">
            @csrf
            <img src="{{ asset('img/Logo.png')}}">
            <h1>Dimenticato?</h1>
            <div>
                <label>

                    <input type="text" name="email"  id="email" placeholder="email">
                </label>
            </div>

            <div>

                <label> &nbsp <input type="submit" id="invio" value="send"></label>
            </div>
            @if(session('error'))
                <div class ="status">
                    <p class ="error">
                        {{session('error')}}
                    </p>
                </div>
            @endif
            @if(session('success'))
                <div>
                    <p class ="ok">
                        {{session('success')}}
                    </p>
                </div>
            @endif
        </form>

    </div>
</section>



</body>
</html>
