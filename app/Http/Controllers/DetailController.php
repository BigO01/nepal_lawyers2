<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator; //For Form validation

use App\nep_days_time;
use App\nep_users;
use App\User;
use App\nep_expertises;
use App\nep_lawyer_edu;
use App\nep_cities;
use App\nep_states;
use App\nep_info;
use App\nep_bars;
use App\nep_courts;
use App\nep_photos;
use App\nep_ratings_comments;


class DetailController extends Controller
{
    public function index($id){

    	$web_info = DB::table('info')->select()->first();
        $cities = DB::table('cities')->select()->where('status','1')->get();
        $usersName = DB::table('users')->select()->where('status','=','1')->where('role','LIKE','Law%')->get();

    	$expertises = DB::table('expertises')->select()->where('status','1')->get();
    	
    	$data = DB::table('users as u')
		     ->leftjoin('regions as r', 'r.id', '=', 'u.region_id')
		     ->leftjoin('lawfirms as f', 'f.ref_id', '=', 'u.id')
		     ->leftjoin('lawyers as l', 'l.ref_id', '=', 'u.id')

		     ->select('u.*','r.region_name','f.experience as fexperience','f.expertise as f_expertise_id', 'l.experience as lexperience','l.expertise as l_expertise_id','l.law_firm_id','l.fee_first as l_fee_first','l.fee_hourly as l_fee_hourly','f.fee_first as f_fee_first','f.fee_hourly as f_fee_hourly','l.premium as l_premium','f.premium as f_premium','f.description as f_description','l.description as l_description','f.bg_image as fBG','l.bg_image as lBG','f.bar_id as f_bar','l.bar_id as l_bar','l.court_names as l_court','f.court_names as f_court','l.phone_price as l_phone_price','l.personal_price as l_personal_price','l.skype_price as l_skype_price','l.email_price as l_email_price','f.phone_price as f_phone_price','f.personal_price as f_personal_price','f.skype_price as f_skype_price','f.email_price as f_email_price')
		     ->Where('u.id', '=', $id)
			 ->first();

		$lawfirm_names = DB::table('users')->select()->where('status','1')->where('role','=','lawfirm')->get();
		$edu = DB::table('lawyer_edu')->select()->get();
		$state = DB::table('states')->select()->where('status','1')->get();
		$city = DB::table('cities')->select()->where('status','1')->get();
		$bars = DB::table('bars')->select()->where('status','1')->get();
		$courts = DB::table('courts')->select()->where('status','1')->get();
		$imgz = DB::table('photos')->select()->where('parent_id',$id)->get();
		$dateTime = DB::table('days_time')->select()->where('parent_id','=',$id)->get();
		$firm_lawyers = DB::table('users as u')
						->leftjoin('lawyers as l', 'l.ref_id', '=', 'u.id')
						->where('u.status','1')
						->where('law_firm_id','=',$id)
						->select('u.*')
						->get();

		// Similer lawyers accourding to expertiese
		$similer = DB::table('users as u')
		     ->leftjoin('regions as r', 'r.id', '=', 'u.region_id')
		     ->leftjoin('states as s', 's.id', '=', 'u.state_id')
		     ->leftjoin('cities as c', 'c.id', '=', 'u.city_id')
		     ->leftjoin('lawfirms as f', 'f.ref_id', '=', 'u.id')
		     ->leftjoin('lawyers as l', 'l.ref_id', '=', 'u.id')

		     ->select('u.*','r.region_name','s.state_name','c.city_name','f.experience as fexperience','f.expertise as f_expertise_id', 'l.experience as lexperience','l.expertise as l_expertise_id','l.law_firm_id','l.fee_first as l_fee_first','l.fee_hourly as l_fee_hourly','f.fee_first as f_fee_first','f.fee_hourly as f_fee_hourly','l.premium as l_premium','f.premium as f_premium','f.description as f_description','l.description as l_description')
		     ->orWhere([['l.expertise', 'like', '%'.$data->l_expertise_id.'%'],['u.status','=','1'],['u.role','=','lawyer'],['u.id','!=',$data->id]])
		     ->orWhere([['f.expertise', 'like', '%'.$data->f_expertise_id.'%'],['u.status','=','1'],['u.role','=','lawfirm'],['u.id','!=',$data->id]])
		     ->inRandomOrder()
		     ->limit(8)
			 ->get();

		$rating = DB::table('ratings_comments as rating')
					->leftjoin('users as user','user.id','=','rating.rateing_id')
					->select('rating.*','user.image_path','user.first_name','user.last_name')
					->where('rating.rated_id',$id)
					->where('rating.status','1')
					->where('user.status','1')
					->get();

    	return view('details', compact('data','expertises','imgz','lawfirm_names','edu','state','city','dateTime','web_info','firm_lawyers','cities','usersName','similer','bars','courts','rating'));
    }
	public function deletegimage($id){
			nep_photos::Destroy($id);
			return redirect()->route('setting');
		}
}
