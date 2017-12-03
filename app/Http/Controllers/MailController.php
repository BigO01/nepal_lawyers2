<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SendMail;
use App\Mail\ReceiveMessage;
use App\Mail\add_lawyer;
use App\Mail\NepalLawyerSupport;

class MailController extends Controller
{
    public function send_email_conformation()
    {
    	Mail::send(new SendMail());
        return response()->json(['status'=>'success','message'=>'Confirmation Email has been send to you! Please conform that first!']);
//    	session()->flash('feedback', 'Confirmation Email has been send to you! Please conform that first!');
//    	session()->flash('feedback_class','alert-success');
//    	return redirect()->route('login');
    }

    public function contactus()
    {
        Mail::send(new ReceiveMessage());
        session()->flash('feedback', 'Your message has been send successfully!');
        session()->flash('msg', 'Your message has been send successfully!');
        return redirect()->back();
    }

    public function add_lawyer()
    {
        Mail::send(new add_lawyer());
        session()->flash('msg', 'Your mail has been send successfully!');
        return redirect()->route('setting');
    }
	public function adminemailsend()
    {
        Mail::send(new NepalLawyerSupport());
        session()->flash('feedback', 'Your message has been send successfully!');
        session()->flash('feedback_class','alert-success');
        return redirect()->route('Adminiscontroller/MailView');
    }
}
