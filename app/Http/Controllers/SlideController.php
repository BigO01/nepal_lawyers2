<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Validator;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

use App\nep_slides;

class SlideController extends Controller
{
    public function __constructor(){
		
		}
	public function AddSlide(){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$info = ['sTitle'=>'Add Slide','eTitle'=>'Edit Slide', 'pTitle'=>'List Slides', 'cdata'=> $cdata ];
		return view('admin/slide_add')->with('info', $info);
	}
	public function SaveSlide(Request $req){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		$sl_img=$req->slideimg_input;
		  if($req->slideimg_input){
			  //$pimg = file($req->uimg);
			 $slimg = time().'.'.$req->slideimg_input->getClientOriginalExtension();
	
			 $sl_img->move(public_path('sliderimages'), $slimg);
		  }
	
		  else{
			$slimg = '';
		  }
		
		$slide = new nep_slides();
		$slide->slide_heading = $req->heading;
		$slide->slide_subheading = $req->subheading;
		$slide->slide_text = $req->slidetext;
		$slide->image_path =  $slimg;
		$slide->status = $req->status;
		//dd($bar);
		$slide->save();
		
		$info =['cdata'=>$cdata];
    	return redirect()->route('Adminiscontroller/ListSlide')->with('info',$info);
	}
	public function ListSlide(){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$slides= nep_slides::all();
		$info = ['sTitle'=>'Add Slide', 'pTitle'=>'List Slides','delete'=>'delete_slide','edit'=>'edit_slide', 'slides'=> $slides, 'cdata'=> $cdata];
		return view('admin/slides_list')->with('info', $info);
	}
	public function EditSlide($id){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		$slide= nep_slides::Find($id);
		//($courtinfo);
		$info = ['sTitle'=>'Add Slide','eTitle'=>'Edit Slide', 'pTitle'=>'List Slides','cBtnTxt'=>'Cancel','upBtnTxt'=>'Update Record', 'slide'=>$slide, 'cdata'=> $cdata ];
		return view('admin/slide_edit')->with('info', $info);
	}
	public function UpdateSlide(Request $req){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$slide= nep_slides::Find($req->id);
		//dd($badge);
		$sl_img=$req->slideimg_input;
		  if($req->slideimg_input){
			  //$pimg = file($req->uimg);
			 $slimg = time().'.'.$req->slideimg_input->getClientOriginalExtension();
	
			 $sl_img->move(public_path('sliderimages'), $slimg);
		  }
	
		  else{
			$slimg = $slide->image_path;
		  }
		
		
		
		$slide->Fill([
			'slide_heading' => $req->heading,
			'slide_subheading' => $req->subheading,
			'slide_text' => $req->slidetext,
			'image_path' => $slimg,
			'status' => $req->status,
		]);
		//dd($court);
		$slide->save();
		$info = ['cdata' => $cdata];
    	return redirect()->route('Adminiscontroller/ListSlide');
	}
	public function DeleteSlide($id){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();

		nep_slides::Destroy($id);
    	$info=['cdata' => $cdata];
		return redirect()->route('Adminiscontroller/ListSlide')->with('info',$info);
	}
	
}
