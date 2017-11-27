<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nep_lawfirms;
use App\nep_lawyers;
use App\nep_users;
use App\nep_photos;
use App\nep_lawyer_edu;
use App\nep_lawyer_expertise;
use App\nep_days_time;
use App\nep_info;
use App\nep_regions;
use App\nep_cities;
use App\nep_states;
use App\nep_expertises;
use App\nep_badges;
use App\nep_faqs;
use App\nep_ratings_comments;

use Illuminate\Support\Facades\DB;
use Validator; //For Form validation
// use DB; // Facade for database
use Crypt;



class FindLawyerController extends Controller
{
    public function lawyerlist()
    {

      	$web_info = DB::table('info')->select()->first();
    	
    	$usersName = DB::table('users')->select()->where('status','=','1')->where('role','LIKE','Law%')->get();
 	
    	$cities = DB::table('cities')->select()->where('status','1')->get();
  		$states = DB::table('states')->select()->where('status','1')->get();
  		$regions = DB::table('regions')->select()->where('status','1')->get();
  		$badges = DB::table('badges')->select()->where('status','1')->get();
  		$expertises = DB::table('expertises')->select()->where('status','1')->get();
  		$lawfirm_names = DB::table('users')->select()->where('status','1')->where('role','=','lawfirm')->get();
  		$faqs = DB::table('faqs')->select()->where('status', '=', '1')->limit(5)->get();

  		$ratings = DB::table('ratings_comments')->where('status','1')->get();

		$data = DB::table('users as u')
		     ->leftjoin('regions as r', 'r.id', '=', 'u.region_id')
		     ->leftjoin('lawfirms as f', 'f.ref_id', '=', 'u.id')
		     ->leftjoin('lawyers as l', 'l.ref_id', '=', 'u.id')

		     ->select('u.*','r.region_name','f.experience as fexperience','f.expertise as f_expertise_id', 'l.experience as lexperience','l.expertise as l_expertise_id','l.law_firm_id','l.premium as l_premium','f.premium as f_premium','f.badge as f_badge','l.badge as l_badge','f.fee_first as f_fee_first','l.fee_first as l_fee_first')
		     // ->Where('u.status', '=', '1')
		     ->orWhere([
					    ['u.status', '=', '1'],
					    ['u.role', '=', 'lawyer'],
					])
		     ->orWhere([
					    ['u.status', '=', '1'],
					    ['u.role', '=', 'lawfirm'],
					])

			 ->paginate(5);
	

	return view('findalawyer', compact('data','expertises','cities','states','regions','lawfirm_names','web_info','badges','usersName','faqs','ratings'));
    }
}
