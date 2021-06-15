<?php


namespace App\Http\Controllers;
use App\Models\NewsLetter;
use App\Models\User;
use Illuminate\Routing\Controller;

class NewsLetterController extends  controller
{

    public function index()
    {
        return view('newsletter');
    }

    public function insert(){
         $request = request();
        if($this->countErrors($request) === 0) {
            $result = NewsLetter::create([

                'email' => $request->email,
                'descrizione' => $request->descrizione,
                'checkbox' => $request->check
            ]);
            if($result)
                return redirect()->back();
        }



    }


    private function countErrors($data) {
        $error = array();


        # desc

        if ($data['descrizione']==='') {
            $error[] = "campo descrizione vuoto";
        }else if($data['descrizione']<10) {
            $error[] = "descrizione troppo breve";
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
}
