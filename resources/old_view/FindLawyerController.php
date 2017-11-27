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

use App\nep_regions;
use App\nep_cities;
use App\nep_states;
use App\nep_expertises;

use Illuminate\Support\Facades\DB;
use Validator; //For Form validation
// use DB; // Facade for database
use Crypt;



class FindLawyerController extends Controller
{
    public function lawyerlist()
    {

    	
    	$cities = DB::table('cities')->select()->get();
  		$states = DB::table('states')->select()->get();
  		$regions = DB::table('regions')->select()->get();
  		$expertises = DB::table('expertises')->select()->get();

		 $data = DB::table('users as u')
		     ->where('u.role', 'lawyer')
		 	 ->orWhere('u.role', 'lawfirm')
		     ->join('regions as r', 'r.id', '=', 'u.region_id')
		     ->leftjoin('lawfirms as f', 'f.ref_id', '=', 'u.id')
		     ->leftjoin('lawyers as l', 'l.ref_id', '=', 'u.id')
		     ->select('u.*','r.region_name','r.region_name as region_id','f.experience as fexperience', 'l.experience as lexperience')
			 ->get();
	
	foreach($data as $key)
	{	 

 		$experties[] = DB::table('lawyer_expertise')
 				 ->select()
 			     ->where('parent_id', $key->id)
 			     ->get();
	}
	// print_r($experties);
	// exit();
	return view('findalawyer', compact('data','experties','expertises','cities','states','regions'));
    }
}
