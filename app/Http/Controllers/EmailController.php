<?php

namespace App\Http\Controllers;
use App\Http\Mail\confirm_mail;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    //
    public  static function sendSignupEmail($name,$email,$verification_code){
        $data=[
            'name'=>$name,
            'verification_code'=>$verification_code
        ];
        Mail::to($email)->send(new confirm_mail($data));
    }
    public function  getverified($username,$verification_code){

        if(User::where('username',$username)->where('confirmation_code',$verification_code)->update(['confirmed'=>1]))
            return redirect('login');
    }
}
