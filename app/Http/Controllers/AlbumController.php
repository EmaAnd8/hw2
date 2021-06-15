<?php


namespace App\Http\Controllers;
use App\Models\Album;
use App\Models\User;
use Illuminate\Routing\Controller;

class AlbumController extends Controller
{
    public function index()
    {
        $session_id=session('id_user');


        $user=User::find($session_id);
        return view('album')->with('user',$user);
    }

    public function album(){
        return Album::all();
    }


}
