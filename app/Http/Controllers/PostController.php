<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Validator;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

use App\nep_posts;


class PostController extends Controller
{
    public function __constructor(){
		
		}
	public function AddPost(){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$info = ['sTitle'=>'Add Post','eTitle'=>'Edit Post', 'pTitle'=>'List Posts', 'cmodel'=> 'BarModel', 'cdata'=> $cdata ];
		return view('admin/post_add')->with('info', $info);
	}
	public function SavePost(Request $req){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$p_img=$req->pimg;
		  if($req->pimg){
			  //$pimg = file($req->uimg);
			 $pimg = time().'.'.$req->pimg->getClientOriginalExtension();
	
			 $p_img->move(public_path('blogimages'), $pimg);
		  }
	
		  else{
			$bimg = '';
		  }
		
		$post = new nep_posts();
		$post->post_title = $req->post_title;
		$post->descryption = $req->desc;
		$post->posted_by = $req->user_id;
		$post->image_path = $pimg;
		$post->status = $req->status;
		//dd($bar);
		$post->save();
		
		$info =['cdata'=>$cdata];
    	return redirect()->route('Adminiscontroller/ListPost')->with('info',$info);
	}
	public function ListPost(){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$posts= nep_posts::all();
		$info = ['sTitle'=>'Add Post', 'pTitle'=>'List Posts','delete'=>'delete_post','edit'=>'edit_post', 'posts'=> $posts, 'cdata'=> $cdata];
		return view('admin/posts_list')->with('info', $info);
	}
	public function EditPost($id){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		$post= nep_posts::Find($id);
		//($courtinfo);
		$info = ['sTitle'=>'Add Post','eTitle'=>'Edit Post', 'pTitle'=>'List Posts','cBtnTxt'=>'Cancel','upBtnTxt'=>'Update Record', 'post'=> $post, 'cdata'=> $cdata ];
		//dd($info);
		return view('admin/post_edit')->with('info', $info);
	}
	public function UpdatePost(Request $req){
		//dd($req->pimg);
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		$post= nep_posts::Find($req->id);
		$p_img=$req->pimg;
		  if($req->pimg){
			 //$pimg = file($req->pimg);
			 $pimg = time().'.'.$req->pimg->getClientOriginalExtension();
	
			 $p_img->move(public_path('blogimages'), $pimg);
		  }
	
		  else{
			$pimg = $post->image_path;
		  }
		  
		$post->Fill([
			'post_title' => $req->post_title,
			'descryption' => $req->desc,
			'posted_by' => $req->user_id,
			'image_path' => $pimg,
			'status' => $req->status,
		]);
		//dd($court);
		$post->save();
		$info = ['cdata' => $cdata];
    	return redirect()->route('Adminiscontroller/ListPost');
	}
	public function DeletePost($id){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();

		nep_posts::Destroy($id);
    	$info=['cdata' => $cdata];
		return redirect()->route('Adminiscontroller/ListPost')->with('info',$info);
	}
	
}
