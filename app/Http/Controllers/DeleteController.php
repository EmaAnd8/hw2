<?php


namespace App\Http\Controllers;

use App\Models\Favourite;
use Illuminate\Routing\Controller;

class DeleteController extends  Controller
{

   public function  delete()
   {

       $res = Favourite::where('id',session('id_user'))->where('titolo',request('titolo'))->where('immagine',request('img'))->delete();
       if($res>0)
       {
           return 'ok';
       }
       else{
           return 'no';
       }
   }
}
