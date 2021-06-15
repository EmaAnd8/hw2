<?php

namespace App\Http\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class confirm_mail extends Mailable
{
    use Queueable, SerializesModels;
    private $email_data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->email_data=$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user=$this->email_data;

        return $this->from('manu@gmail.it')->subject('Benvenuto alla DBRECORDS')->view('emails.verifyemail')->with('user',$user);
    }
}
