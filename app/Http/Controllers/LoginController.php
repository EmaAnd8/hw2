<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
        //verifico che l'utente si sia loggato
        public function  login(Request $request){
            if(session('id_user')!==null){
                return redirect('home');
            }
            else
            {
                $var=$request->old('username');
                $error='';
                if ($var !==null){$error='username o password errati';}
                return view('login')->with('csrf_token', csrf_token())->with('error',$error);
            }

        }

        public function checkLogin(){
            $user=User::where('username',request('username'))->first();

           if($user) {
               $bool = Hash::check(request('password'), $user['password']);
               if ($bool && $user->confirmed === 1) {
                   Session::put('id_user', $user->id_user);
                   return redirect('home');

               } else {


                   return redirect('login')->withInput();

               }
           }else{

               return redirect('login')->withInput();
           }
        }





        public function logout(){
            Session::flush();
            return redirect('login');
        }
}



?>
