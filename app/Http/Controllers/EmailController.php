<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Validator;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\DB;

use App\nep_emails;

use Illuminate\Support\Str;

class EmailController extends Controller
{
    public function __constructor(){
		
		}
	public function AddEmail(){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$info = ['sTitle'=>'Add Email','eTitle'=>'Edit Email', 'pTitle'=>'List Emails', 'cmodel'=> 'EmailModel', 'cdata'=> $cdata ];
		return view('admin/email_add')->with('info', $info);
	}
	public function SaveEmail(Request $req){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$email = New nep_emails();
		$email->email = $req->email;
		$email->status = $req->status;
		
		//dd($court);
		$email->save();
		$info= ['cdata'=> $cdata];
    	return redirect()->route('Adminiscontroller/ListEmail')->with($info);
	}
	public function ListEmail(){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$emails= nep_emails::all();
		//dd($courts);
		$info = ['sTitle'=>'Add Email', 'pTitle'=>'List Emails','delete'=>'delete_email','edit'=>'edit_email', 'emails'=> $emails,'cdata'=> $cdata];
		return view('admin/emails_list')->with('info', $info);
	}
	public function EditEmail($id){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$email= nep_emails::Find($id);
		//($courtinfo);
		$info = ['sTitle'=>'Add Email','eTitle'=>'Edit Email', 'pTitle'=>'List Emails','cBtnTxt'=>'Cancel','upBtnTxt'=>'Update Record', 'cmodel'=> 'EmailModel', 'email'=>$email, 'cdata'=> $cdata ];
		return view('admin/email_edit')->with('info', $info);
	}
	public function UpdateEmail(Request $req){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();		
		
		$email= nep_emails::Find($req->id);
		
		$email->Fill([
			'email' => $req->email,
			'status' => $req->status,
		]);
		//dd($court);
		$email->save();
		$info = ['cdata'=> $cdata];
    	return redirect()->route('Adminiscontroller/ListEmail')->with($info);
	}
	public function DeleteEmail($id){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		$info= ['cdata'=> $cdata];
		nep_emails::Destroy($id);
    	return redirect()->route('Adminiscontroller/ListEmail')->with($info);
	}
	
}
