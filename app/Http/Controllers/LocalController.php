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

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Validator; //For Form validation

class LocalController extends Controller
{
    public function index()
	{
		// Home Page to show 
		$web_info = DB::table('info')->select()->first();
		$expertises = DB::table('expertises')->select()->where('status','1')->get();
        $cities = DB::table('cities')->select()->where('status','1')->get();
        $usersName = DB::table('users')->select()->where('status','=','1')->where('role','LIKE','Law%')->get();
 
	    return view('home',compact('web_info','expertises','cities','usersName'));
	}

	public function contact()
	{
		// Contact Page show
		$web_info = DB::table('info')->select()->first();
		$expertises = DB::table('expertises')->select()->where('status','1')->get();
        $cities = DB::table('cities')->select()->where('status','1')->get();
        $usersName = DB::table('users')->select()->where('status','=','1')->where('role','LIKE','Law%')->get();

		return view('contact', compact('web_info','expertises','usersName','cities'));
	}

	public function about()
	{
		$web_about = DB::table('abouts')->select()->first();  
		$web_info = DB::table('info')->select()->first();  
 		$faqs = DB::table('faqs')->select()->where('status', '=', '1')->limit(5)->get();
 		$expertises = DB::table('expertises')->select()->where('status','1')->get();
        $cities = DB::table('cities')->select()->where('status','1')->get();
        $usersName = DB::table('users')->select()->where('status','=','1')->where('role','LIKE','Law%')->get();

		return view('about',compact('web_about','web_info','faqs','expertises','cities','usersName'));
	}

	public function faq()
	{
		$web_info = DB::table('info')->select()->first();
        $faqs = DB::table('faqs')->where('status', '=', '1')->paginate(20);
        $expertises = DB::table('expertises')->select()->where('status','1')->get();
        $cities = DB::table('cities')->select()->where('status','1')->get();
        $usersName = DB::table('users')->select()->where('status','=','1')->where('role','LIKE','Law%')->get();

		return view('faq',compact('web_info','faqs','expertises','usersName','cities'));
	}

	public function question_board()
	{
		$web_info = DB::table('info')->select()->first();
		$expertises = DB::table('expertises')->select()->where('status','1')->get();
		$cities = DB::table('cities')->select()->where('status','1')->get();
        $usersName = DB::table('users')->select()->where('status','=','1')->where('role','LIKE','Law%')->get();

		$que_ans = DB::table('users as u')
					->join('questions as que', 'que.user_id', '=', 'u.id')

				    ->select('u.*','que.id as Qid','que.posted_date as Qdate','que.question','que.question_detail')

				    ->where('u.status', '=', '1')
		     		->where('que.status', '=', '1')
		     		->get();


		$answer = DB::table('answers as ans')
				    ->join('users as u', 'u.id', '=', 'ans.replayer_id')

				    ->select('u.*','ans.question_id','ans.replayer_id','ans.answer','ans.posted_date as Adate')

				    ->where('u.status', '=', '1')
		     		->where('ans.status', '=', '1')
		     		->get();
		     		     		


		return view('question_board',compact('web_info','que_ans','answer','expertises','usersName','cities'));
	}

	public function Blog()
	{
		$web_info = DB::table('info')->select()->first();
		$cities = DB::table('cities')->select()->where('status','1')->get();
        $usersName = DB::table('users')->select()->where('status','=','1')->where('role','LIKE','Law%')->get();
        $expertises = DB::table('expertises')->select()->where('status','1')->get();
        $posts = DB::table('posts')->select()->where('status','1')->paginate(8);

		return view('blog',compact('web_info','cities','usersName','expertises','posts'));
	}

	public function lawyerGetListed()
	{
		$web_info = DB::table('info')->select()->first();
		$cities = DB::table('cities')->select()->where('status','1')->get();
        $usersName = DB::table('users')->select()->where('status','=','1')->where('role','LIKE','Law%')->get();
        $expertises = DB::table('expertises')->select()->where('status','1')->get();
		return view('lawyerGetListed',compact('web_info','cities','usersName','expertises'));
	}
}