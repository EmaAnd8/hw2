<?php

namespace App\Http\Controllers;
use App\Http\Mail\confirmation_mail;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class RegisterController extends Controller
{
    protected function create()
    {
        $request = request();


        if($this->countErrors($request) === 0) {
            $newUser =  User::create([
                'username' => $request['username'],
                'password' =>Hash::make($request['password']) ,
                'nome' => $request['nome'],
                'cognome' => $request['cognome'],
                'email' => $request['email'],
                'confirmation_code'=>sha1(time())
            ]);
            Mail::to($newUser)->send(new confirmation_mail($newUser));
            if ($newUser)
            {
                EmailController::sendSignupEmail($newUser->username,$newUser->email,$newUser->confirmation_code);
                //Session::put('id_user', $newUser->id_user);
                return redirect('register');
            }
            else {
                return redirect('register')->withInput();
            }
        }
        else
            return redirect('register')->withInput();

    }

    private function countErrors($data) {
        $error = array();

        # USERNAME
        // Controlla che l'username rispetti il pattern specificato
        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $data['username'])) {
            $error[] = "Username non valido";
        } else {
            $username = User::where('username', $data['username'])->first();
            if ($username !== null) {
                $error[] = "Username già utilizzato";
            }
        }
        # PASSWORD
        if (strlen($data["password"]) < 8) {
            $error[] = "Caratteri password insufficienti";
        }
        # CONFERMA PASSWORD
        if (strcmp($data["password"], $data["conferma_password"]) != 0) {
            $error[] = "Le password non coincidono";
        }
        # EMAIL
        if (strcmp($data["email"], $data["conferma_email"]) != 0) {
            $error[] = "Le email non coincidono";
        }
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida";
        } else {
            $email = User::where('email', $data['email'])->first();
            if ($email !== null) {
                $error[] = "Email già utilizzata";
            }
        }

        return count($error);
    }


    public function checkUsername($query) {
        $exist = User::where('username', $query)->exists();
        return ['exists' => $exist];
    }

    public function checkEmail($query) {
        $exist = User::where('email', $query)->exists();
        return ['exists' => $exist];
    }

    public function index() {
        return view('registrazione');
    }

}




?>
