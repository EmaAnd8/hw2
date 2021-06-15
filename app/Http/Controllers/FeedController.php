<?php


namespace App\Http\Controllers;
use Illuminate\Routing\Controller;

use App\Models\Favourite;


class FeedController extends Controller
{
        public function feed(){

            $favourites=Favourite::where('id',session('id_user'))->get();
            return $favourites;
        }
}
