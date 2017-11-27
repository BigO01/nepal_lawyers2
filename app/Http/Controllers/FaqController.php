<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Validator;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

use App\nep_faqs;

class FaqController extends Controller
{
    public function __constructor(){
		
		}
	public function AddFaq(){
		//$users= Users::all();
		//dd($users);
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		$info = ['sTitle'=>'Add Faq','eTitle'=>'Edit Faq', 'pTitle'=>'List Faqs','cdata'=>$cdata];
		return view('admin/faq_add')->with('info', $info);
	}
	public function SaveFaq(request $req){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		$info=['cdata',$cdata];
		$faq = new nep_faqs();
		$faq->question = $req->ques;
		$faq->answer = $req->ans;
		$faq->status = $req->status;
		
		//dd($bar);
		$faq->save();
    	return redirect()->route('Adminiscontroller/ListFaq')->with($info);
	}
	public function ListFaq(){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$faqs= nep_faqs::all();
		//dd($courts);
		$info = ['sTitle'=>'Add Faq', 'pTitle'=>'List Faqs','delete'=>'delete_faq','edit'=>'edit_faq', 'faqs'=> $faqs,'cdata'=> $cdata];
		
		return view('admin/faqs_list')->with('info', $info);
	}
	public function EditFaq($id){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$faq= nep_faqs::Find($id);
		//($courtinfo);
		$info = ['sTitle'=>'Add Faq','eTitle'=>'Edit Faq', 'pTitle'=>'List Faqs','cBtnTxt'=>'Cancel','upBtnTxt'=>'Update Record', 'faq'=>$faq,'cdata'=>$cdata];
		return view('admin/faq_edit')->with('info', $info);
	}
	public function UpdateFaq(request $req){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		$info=['cdata',$cdata];
		
		$faq= nep_faqs::Find($req->id);
		
		$faq->Fill([
			'question' => $req->ques,
			'answer' => nl2br($req->ans),
			'status' => $req->status,
		]);
		//dd($court);
		$faq->save();
    	return redirect()->route('Adminiscontroller/ListFaq')->with($info);
	}
	public function DeleteFaq($id){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		$info=['cdata',$cdata];
		nep_faqs::Destroy($id);
    	return redirect()->route('Adminiscontroller/ListFaq')->with($info);
	}
	
}
