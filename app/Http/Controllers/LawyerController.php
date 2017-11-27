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

use App\nep_expertises;
use App\nep_lawyer_expertise;
use App\nep_lawyers;
use App\nep_users;
use App\nep_regions;
use App\nep_states;
use App\nep_cities;
use App\nep_badges;

class LawyerController extends Controller
{
   public function __constructor(){
	   	$info = ['sTitle'=>'Add lawyer', 'pTitle'=>'List lawyer'];
	   }
   
   public function AddLawyer(){
	    $adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$expertises= nep_expertises::all()->where('status','1');
		$regions= nep_regions::all()->where('status','1');
		$states= nep_states::all()->where('status','1');
		$cities= nep_cities::all()->where('status','1');
		$badges= nep_badges::all()->where('status','1');
		//dd($users);
		$info = ['sTitle'=>'Add lawyer', 'pTitle'=>'List lawyers','expertises'=>$expertises,
		'regions' => $regions, 'states'=>$states,'cities'=> $cities,'badges'=>$badges,'cdata'=>$cdata];
		return view('admin/lawyer_add')->with('info', $info);
	}
	public function SaveLawyer(Request $req){
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
		$info = ['sTitle'=>'Add lawyer', 'pTitle'=>'List lawyers','expertises'=>$expertises,
		'regions' => $regions, 'states'=>$states,'cities'=> $cities,'badges'=>$badges,'cdata'=>$cdata];
		return view('admin/lawyer_add')->with('info', $info);
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
		$user->last_name = $req->ulname;
		$user->email = $req->uemail;
		$user->password = bcrypt($req->upswrd);
		$user->image_path = $pimg_name;
		$user->role = $req->urole;
		$user->remember_token = $req->_token;
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
			
			$lawyer = new nep_lawyers();
			$lawyer->ref_id = $user->id;
			$lawyer->experience = $req->exp;
			$lawyer->expertise = $expertises;
			$lawyer->badge = $badges;
			$lawyer->premium = $req->pa;
			$lawyer->save();
		}
		//$user->roles()->attach($admin->id);
		$info=['cdata',$cdata];
    	return redirect()->route('Adminiscontroller/ListLawyer')->with($info);
	}
	public function ListPremiumLawyer(){
		 $adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$lawyers= DB::table('users')
					->select('*')
					->rightjoin('lawyers', 'lawyers.ref_id', '=', 'users.id')
					->where('role','lawyer')
					->where('lawyers.premium','on')
					->get();
		//$expertise=DB::table('expertises')->all();
		$expertises = nep_expertises::all()->where('status',1);
		//$users= DB::table('users')->where('role','guest')->get();
		//dd($lawyers);
		$info = ['sTitle'=>'Add Lawyer', 'pTitle'=>'List Premium Lawyers','delete'=>'delete_lawyer','edit'=>'edit_lawyer', 'lawyers'=> $lawyers, 'expertises'=> $expertises,'cdata'=>$cdata];
		return view('admin/lawyers_list')->with('info', $info);
	}
	public function ListLawyer(){
		 $adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$lawyers= DB::table('users')
					->select('*')
					->rightjoin('lawyers', 'lawyers.ref_id', '=', 'users.id')
					->where('role','lawyer')
					->get();
		//$expertise=DB::table('expertises')->all();
		$expertises = nep_expertises::all()->where('status',1);
		//$users= DB::table('users')->where('role','guest')->get();
		//dd($lawyers);
		$info = ['sTitle'=>'Add Lawyer', 'pTitle'=>'List Lawyers','delete'=>'delete_lawyer','edit'=>'edit_lawyer', 'lawyers'=> $lawyers, 'expertises'=> $expertises,'cdata'=>$cdata];
		return view('admin/lawyers_list')->with('info', $info);
	}
	public function EditLawyer($id){
		 $adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		
		$lawy= DB::table('users')
					->select('*')
					->leftjoin('lawyers', 'lawyers.ref_id', '=', 'users.id')
					->addselect('lawyers.id as lawid','lawyers.ref_id','lawyers.expertise')
					->where('role','lawyer')
					->where('users.id',$id)
					->get();
		$expertises= nep_expertises::all()->where('status','1');
		$regions= nep_regions::all()->where('status','1');
		$states= nep_states::all()->where('status','1');
		$cities= nep_cities::all()->where('status','1');
		$badges= nep_badges::all()->where('status','1');
		//($courtinfo);
		
		
		$tem=$lawy;
		//dd($tem);
		$tem->lexpertise=explode(',',$tem[0]->expertise);
		$tem->lbadge=explode(',',$tem[0]->badge);
		$lawy=$tem;
		//dd($lawy);
		
		$info = ['sTitle'=>'Add Lawyer','eTitle'=>'Edit Lawyer', 'pTitle'=>'List Lawyers','cBtnTxt'=>'Cancel','upBtnTxt'=>'Update Record', 'lawy'=>$lawy, 'expertises'=>$expertises, 'regions'=>$regions, 'states' => $states, 'cities'=>$cities,'badges'=> $badges,'cdata'=>$cdata];
		return view('admin/lawyer_edit')->with('info', $info);
	}
	public function UpdateLawyer(Request $req){
		
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
		  	$lawy= DB::table('users')
					->select('*')
					->leftjoin('lawyers', 'lawyers.ref_id', '=', 'users.id')
					->addselect('lawyers.id as lawid','lawyers.ref_id','lawyers.expertise')
					->where('role','lawyer')
					->where('users.id',$req->id)
					->get();
		$expertises= nep_expertises::all()->where('status','1');
		$regions= nep_regions::all()->where('status','1');
		$states= nep_states::all()->where('status','1');
		$cities= nep_cities::all()->where('status','1');
		//($courtinfo);
		
		
		$tem=$lawy;
		$tem->lexpertise=explode(',',$tem[0]->expertise);
		$lawy=$tem;
		//dd($lawy);
		
		$info = ['sTitle'=>'Add Lawyer','eTitle'=>'Edit Lawyer', 'pTitle'=>'List Lawyers','cBtnTxt'=>'Cancel','upBtnTxt'=>'Update Record', 'lawy'=>$lawy, 'expertises'=>$expertises, 'regions'=>$regions, 'states' => $states, 'cities'=>$cities,'cdata'=>$cdata];
		return view('admin/lawyer_edit')->with('info', $info);
			}
		if($req->hasFile('uimg')){
				$pimg=$req->uimg;	
				  if($req->uimg ){
					  //$pimg = file($req->uimg);
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
						'last_name' => $req->ulname,
						'email' => $req->uemail,
						'image_path' => $pimg_name,
						'status' => $req->status,
					]);
					$user->save();

					//print($pimg_name);exit;
					if(!empty($req->id)){
						
						//$user->roles()->attach('4');
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
						$lawyer= nep_lawyers::Find($req->lid);
						$lawyer->Fill([
							'ref_id' => $req->id,
							'experience' => $req->exp,
							'expertise' => $expertises,
							'badge' => $badges,
							'premium' => $req->pa,
							]);
						
						$lawyer->save();
					}
				}
		else{
			$user= nep_users::Find($req->id);
			$user->Fill([
				'region_id' => $req->rgname,
				'state_id' => $req->stname,
				'city_id' => $req->ctname,
				'first_name' => $req->ufname,
				'last_name' => $req->ulname,
				'email' => $req->uemail,
				'status' => $req->status,
			]);
			$user->save();
			//print($pimg_name);exit;
			if(!empty($req->id)){
				
				//$user->roles()->attach('4');
				if(!empty($req->expertise)){
					$expertises = implode(',',$req->expertise);
				}else{
						$expertises='';
					}
				if(!empty($req->badge)){
						//dd($req->badge);
						$badges = implode(',',$req->badge);
						}else{
								$badges='';
							}
				$lawyer= nep_lawyers::Find($req->lid);
				$lawyer->Fill([
					'ref_id' => $req->id,
					'experience' => $req->exp,
					'expertise' => $expertises,
					'badge' => $badges,
					'premium' => $req->pa,
					]);
				$lawyer->save();
			}
		}
		$info=['cdata',$cdata];
    	return redirect()->route('Adminiscontroller/ListLawyer')->with($info);
	}
	public function DeleteLawyer($id){
		 $adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		$info=['cdata',$cdata];
		
		nep_users::Destroy($id);
		 nep_lawyers::where('ref_id','=',$id)
	               ->delete();
    	return redirect()->route('Adminiscontroller/ListLawyer')->with($info);
	}
	public function SearchByEmail($email){
		$user= nep_users::Find($email);
		//dd($user);
	}
}
