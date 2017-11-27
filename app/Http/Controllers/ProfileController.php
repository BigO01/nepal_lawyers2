<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\nep_lawyers;
use App\nep_users;
use App\User;
use App\nep_certificates;
use App\nep_photos;
use App\nep_lawyer_edu;
use App\nep_expertises;
use App\nep_days_time;
use App\nep_lawfirms;
use App\nep_notificatons;
use App\nep_regions;
use App\nep_cities;
use App\nep_states;
use App\nep_bars;
use App\nep_courts;
use App\nep_languages;
use App\nep_info;

use App\Http\Controllers\Auth;
use Illuminate\Contracts\Auth\Authenticatable;

class ProfileController extends Controller
{

    public function index()
    {
    	$web_info = DB::table('info')->select()->first();
        $cities = DB::table('cities')->select()->where('status','1')->get();
        $usersName = DB::table('users')->select()->where('status','=','1')->where('role','LIKE','Law%')->get();
        $expertises = DB::table('expertises')->select()->where('status','1')->get();  



    	$id = \Auth::user()->id;
    	$data = DB::table('users as u')
             ->leftjoin('regions as r', 'r.id', '=', 'u.region_id')
             ->leftjoin('lawfirms as f', 'f.ref_id', '=', 'u.id')
             ->leftjoin('lawyers as l', 'l.ref_id', '=', 'u.id')

             ->select('u.*','r.region_name','f.experience as fexperience','f.expertise as f_expertise_id', 'l.experience as lexperience','l.expertise as l_expertise_id','l.law_firm_id','l.fee_first as l_fee_first','l.fee_hourly as l_fee_hourly','f.fee_first as f_fee_first','f.fee_hourly as f_fee_hourly','l.premium as l_premium','f.premium as f_premium','f.description as f_description','l.description as l_description','f.id as fID','l.id as lID','f.bg_image as fBG','l.bg_image as lBG')
             ->Where('u.id', '=', $id)
             ->first();

        $lawfirm_names = DB::table('users')->select()->where('status','1')->where('role','=','lawfirm')->get();
        $edu = DB::table('lawyer_edu')->select()->where('lawyer_id',$id)->get();
        $state = DB::table('states')->select()->where('status','1')->get();
        $city = DB::table('cities')->select()->where('status','1')->get();

        $imgz = DB::table('photos')->select()->where('parent_id',$id)->get();
        $dateTime = DB::table('days_time')->select()->where('parent_id','=',$id)->get();
        $firm_lawyers = DB::table('users as u')
                        ->leftjoin('lawyers as l', 'l.ref_id', '=', 'u.id')
                        ->where('u.status','1')
                        ->where('law_firm_id','=',$id)
                        ->select('u.*')
                        ->get();

    	return view('profile', compact('data','lawfirm_names','web_info','cities','usersName','expertises','edu','state','city','imgz','dateTime','firm_lawyers'));
    }
}
