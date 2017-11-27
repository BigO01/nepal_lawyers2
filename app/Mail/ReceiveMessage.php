<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Http\Requests\receivemail;

class ReceiveMessage extends Mailable
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
    public function build(receivemail $request)
    {
    
        return $this->view('Email/receiveEmail',
            ['name'=>$request->name, 'subject'=>$request->subject, 'msg'=>$request->message])
        ->to('contact@nepallawyer.com')
        ->from($request->email1, $request->subject);
    }
}
