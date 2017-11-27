<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nep_info;
use App\nep_faqs;
use App\nep_questions;
use App\nep_answers;
use App\nep_expertises;
use App\nep_abouts;
use App\nep_cities;
use App\nep_users;
use App\nep_posts;
use App\nep_post_comment;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Validator; //For Form validation

class BlogController extends Controller
{
    public function detail($id)
    {
    	// Home Page to show 
		$web_info = DB::table('info')->select()->first();
		$expertises = DB::table('expertises')->select()->where('status','1')->get();
        $cities = DB::table('cities')->select()->where('status','1')->get();
        $usersName = DB::table('users')->select()->where('status','=','1')->where('role','LIKE','Law%')->get();
        $post = DB::table('posts')->select()->where([['status','1'],['id',$id]])->first();
        $comments = DB::table('post_comment')->select()->where([['status','approve'],['post_id',$id]])->get();
        $users = DB::table('users')->select()->where('status','=','1')->get();
 
	    return view('blog_detail',compact('web_info','expertises','cities','usersName','post','comments','users'));
    }

    public function comment(Request $request)
    {
    	$this->validate($request, [
            'contact_message2'       => 'required',
            'contact_email2'		 => 'required',
            'contact_name'			 => 'required',
        ]);

    	$input = $request->all();

    	$comment = new nep_post_comment([
	        'post_id'      => $input['post_id'],
	        'replier_id'   => $input['replayer_id'],
	        'comment'      => $input['contact_message2'],
	        'status'       =>  'pending',
	        ]);
      	$comment->save();

      	return back()->with(['msg' => 'Your comment has been submitted!']);
    }
}
