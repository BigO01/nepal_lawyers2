<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;


use App\Http\Requests\courtreq;

use Validator;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\DB;

use App\nep_courts;

use Illuminate\Support\Str;

class CourtController extends Controller
{
    public function __constructor(){
		
		}
	public function AddCourt(){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$info = ['sTitle'=>'Add Court','eTitle'=>'Edit Court', 'pTitle'=>'List Courts', 'cmodel'=> 'CourtModel', 'cdata'=> $cdata ];
		return view('admin/court_add')->with('info', $info);
	}
	public function SaveCourt(courtreq $req){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$court = New nep_courts();
		$court->court_name = strtoupper($req->cname);
		$court->status = $req->status;
		
		//dd($court);
		$court->save();
		$info= ['cdata'=> $cdata];
    	return redirect()->route('Adminiscontroller/ListCourt')->with($info);
	}
	public function ListCourt(){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$courts= nep_courts::all();
		//dd($courts);
		$info = ['sTitle'=>'Add Court', 'pTitle'=>'List Courts','delete'=>'delete_court','edit'=>'edit_court', 'courts'=> $courts,'cdata'=> $cdata];
		return view('admin/courts_list')->with('info', $info);
	}
	public function EditCourt($id){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$court= nep_courts::Find($id);
		//($courtinfo);
		$info = ['sTitle'=>'Add Court','eTitle'=>'Edit Court', 'pTitle'=>'List Courts','cBtnTxt'=>'Cancel','upBtnTxt'=>'Update Record', 'cmodel'=> 'CourtModel', 'court'=>$court, 'cdata'=> $cdata ];
		return view('admin/court_edit')->with('info', $info);
	}
	public function UpdateCourt(courtreq $req){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();		
		
		$court= nep_courts::Find($req->id);
		
		$court->Fill([
			'court_name' => strtoupper($req->cname),
			'status' => $req->status,
		]);
		//dd($court);
		$court->save();
		$info = ['cdata'=> $cdata];
    	return redirect()->route('Adminiscontroller/ListCourt')->with($info);
	}
	public function DeleteCourt($id){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		$info= ['cdata'=> $cdata];
		nep_courts::Destroy($id);
    	return redirect()->route('Adminiscontroller/ListCourt')->with($info);
	}
	
}
