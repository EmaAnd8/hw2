<h1>Ciao {{ $user['username']}} </h1>
<p>

    Clicca sul seguente link per resettare la password
    <a href ="{{url('reset_password/'.$user['email'].'/'.$code) }}">Reset Password</a>

</p>
