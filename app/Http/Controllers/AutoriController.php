<?php


namespace App\Http\Controllers;
use App\Models\Autori;
use App\Models\User;
use Illuminate\Routing\Controller;


class AutoriController extends Controller
{

    public function index()
    {
        $session_id=session('id_user');


        $user=User::find($session_id);
        return view('autori')->with('user',$user);
    }

    public function  autori(){
        return Autori::all();
    }

}
