<?php


namespace App\Http\Controllers;
use App\Models\Favourite;
use http\Env\Request;
use Illuminate\Routing\Controller;


class CreateController extends Controller
{
    /*
        public function index(){
            $user=User::find('id_user');
            return view('create')->with('user',$user);
        }
        */

        public function SearchSpotify(){
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
            $type=urlencode($_GET['type']);
            $url = 'https://api.spotify.com/v1/search?q='.$query.'&type='.$type.'&limit=8';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            # Imposto il token
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token['access_token']));
            $res=curl_exec($ch);
            curl_close($ch);

            echo $res;
       }

       public function SearchSpotify_1(){
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
           $type=urlencode($_GET['type']);
           $url = 'https://api.spotify.com/v1/search?q='.$query.'&type='.$type.'&limit=10';
           $ch = curl_init();
           curl_setopt($ch, CURLOPT_URL, $url);
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
           # Imposto il token
           curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token['access_token']));
           $res=curl_exec($ch);
           curl_close($ch);

           echo $res;
     }

    public function SearchSpotify_2(){
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
        $type=urlencode($_GET['type']);
        $url = 'https://api.spotify.com/v1/search?q='.$query.'&type='.$type.'&limit=10';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        # Imposto il token
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token['access_token']));
        $res=curl_exec($ch);
        curl_close($ch);

        echo $res;
    }

    public function SearchLyrics(){
        $ch = curl_init();
        $artist=urlencode($_GET['artista']);

        $title=urlencode($_GET['titolo']);

        curl_setopt($ch, CURLOPT_URL, 'https://api.lyrics.ovh/v1/'.$artist.'/'.$title.'?limit=100');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);


        $response = curl_exec($ch);
        curl_close($ch);

        echo $response;
    }

    public function create_favourite(){

       $result= Favourite::create([
            'id'=>session('id_user'),
           'titolo' =>request('titolo'),
           'immagine'=>request('img'),
           'tipo'=>request('tipo')
       ]);

       return ['ok'=>$result];

    }
}
?>
