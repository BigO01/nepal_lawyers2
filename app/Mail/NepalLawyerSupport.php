<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Http\Request;

class NepalLawyerSupport extends Mailable
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
    public function build(Request $req)
    {
        return $this->view('Email/adminemailview',
            ['name'=>$req->emailname,'esubject'=>$req->emailsubject, 'msg'=>$req->emailbody])
        ->to($req->emailreceiver)->from($req->senderemail, $req->emailsubject);
    }
}
