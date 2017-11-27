<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class add_lawyer extends Mailable
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
    public function build(Request $request)
    {
        return $this->view('Email/Add_lawyer',
            ['fname'=>$request->firstName, 'lname'=>$request->lastName,'id'=>$request->id,'mail'=>$request->lawyer_email])
        ->to($request->lawyer_email)->from('info@nepallawyer.com','Nepal Lawyers');
    }
}
