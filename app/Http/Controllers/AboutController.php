<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Validator;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

use App\nep_abouts;

use App\nep_info;

class AboutController extends Controller
{
    public function __constructor(){
		
		}
	public function ViewAbout(){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$winfo= nep_abouts::all()->first();
		$info = ['sTitle'=>'Website About','winfo'=> $winfo, 'cdata'=> $cdata];
		return view('admin/view_about')->with('info', $info);
	}
	public function EditAbout($id){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		$winfo= nep_abouts::Find($id);
		//($courtinfo);
		$info = ['sTitle'=>'Change Website About', 'cBtnTxt'=>'Cancel','upBtnTxt'=>'Update Record', 'winfo'=>$winfo, 'cdata'=> $cdata ];
		return view('admin/about_change')->with('info', $info);
	}
	public function UpdateAbout(Request $req){		
		//dd($req);
		$about= nep_abouts::Find($req->id);
		//dd($info);
		$a_img=$req->aimg;
		  if($req->aimg){
			  //$pimg = file($req->uimg);
			 $aimg = time().'.'.$req->aimg->getClientOriginalExtension();
	
			 $a_img->move(public_path('aboutimages'), $aimg);
		  }
	
		  else{
			$aimg = $about->image_path;
		  }
		$about->Fill([
			'about_us' => $req->about_text,
			'our_skills' => $req->skill_text,
			'image_path' => $aimg,
		]);
		$about->save();
		
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$about_text = nep_info::Find(1);
		$about_text->about = $req->about_text;
		$about_text->save(); 

		$info = ['cdata' => $cdata];
    	return redirect()->route('Adminiscontroller/WebAbout');
	}
	/*public function DeleteBar($id){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();

		nep_bars::Destroy($id);
    	$info=['cdata' => $cdata];
		return redirect()->route('Adminiscontroller/ListBar')->with('info',$info);
	}*/
	
}
