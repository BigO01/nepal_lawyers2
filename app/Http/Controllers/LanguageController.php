<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Validator;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

use App\nep_languages;

use App\Http\Requests\langreq;

class LanguageController extends Controller
{
    public function __constructor(){
		
		}
	public function AddLanguage(){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$info = ['sTitle'=>'Add Language','eTitle'=>'Edit Language', 'pTitle'=>'List Languages', 'cmodel'=> 'LanguageModel','cdata'=> $cdata];
		return view('admin/language_add')->with('info', $info);
	}
	public function SaveLanguage(langreq $req){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		$info=['cdata',$cdata];
		
		$lang = new nep_languages();
		$lang->lang_name = strtoupper($req->langname);
		$lang->status = $req->status;
		
		//dd($bar);
		$lang->save();
    	return redirect()->route('Adminiscontroller/ListLanguage')->with($info);
	}
	public function ListLanguage(){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$langs= nep_languages::all();
		//dd($langs);
		$info = ['sTitle'=>'Add Language', 'pTitle'=>'List Languages','delete'=>'delete_language','edit'=>'edit_language', 'langs'=> $langs,'cdata'=> $cdata];
		return view('admin/languages_list')->with('info', $info);
	}
	public function EditLanguage($id){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		
		$lang= nep_languages::Find($id);
		//($courtinfo);
		$info = ['sTitle'=>'Add Language','eTitle'=>'Edit Language', 'pTitle'=>'List Languages','cBtnTxt'=>'Cancel','upBtnTxt'=>'Update Record', 'lang'=>$lang,'cdata'=>$cdata];
		return view('admin/language_edit')->with('info', $info);
	}
	public function UpdateLanguage(langreq $req){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		$info=['cdata',$cdata];
		
		$lang= nep_languages::Find($req->id);
		
		$lang->Fill([
			'lang_name' => strtoupper($req->langname),
			'status' => $req->status,
		]);
		//dd($court);
		$lang->save();
    	return redirect()->route('Adminiscontroller/ListLanguage')->with($info);
	}
	public function DeleteLanguage($id){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		$info=['cdata',$cdata];
		nep_languages::Destroy($id);
    	return redirect()->route('Adminiscontroller/ListLanguage')->with($info);
	}
	
}
