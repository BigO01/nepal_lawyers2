<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Http\Requests\emailConformation;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(emailConformation $request)
    {
        return $this->view('Email/mail',
            ['f'=>$request->f_name, 'l'=>$request->l_name, 'e'=>$request->email_l])
        ->to($request->email_l)->from('info@nepallawyer.com','Nepal Lawyers');
    }
}
