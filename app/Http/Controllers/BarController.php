<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Validator;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

use App\nep_bars;

use App\Http\Requests\barreq;

class BarController extends Controller
{
    public function __constructor(){
		
		}
	public function AddBar(){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$info = ['sTitle'=>'Add Bar','eTitle'=>'Edit Bar', 'pTitle'=>'List Bars', 'cmodel'=> 'BarModel', 'cdata'=> $cdata ];
		return view('admin/bar_add')->with('info', $info);
	}
	public function SaveBar(barreq $req){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$bar = new nep_bars();
		$bar->bar_name = strtoupper($req->bname);
		$bar->status = $req->status;
		//dd($bar);
		$bar->save();
		
		$info =['cdata'=>$cdata];
    	return redirect()->route('Adminiscontroller/ListBar')->with('info',$info);
	}
	public function ListBar(){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$bars= nep_bars::all();
		$info = ['sTitle'=>'Add Bar', 'pTitle'=>'List Bars','delete'=>'delete_bar','edit'=>'edit_bar', 'bars'=> $bars, 'cdata'=> $cdata];
		return view('admin/bars_list')->with('info', $info);
	}
	public function EditBar($id){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		$bar= nep_bars::Find($id);
		//($courtinfo);
		$info = ['sTitle'=>'Add Bar','eTitle'=>'Edit Bar', 'pTitle'=>'List Bars','cBtnTxt'=>'Cancel','upBtnTxt'=>'Update Record', 'bar'=>$bar, 'cdata'=> $cdata ];
		return view('admin/bar_edit')->with('info', $info);
	}
	public function UpdateBar(barreq $req){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();

		
		$bar= nep_bars::Find($req->id);
		
		$bar->Fill([
			'bar_name' => strtoupper($req->bname),
			'status' => $req->status,
		]);
		//dd($court);
		$bar->save();
		$info = ['cdata' => $cdata];
    	return redirect()->route('Adminiscontroller/ListBar');
	}
	public function DeleteBar($id){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();

		nep_bars::Destroy($id);
    	$info=['cdata' => $cdata];
		return redirect()->route('Adminiscontroller/ListBar')->with('info',$info);
	}
	
}
