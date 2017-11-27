<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

use App\nep_claimprofile;

class ClaimprofilController extends Controller
{
    public function claim(Request $request)
    {
    	
    	$this->validate($request, [
            'name_claim'   => 'required',
            'email_claim'  => 'required',
            'cell_claim'   => 'required',
            'checkbox'     => 'required',
            'id_claim'	   => 'required',
          ]);

    	$input = $request->all();

    	$value = new nep_claimprofile;
    	$value->user_id = $input['id_claim'];
    	$value->user_name = $input['name_claim'];
    	$value->email = $input['email_claim'];
    	$value->contact = $input['cell_claim'];
    	$value->termsconditions = (int)$input['checkbox'];
    	$value->status = 'pending';
    	$value->save();

    	return back()->with('msg','Your request has been submit!');
    }
}
