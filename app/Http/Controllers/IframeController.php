<?php


namespace App\Http\Controllers;
use Illuminate\Routing\Controller;

class IframeController extends Controller
{
    function spotify_coll(){

        $client_id ='5e0eb8e9638f4e71ba88af27c4267176';
        $client_secret ='3e582b3e58e34bfba979b121f1261521';

        // ACCESS TOKEN
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://accounts.spotify.com/api/token');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        # Eseguo la POST
        curl_setopt($ch, CURLOPT_POST, 1);
        # Setto body e header della POST
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret)));
        $token=json_decode(curl_exec($ch), true);
        curl_close($ch);


        // QUERY EFFETTIVA
        $query = urlencode($_GET["q"]);
        $query_2 = urlencode($_GET["artist"]);
        $type=urlencode($_GET['type']);
        $url = 'https://api.spotify.com/v1/search?q='.$query.'&artist:'.$query_2.'&type='.$type.'&limit=3';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        # Imposto il token
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token['access_token']));
        $res=curl_exec($ch);
        curl_close($ch);

        echo $res;
    }



    function spotify_coll_2(){

        //$client_id = env('SPOTIFY_CLIENT_ID');
        //$client_secret = env('SPOTIFY_CLIENT_SECRET');
        $client_id ='5e0eb8e9638f4e71ba88af27c4267176';
        $client_secret ='3e582b3e58e34bfba979b121f1261521';

        // ACCESS TOKEN
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://accounts.spotify.com/api/token');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        # Eseguo la POST
        curl_setopt($ch, CURLOPT_POST, 1);
        # Setto body e header della POST
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret)));
        $token=json_decode(curl_exec($ch), true);
        curl_close($ch);



        $url = 'https://api.spotify.com/v1/recommendations?limit=5&seed_artists=7oPftvlwr6VrsViSDV7fJY&seed_genres=rock&seed_tracks=1hwJKpe0BPUsq6UUrwBWTw';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        # Imposto il token
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token['access_token']));
        $res=curl_exec($ch);
        curl_close($ch);

        echo $res;
    }




    function spotify_coll_3(){

        $client_id ='5e0eb8e9638f4e71ba88af27c4267176';
        $client_secret ='3e582b3e58e34bfba979b121f1261521';

        // ACCESS TOKEN
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://accounts.spotify.com/api/token');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        # Eseguo la POST
        curl_setopt($ch, CURLOPT_POST, 1);
        # Setto body e header della POST
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret)));
        $token=json_decode(curl_exec($ch), true);
        curl_close($ch);



        $url = 'https://api.spotify.com/v1/browse/new-releases';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        # Imposto il token
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token['access_token']));
        $res=curl_exec($ch);
        curl_close($ch);

        echo $res;
    }



}
