<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Validator;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

use App\nep_info;

use App\Http\Requests\barreq;

class InfoController extends Controller
{
    public function __constructor(){
		
		}
	public function AddInfo(){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$info = ['sTitle'=>'Add Info','eTitle'=>'Edit Info', 'pTitle'=>'List Info', 'cmodel'=> 'InfoModel', 'cdata'=> $cdata ];
		return view('admin/info_add')->with('info', $info);
	}
	/*public function SaveInfo(barreq $req){
		
		$info = new nep_Info();
		$bar->bar_name = strtoupper($req->bname);
		$bar->status = $req->status;
		//dd($bar);
		$bar->save();
		
		$info =['cdata'=>$cdata];
    	return redirect()->route('Adminiscontroller/ViewInfo')->with('info',$info);
	}*/
	public function ViewInfo(){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$winfo= nep_info::all()->first();
		$info = ['sTitle'=>'Website Information','winfo'=> $winfo, 'cdata'=> $cdata];
		return view('admin/view_info')->with('info', $info);
	}
	public function EditInfo($id){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		$winfo= nep_info::Find($id);
		//($courtinfo);
		$info = ['sTitle'=>'Change Website Information', 'cBtnTxt'=>'Cancel','upBtnTxt'=>'Update Record', 'winfo'=>$winfo, 'cdata'=> $cdata ];
		return view('admin/info_change')->with('info', $info);
	}
	public function Updateinfo(Request $req){		
		//dd($req);
		$info= nep_info::Find($req->id);
		//dd($info);
		$l_img=$req->limg;
		  if($req->limg){
			  //$pimg = file($req->uimg);
			 $limg = time().'.'.$req->limg->getClientOriginalExtension();
	
			 $l_img->move(public_path('webimages'), $limg);
		  }
	
		  else{
			$limg = $info->logo;
		  }
		  $f_img=$req->fimg;
		  if($req->fimg){
	
			  //$pimg = file($req->uimg);
	
			 $fimg = time().'.'.$req->fimg->getClientOriginalExtension();
	
			 $f_img->move(public_path('webimages'), $fimg);
	
		  }
	
		  else{
			$fimg = $info->favicon;
		  }
		  $a_img=$req->aimg;
		  if($req->aimg){
	
			  //$pimg = file($req->uimg);
	
			 $aimg = time().'.'.$req->aimg->getClientOriginalExtension();
	
			 $a_img->move(public_path('webimages'), $aimg);
	
		  }
	
		  else{
		  $aimg = $info->ad_banner;
		  }
		  $fl_img=$req->flimg;
		  if($req->flimg){
	
			  //$pimg = file($req->uimg);
	
			 $flimg = time().'.'.$req->flimg->getClientOriginalExtension();
	
			 $fl_img->move(public_path('webimages'), $flimg);
	
		  }
	
		  else{
			$flimg = $info->footer_logo;
		  }
		  $tm_img=$req->tmimg;
		  if($req->tmimg){
	
			  //$pimg = file($req->uimg);
	
			 $tmimg = time().'.'.$req->tmimg->getClientOriginalExtension();
	
			 $tm_img->move(public_path('webimages'), $tmimg);
	
		  }
	
		  else{
			$tmimg = $info->textimonial_bg;
		  }
		$info->Fill([
			'web_premium' => $req->prests,
			'title' => $req->webtitle,
			'web_friendlyname' => $req->webfrndname,
			'email' => $req->cemail,
			'contact_number' => $req->contactnumber,
			'facebook' => $req->fbl,
			'google' => $req->gpl,
			'li' => $req->lil,
			'twitter' => $req->tl,
			'keywords' => $req->kw,
			'google_analytics' => $req->ga,
			'description' => $req->descrip,
			'longitude' => $req->longitude,
			'latitude' => $req->latitude,
			'location_title' => $req->location_title,
			'address' => $req->address,
			'full_address' => $req->full_address,
			'api_key' => $req->apikey,
			'currency' => $req->currency,
			'copyright' => $req->cr,
			'logo' => $limg,
			'footer_logo' => $flimg,
			'favicon' => $fimg,
			'ad_banner' => $aimg,
			'testimonial_bg' => $tmimg,
			'ad_banner_status' => $req->ads,
		]);
		$info->save();
		
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$info = ['cdata' => $cdata];
    	return redirect()->route('Adminiscontroller/WebInfo');
	}
	/*public function DeleteBar($id){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();

		nep_bars::Destroy($id);
    	$info=['cdata' => $cdata];
		return redirect()->route('Adminiscontroller/ListBar')->with('info',$info);
	}*/
	
}
