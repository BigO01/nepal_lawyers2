<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nep_appointments;
use App\lawyerAppointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class AppointmentController extends Controller
{
    public  function SetAppointment(Request $request)
    {
		//dd($request);
        $appointment = new nep_appointments();
        $appointment->name = $request->user_name;
        $appointment->email = $request->form_email;
        $appointment->appointment_date =Carbon::parse($request->form_appontment_date);
        $appointment->refered_to = $request->user_id;
        $appointment->refered_by = $request->lawyer_id;
        $appointment->massege = $request->form_message;
        $appointment->type = $request->type;
		$appointment->status = '0';
        $appointment->save();
        Session::flash('msg',' Your Appointment request send, Successfully.');
        return back()->withInput();
    }


}
