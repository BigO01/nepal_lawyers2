<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Crypt;

use Validator;
use Illuminate\Support\Facades\Event;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

use App\Http\Controllers\Auth;

use Illuminate\Contracts\Auth\Authenticatable;

use App\nep_expertises;
use App\nep_lawyer_expertise;
use App\nep_lawfirms;
use App\nep_users;
use App\nep_regions;
use App\nep_states;
use App\nep_cities;
use App\nep_badges;

class LawfirmController extends Controller
{
   public function __constructor(){
	   	$info = ['sTitle'=>'Add Lawfirm', 'pTitle'=>'List Lawfirm'];
	   }
   
   public function AddLawfirm(){
	   $adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
				
		$expertises= nep_expertises::all()->where('status','1');
		$regions= nep_regions::all()->where('status','1');
		$states= nep_states::all()->where('status','1');
		$cities= nep_cities::all()->where('status','1');
		$badges= nep_badges::all()->where('status','1');
		//dd($users);
		$info = ['sTitle'=>'Add Lawfirm', 'pTitle'=>'List Lawfirms','expertises'=>$expertises,
		'regions' => $regions, 'states'=>$states,'cities'=> $cities,'badges'=>$badges,'cdata'=>$cdata];
		return view('admin/lawfirm_add')->with('info', $info);
	}
	public function SaveLawfirm(Request $req){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		
		$searchemail= $users= DB::table('users')
					->select('email')
					->where('email',$req->uemail)
					->get();
		if(count($searchemail)==1){
			
				session()->flash('emailvalidation', $req->uemail.' already exist! Try with another Email Address.');
          session()->flash('emailvalidtion_class','alert-danger');
		  $expertises= nep_expertises::all()->where('status','1');
		$regions= nep_regions::all()->where('status','1');
		$states= nep_states::all()->where('status','1');
		$cities= nep_cities::all()->where('status','1');
		$badges= nep_badges::all()->where('status','1');
		//dd($users);
		$info = ['sTitle'=>'Add Lawfirm', 'pTitle'=>'List Lawfirms','expertises'=>$expertises,
		'regions' => $regions, 'states'=>$states,'cities'=> $cities,'badges'=>$badges,'cdata'=>$cdata];
		return view('admin/lawfirm_add')->with('info', $info);
			}
		$pimg=$req->uimg;
		//print_r($pimg);exit;
      if($req->uimg){
		  //$pimg = file($req->uimg);
         $pimg_name = time().'.'.$req->uimg->getClientOriginalExtension();
         $pimg->move(public_path('profileimages'), $pimg_name);
      }
      else{
        $pimg_name = '';
      }
		$user = new nep_users();
		$user->region_id = $req->rgname;
		$user->state_id = $req->stname;
		$user->city_id = $req->ctname;
		$user->first_name = $req->ufname;
		$user->email = $req->uemail;
		$user->password = bcrypt($req->upswrd);
		$user->image_path = $pimg_name;
		$user->remember_token = $req->_token;
		$user->role = $req->urole;
		$user->status = $req->status;
		//print($pimg_name);exit;
		$user->save();
		if(!empty($user->id)){
			$user->roles()->attach('4');
			if(!empty($req->expertise)){
					$expertises = implode(',',$req->expertise);
					}
				else{
						$expertises = '';
					}
			if(!empty($req->badge)){
					$badges = implode(',',$req->badge);
					}
				else{
						$badges = '';
					}
			$lawfirm = new nep_lawfirms();
			$lawfirm->ref_id = $user->id;
			$lawfirm->experience = $req->exp;
			$lawfirm->expertise = $expertises;
			$lawfirm->badge = $badges;
			$lawfirm->premium = $req->pa;
			$lawfirm->save();
		}
		//$user->roles()->attach($admin->id);
		$info=['cdata',$cdata];
    	return redirect()->route('Adminiscontroller/ListLawfirm')->with($info);
	}
	public function ListLawfirm(){
		 $adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		
		$lawfirms= DB::table('users')
					->select('*')
					->rightjoin('lawfirms', 'lawfirms.ref_id', '=', 'users.id')
					->where('role','lawfirm')
					->get();
		//$expertise=DB::table('expertises')->all();
		$expertises = nep_expertises::all()->where('status',1);
		//$users= DB::table('users')->where('role','guest')->get();
		//dd($lawfirms);
		$info = ['sTitle'=>'Add Lawfirm', 'pTitle'=>'List Lawfirms','delete'=>'delete_lawfirm','edit'=>'edit_lawfirm', 'lawfirms'=> $lawfirms, 'expertises'=> $expertises,'cdata'=>$cdata];
		return view('admin/lawfirms_list')->with('info', $info);
	}
	public function ListPremiumLawfirm(){
		 $adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$lawfirms= DB::table('users')
					->select('*')
					->rightjoin('lawfirms', 'lawfirms.ref_id', '=', 'users.id')
					->where('role','lawfirm')
					->where('premium','on')
					->get();
		//$expertise=DB::table('expertises')->all();
		$expertises = nep_expertises::all()->where('status',1);
		//$users= DB::table('users')->where('role','guest')->get();
		//dd($lawfirms);
		$info = ['sTitle'=>'Add Lawfirm', 'pTitle'=>'List Premium Lawfirms','delete'=>'delete_lawfirm','edit'=>'edit_lawfirm', 'lawfirms'=> $lawfirms, 'expertises'=> $expertises,'cdata'=>$cdata];
		return view('admin/lawfirms_list')->with('info', $info);
	}
	public function EditLawfirm($id){
		 $adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
				$lawf= DB::table('users')
					->select('*')
					->leftjoin('lawfirms', 'lawfirms.ref_id', '=', 'users.id')
					->addselect('lawfirms.id as lawid','lawfirms.ref_id','lawfirms.expertise')
					->where('role','lawfirm')
					->where('users.id',$id)
					->get();
		$expertises= nep_expertises::all()->where('status','1');
		$regions= nep_regions::all()->where('status','1');
		$states= nep_states::all()->where('status','1');
		$cities= nep_cities::all()->where('status','1');
		$badges= nep_badges::all()->where('status','1');
		//dd($lawf);
		
		
		$tem=$lawf;
		$tem->lexpertise=explode(',',$tem[0]->expertise);
		$tem->lbadge=explode(',',$tem[0]->badge);
		$lawf=$tem;
		//dd($lawy);
		
		$info = ['sTitle'=>'Add Lawfirm','eTitle'=>'Edit Lawfirm', 'pTitle'=>'List Lawfirms','cBtnTxt'=>'Cancel','upBtnTxt'=>'Update Record', 'lawf'=>$lawf, 'expertises'=>$expertises, 'regions'=>$regions, 'states' => $states, 'cities'=>$cities,'badges'=>$badges,'cdata'=>$cdata];
		return view('admin/lawfirm_edit')->with('info', $info);
	}
	public function UpdateLawfirm(Request $req){
		 $adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$searchemail= $users= DB::table('users')
					->select('id','email')
					->where('email',$req->uemail)
					->get();
					//dd($searchemail);
		if(count($searchemail)==1 && $searchemail[0]->id != $req->id){
				session()->flash('emailvalidation', $req->uemail.' already exist! Try with another Email Address.');
          session()->flash('emailvalidtion_class','alert-danger');
		  
				$lawf= DB::table('users')
					->select('*')
					->leftjoin('lawfirms', 'lawfirms.ref_id', '=', 'users.id')
					->addselect('lawfirms.id as lawid','lawfirms.ref_id','lawfirms.expertise')
					->where('role','lawfirm')
					->where('users.id',$req->id)
					->get();
		$expertises= nep_expertises::all()->where('status','1');
		$regions= nep_regions::all()->where('status','1');
		$states= nep_states::all()->where('status','1');
		$cities= nep_cities::all()->where('status','1');
		$badges= nep_badges::all()->where('status','1');
		//dd($lawf);
		
		
		$tem=$lawf;
		$tem->lexpertise=explode(',',$tem[0]->expertise);
		$tem->lbadge=explode(',',$tem[0]->badge);
		$lawf=$tem;
		//dd($lawy);
		
		$info = ['sTitle'=>'Add Lawfirm','eTitle'=>'Edit Lawfirm', 'pTitle'=>'List Lawfirms','cBtnTxt'=>'Cancel','upBtnTxt'=>'Update Record', 'lawf'=>$lawf, 'expertises'=>$expertises, 'regions'=>$regions, 'states' => $states, 'cities'=>$cities, 'badges'=>$badges,'cdata'=>$cdata];
		return view('admin/lawfirm_edit')->with('info', $info);
	
		  
		  }
		if($req->hasFile('uimg')){
				$pimg=$req->uimg;
		
      if($req->uimg ){
			 $pimg_name = time().'.'.$req->uimg->getClientOriginalExtension();
			 $pimg->move(public_path('profileimages'), $pimg_name);
      }else{
        $pimg_name = '';
      }
		$user= nep_users::Find($req->id);
		$user->Fill([
			'region_id' => $req->rgname,
			'state_id' => $req->stname,
			'city_id' => $req->ctname,
			'first_name' => $req->ufname,
			'email' => $req->uemail,
			'image_path' => $pimg_name,
			'status' => $req->status,
		]);
		$user->save();
		if(!empty($req->id)){
			if(!empty($req->expertise)){
					$expertises = implode(',',$req->expertise);
				}else{
						$expertises='';
					}
			if(!empty($req->badge)){
					$badges = implode(',',$req->badge);
				}else{
						$badges='';
					}
			$lawfirm= nep_lawfirms::Find($req->lid);
			$lawfirm->Fill([
				'ref_id' => $req->id,
				'experience' => $req->exp,
				'expertise' => $expertises,
				'badge' => $badges,
				'premium' => $req->pa,
				]);
			
			$lawfirm->save();
		}
			}else{
		$user= nep_users::Find($req->id);
		$user->Fill([
			'region_id' => $req->rgname,
			'state_id' => $req->stname,
			'city_id' => $req->ctname,
			'first_name' => $req->ufname,
			'email' => $req->uemail,
			'status' => $req->status,
		]);
		$user->save();
		if(!empty($req->id)){
			if(!empty($req->expertise)){
					$expertises = implode(',',$req->expertise);
				}else{
						$expertises='';
					}
			if(!empty($req->badge)){
					$badges = implode(',',$req->badge);
				}else{
						$badges='';
					}
			$lawfirm= nep_lawfirms::Find($req->lid);
			$lawfirm->Fill([
				'ref_id' => $req->id,
				'experience' => $req->exp,
				'expertise' => $expertises,
				'badge' => $badges,
				'premium' => $req->pa,
				]);
			
			$lawfirm->save();
		}
				}
		$info=['cdata',$cdata];
    	return redirect()->route('Adminiscontroller/ListLawfirm')->with($info);
	}
	public function DeleteLawfirm($id){
		 $adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		$info=['cdata',$cdata];
		nep_users::Destroy($id);
		 nep_lawfirms::where('ref_id','=',$id)
	               ->delete();
    	return redirect()->route('Adminiscontroller/ListLawfirm')->with($info);
	}
}
