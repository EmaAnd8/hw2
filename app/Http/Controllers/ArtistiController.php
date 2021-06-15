<?php


namespace App\Http\Controllers;
use App\Models\Artisti;
use App\Models\User;
use Illuminate\Routing\Controller;

class ArtistiController extends  Controller
{

    public function index()
    {
        $session_id=session('id_user');


        $user=User::find($session_id);
        return view('artisti')->with('user',$user);
    }

    public function  artisti(){
        return Artisti::all();
    }
}
