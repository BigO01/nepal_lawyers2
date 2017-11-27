<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Validator;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

use App\nep_badges;

class BadgeController extends Controller
{
    public function __constructor(){
		
		}
	public function AddBadge(){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$info = ['sTitle'=>'Add Badge','eTitle'=>'Edit Badge', 'pTitle'=>'List Badges', 'cdata'=> $cdata ];
		return view('admin/badge_add')->with('info', $info);
	}
	public function SaveBadge(Request $req){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		$b_img=$req->bimg_input;
		  if($req->bimg_input){
			  //$pimg = file($req->uimg);
			 $bimg = time().'.'.$req->bimg_input->getClientOriginalExtension();
	
			 $b_img->move(public_path('webimages'), $bimg);
		  }
	
		  else{
			$bimg = $badge->image_path;
		  }
		
		$badge = new nep_badges();
		$badge->badge_title = $req->bdname;
		$badge->image_path =  $bimg;
		$badge->color = $req->color;
		$badge->status = $req->status;
		//dd($bar);
		$badge->save();
		
		$info =['cdata'=>$cdata];
    	return redirect()->route('Adminiscontroller/ListBadge')->with('info',$info);
	}
	public function ListBadge(){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$badges= nep_badges::all();
		$info = ['sTitle'=>'Add Badge', 'pTitle'=>'List Badges','delete'=>'delete_badge','edit'=>'edit_badge', 'badges'=> $badges, 'cdata'=> $cdata];
		return view('admin/badges_list')->with('info', $info);
	}
	public function EditBadge($id){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		$badge= nep_badges::Find($id);
		//($courtinfo);
		$info = ['sTitle'=>'Add Badge','eTitle'=>'Edit Badge', 'pTitle'=>'List Badges','cBtnTxt'=>'Cancel','upBtnTxt'=>'Update Record', 'badge'=>$badge, 'cdata'=> $cdata ];
		return view('admin/badge_edit')->with('info', $info);
	}
	public function UpdateBadge(Request $req){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$badge= nep_badges::Find($req->id);
		//dd($badge);
		$b_img=$req->bimg_input;
		  if($req->bimg_input){
			  //$pimg = file($req->uimg);
			 $bimg = time().'.'.$req->bimg_input->getClientOriginalExtension();
	
			 $b_img->move(public_path('webimages'), $bimg);
		  }
	
		  else{
			$bimg = $badge->image_path;
		  }
		
		
		
		$badge->Fill([
			'badge_title' => $req->bdname,
			'color' => $req->color,
			'image_path' => $bimg,
			'status' => $req->status,
		]);
		//dd($court);
		$badge->save();
		$info = ['cdata' => $cdata];
    	return redirect()->route('Adminiscontroller/ListBadge');
	}
	public function DeleteBadge($id){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();

		nep_badges::Destroy($id);
    	$info=['cdata' => $cdata];
		return redirect()->route('Adminiscontroller/ListBadge')->with('info',$info);
	}
	
}
