<?php


namespace App\Http\Controllers;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use \Cartalyst\Sentinel\Laravel\Facades\Reminder;

class ForgotPassword extends Controller
{

    public function forgot(){

        return view('forgot');

    }

    public function password(Request $request){

        $user = User::where('email',$request->email)->first();

        if($user === null){

            return redirect()->back()->with(['error' =>'Email inesistente.']);
        }

        $user = Sentinel::findById($user->id_user);
        $reminder = Reminder::exists($user) ? : Reminder::create($user);

        if($reminder == true) {
           $reminder_userid = Reminder::where('user_id', '=', $user->id_user)->first();
            $this->sendEmail($user, $reminder_userid->code);

        }



        return redirect()->back()->with(['success' => 'Il codice di reset è stato mandato alla tua mail']);
    }

    public function sendEmail($user, $code){

        Mail::send(
            'emails.forgot_email',
                ['user' => $user, 'code' =>$code],
            function($message) use($user){
                $message->to($user->email);
                $message->subject($user->username ."reset your pasword");
            }
        );
    }

    public function reset($email, $code){

        $user = User::where('email',$email)->first();

        if($user === null){

            echo "L'email non esiste.";
        }

        $user = Sentinel::findById($user->id_user);
        $reminder = Reminder::exists($user) ? : Reminder::create($user);
        if($reminder == true){
            $reminder_userid = Reminder::where('user_id', '=', $user->id_user)->first();
            if($code === $reminder_userid->code){

                return view('reset_password')->with(['user' => $user, 'code' => $code]);
            }else{
                return redirect('login');
            }

        }else{
            echo 'Tempo scaduto. Link non valido';
        }
    }

    public function resetPassword(Request $request,$email, $code)
    {

        $user = User::where('email', $email)->first();
        if ($user == null) {

            echo "L'email non esiste.";
        }
        $user = Sentinel::findById($user->id_user);
        //tiene traccia delle password in fase di reset
        $reminder = Reminder::exists($user) ?: Reminder::create($user);
        if ($reminder == true) {
            $reminder_userid = Reminder::where('user_id', '=', $user->id_user)->first();
            if ($code === $reminder_userid->code) {
                User::where('id_user', $user->id_user)->update(['password' => Hash::make($request->password)]);
                Reminder::where('user_id', $user->id_user)->where('code', $code)->update(['completed' => '1']);
                return redirect('login')->with(['success', 'Password cambiata con successo! ']);
            } else {
                return redirect('login');
            }
        }
    }

}
