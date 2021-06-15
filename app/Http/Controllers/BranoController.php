<?php


namespace App\Http\Controllers;
use App\Models\Brano;
use Illuminate\Routing\Controller;

class BranoController extends Controller
{
        public function getBrani(){
            $codice=urlencode($_GET['codice']);
            return Brano::where('album',$codice)->get();
        }
}
