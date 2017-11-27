<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Validator;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

use App\nep_testimonials;

class TestimonialController extends Controller
{
    public function __constructor(){
		
		}
	public function AddTestimonial(){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$info = ['sTitle'=>'Add Testimonial','eTitle'=>'Edit Testimonial', 'pTitle'=>'List Testimonials','cdata'=> $cdata];
		return view('admin/testimonial_add')->with('info', $info);
	}
	public function SaveTestimonial(Request $req){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		$info=['cdata',$cdata];
		
		$pimg=$req->uimg;

			  if($req->uimg){

				 $pimg_name = time().'.'.$req->uimg->getClientOriginalExtension();

				 $pimg->move(public_path('testimonialimages'), $pimg_name);

			  }

			  else{

				$pimg_name = '';

			  }
		
		$testi = new nep_testimonials();
		$testi->name = $req->uname;
		$testi->designation = $req->desig;
		$testi->message = $req->msg;
		$testi->image_path = $pimg_name;
		$testi->status = $req->status;
		
		//dd($bar);
		$testi->save();
    	return redirect()->route('Adminiscontroller/ListTestimonial')->with($info);
	}
	public function ListTestimonial(){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$testis= nep_testimonials::all();
		//dd($langs);
		$info = ['sTitle'=>'Add Testimonial', 'pTitle'=>'List Testimonials','delete'=>'delete_testimonial','edit'=>'edit_testimonial', 'testis'=> $testis,'cdata'=> $cdata];
		return view('admin/testimonials_list')->with('info', $info);
	}
	public function EditTestimonial($id){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		
		$testi= nep_testimonials::Find($id);
		//($courtinfo);
		$info = ['sTitle'=>'Add Testimonial','eTitle'=>'Edit Testimonial', 'pTitle'=>'List Testimonials','cBtnTxt'=>'Cancel','upBtnTxt'=>'Update Record', 'testi'=>$testi,'cdata'=>$cdata];
		return view('admin/testimonial_edit')->with('info', $info);
	}
	public function UpdateTestimonial(Request $req){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		$info=['cdata',$cdata];
		
		$testi= nep_testimonials::Find($req->id);
		
		$pimg=$req->uimg;
			  if($req->uimg){
				 $pimg_name = time().'.'.$req->uimg->getClientOriginalExtension();
				 $pimg->move(public_path('testimonialimages'), $pimg_name);
			  }
			  else{
				$pimg_name = $testi->image_path;
			  }
		$testi->Fill([
			'name' =>$req->uname,
			'designation'=>$req->desig,
			'message'=>$req->msg,
			'image_path'=>$pimg_name,
			'status' => $req->status,
		]);
		//dd($court);
		$testi->save();
    	return redirect()->route('Adminiscontroller/ListTestimonial')->with($info);
	}
	public function DeleteTestimonial($id){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		$info=['cdata',$cdata];
		nep_testimonials::Destroy($id);
    	return redirect()->route('Adminiscontroller/ListTestimonial')->with($info);
	}
	
}
