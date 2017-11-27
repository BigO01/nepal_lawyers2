<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use App\nep_ratings_comments;
class RatingController extends Controller
{
   
	public function rating_comment(Request $request)
	{
		$this->validate($request, [
            'lawyer_id'               => 'required',
            'user_id'                 => 'required',
            'rate'                	  => 'required',
            'comment'   	        => 'required',
            ]);

      	$input = $request->all();

      	$rating = new nep_ratings_comments;
      	$rating->rated_id = $input['lawyer_id'];
      	$rating->rateing_id = $input['user_id'];
      	$rating->comment = $input['comment'];
      	$rating->rating_star = (int)$input['rate'];
      	$rating->status = 0;
      	$rating->save();

      	return back()->with('msg','Your review has been submitted!');
          
	}
}
