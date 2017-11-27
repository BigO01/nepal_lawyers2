<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Validator;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

use App\nep_regions;


class RegionController extends Controller
{
    public function __constructor(){
		
		}
	public function AddRegion(){
		 $adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$info = ['sTitle'=>'Add Province','eTitle'=>'Edit Province', 'pTitle'=>'List Provinces','cdata'=>$cdata];
		return view('admin/region_add')->with('info', $info);
	}
	public function SaveRegion(Request $req){
		 $adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		$info=['cdata',$cdata];
		
		$region = new nep_regions();
		$region->region_name = $req->rgname;
		$region->longitude = $req->lgd;
		$region->latitude = $req->ltd;
		$region->status = $req->status;
		
		//dd($bar);
		$region->save();
    	return back()->with($info);
	}
	public function ListRegion(){
		 $adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$regions= nep_regions::all();
		$info = ['sTitle'=>'Add Province', 'pTitle'=>'List Provinces','delete'=>'delete_region','edit'=>'edit_region', 'regions'=> $regions,'cdata'=>$cdata];
		return view('admin/regions_list')->with('info', $info);
	}
	public function EditRegion($id){
		 $adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$region= nep_regions::Find($id);
		$info = ['sTitle'=>'Add Province','eTitle'=>'Edit Province', 'pTitle'=>'List Provinces','cBtnTxt'=>'Cancel','upBtnTxt'=>'Update Record', 'region'=>$region,'cdata'=>$cdata];
		return view('admin/region_edit')->with('info', $info);
	}
	public function UpdateRegion(Request $req){
		 $adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		$info=['cdata',$cdata];
		
		$region= nep_regions::Find($req->id);
		
		$region->Fill([
			'region_name' => $req->rgname,
			'longitude' => $req->lgd,
			'latitude' => $req->ltd,
			'status' => $req->status,
		]);
		//dd($court);
		$region->save();
    	return redirect()->route('Adminiscontroller/ListRegion')->with($info);
	}
	public function DeleteRegion($id){
		 $adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		$info=['cdata',$cdata];
		
		nep_regions::Destroy($id);
    	return redirect()->route('Adminiscontroller/ListRegion')->with($info);
	}
	
}
