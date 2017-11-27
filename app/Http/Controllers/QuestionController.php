<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\question;
use App\Http\Controllers\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\DB;
use Validator;

use App\nep_lawyers;
use App\nep_users;
use App\User;
use App\nep_lawfirms;
use App\nep_questions;
use App\nep_answers;

class QuestionController extends Controller
{
  	public function submit(question $request)
  	{
  		$input = $request->all();
  		$id = \Auth::user()->id;

        $msg = $input['message'];
        $detail = $input['detail'];

  		$question = new nep_questions([
        'question'          => $msg,
        'question_detail'   => $detail,
        'user_id'           => $id,
        'status'	          => 0,
        ]);
        $question->save(); 

        return redirect()->route('home')->with('msg','Your question has been submitted!');
  	}  

    public function ans(Request $request)
    {
      $this->validate($request, [
              'ans' => 'required',
          ]);
      $input = $request->all();

      $answer = new nep_answers([
          'question_id' =>  $input['q_id'],
          'replayer_id' =>  $input['r_id'],
          'answer'      =>  $input['ans'],
          'status'      =>  0,
        ]);
      $answer->save();

      return redirect()->route('questions')->with('msg','Your answers has been submitted!');

    }

}
