<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nep_lawyers;
use App\nep_users;
use App\User;
use App\nep_expertises;
use App\nep_lawfirms;
use App\nep_regions;
use App\nep_cities;
use App\nep_states;
use App\nep_bars;
use App\nep_courts;
use App\Permission;
use App\nep_info;
use App\Role;
use App\nep_testimonials;
use App\nep_slides;
use App\nep_posts;
use App\nep_quickconsultations;

use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\DB;
use Validator;

//use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $simple_lawz = DB::table('users as u')
             ->leftjoin('lawyers as l','l.ref_id', '=', 'u.id')
             ->leftjoin('lawfirms as f','f.ref_id', '=', 'u.id')
             ->select('u.*','f.expertise as f_expertise_id','f.description as f_description','l.expertise as l_expertise_id','l.description as l_description','l.experience as lexperience','f.experience as fexperience')
             ->orWhere([
                        ['u.status', '=', '1'],
                        ['u.role', '=', 'lawyer'],
                    ])
             ->orWhere([
                        ['u.status', '=', '1'],
                        ['u.role', '=', 'lawfirm'],
                    ])
             ->inRandomOrder()
             ->limit(8)
             ->get();

        $premium_lawz = DB::table('users as u')
             ->leftjoin('lawyers as l','l.ref_id', '=', 'u.id')
             ->leftjoin('lawfirms as f','f.ref_id', '=', 'u.id')
             ->select('u.*','f.expertise as f_expertise_id','l.expertise as l_expertise_id','l.experience as lexperience','f.experience as fexperience','l.description as l_description','f.description as f_description')
             ->orWhere([
                        ['u.status', '=', '1'],
                        ['l.premium', '=', 'on'],
                    ])
             ->orWhere([
                        ['u.status', '=', '1'],
                        ['f.premium', '=', 'on'],
                    ])
             ->inRandomOrder()
             ->get(); 

         $web_info = DB::table('info')->select()->first(); 
         $testimonials = DB::table('testimonials')->select()->where('status','1')->get();
         $sliders = DB::table('slides')->select()->where('status','1')->get();

        $expertises = DB::table('expertises')->select()->where('status','1')->get();
        $regions = DB::table('regions')->select()->where('status','1')->get();
        $states = DB::table('states')->select()->where('status','1')->get();
        $cities = DB::table('cities')->select()->where('status','1')->get();
        $usersName = DB::table('users')->select()->where('status','=','1')->where('role','LIKE','Law%')->get();
        $posts = DB::table('posts')->select()->where('status','1')->limit(4)->get();


        return view('home',compact('simple_lawz','premium_lawz','expertises','web_info','regions','states','cities','testimonials','sliders','usersName','posts'));
    }
	 public function QuickConsultation()
    {
		 $web_info = DB::table('info')->select()->first();
		 $cities = DB::table('cities')->select()->where('status','1')->get();
		 $usersName = DB::table('users')->select()->where('status','=','1')->where('role','LIKE','Law%')->get();
		 $expertises = DB::table('expertises')->select()->where('status','1')->get();
		 return view('quickconsultation',compact('web_info','cities','usersName','expertises'));
	}
	public function QuickConsultationSubmission(Request $req){
		//dd($req);
		$qc = new nep_quickconsultations();
		$qc->city_id = $req->city;
		$qc->expertise_id = $req->area;
		$qc->user_name = $req->name;
		$qc->email =  $req->email;
		$qc->contact_number = $req->phonenumber;
		$qc->quick_message = $req->form_message;
		$qc->status = '0';
		//dd($bar);
		$qc->save();
		Session::flash('Appointment_Success',' Your Quick Consultation request has been recieved. Our Representive will contact you soon. Thanks');
    	return redirect()->route('quickconsult');
	}
}
