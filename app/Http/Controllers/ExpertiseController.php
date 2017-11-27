<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Validator;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

use App\nep_expertises;


class ExpertiseController extends Controller
{
    public function __constructor(){
		
		}
	public function AddExpertise(){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$info = ['sTitle'=>'Add Expertise','eTitle'=>'Edit Expertise', 'pTitle'=>'List Expertises','cdata'=> $cdata];
		return view('admin/expertise_add')->with('info', $info);
	}
	public function SaveExpertise(Request $req){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		$info=['cdata'=>$cdata];
		
		$expertise = new nep_expertises();
		$expertise->expertise_name = strtoupper($req->exptname);
		$expertise->status = $req->status;
		
		//dd($bar);
		$expertise->save();
    	return redirect()->route('Adminiscontroller/ListExpertise')->with($info);
	}
	public function ListExpertise(){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$expertises= nep_expertises::all();
		//dd($courts);
		$info = ['sTitle'=>'Add Expertise', 'pTitle'=>'List Expertises','delete'=>'delete_expertise','edit'=>'edit_expertise', 'expertises'=> $expertises,'cdata'=>$cdata];
		return view('admin/expertises_list')->with('info', $info);
	}
	public function EditExpertise($id){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$expertise= nep_expertises::Find($id);
		//($courtinfo);
		$info = ['sTitle'=>'Add Expertise','eTitle'=>'Edit Expertise', 'pTitle'=>'List Expertises','cBtnTxt'=>'Cancel','upBtnTxt'=>'Update Record', 'expertise'=>$expertise,'cdata'=>$cdata];
		return view('admin/expertise_edit')->with('info', $info);
	}
	public function UpdateExpertise(Request $req){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		$info = ['cdata'=>$cdata ];
		$expertise= nep_expertises::Find($req->id)->with($info);
		
		$expertise->Fill([
			'expertise_name' => strtoupper($req->exptname),
			'status' => $req->status,
		]);
		//dd($court);
		$expertise->save();
    	return redirect()->route('Adminiscontroller/ListExpertise');
	}
	public function DeleteExpertise($id){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		$info=['cdata'=>$cdata];
		nep_expertises::Destroy($id);
    	return redirect()->route('Adminiscontroller/ListExpertise')->with($info);
	}
	
}
