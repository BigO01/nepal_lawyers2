<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;



use App\Http\Requests;



use App\Http\Controllers\Controller;



use Validator;



use Illuminate\Support\Facades\Redirect;



use Illuminate\Support\Facades\DB;



use Illuminate\Support\Str;



use App\nep_states;



use App\nep_regions;





class StateController extends Controller

{

    public function __constructor(){
		}

	public function AddState(){
		 $adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$regions= nep_regions::all();

		$info = ['sTitle'=>'Add District','eTitle'=>'Edit District', 'pTitle'=>'List Districts', 'regions'=> $regions,'cdata'=>$cdata ];

		return view('admin/state_add')->with('info', $info);

	}

	public function SaveState(Request $req){
		 $adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		$info=['cdata',$cdata];

		$state = new nep_states();

		$state->region_id = $req->rgname;

		$state->state_name = $req->stname;
		
		$state->longitude = $req->lgd;
		
		$state->latitude = $req->ltd;

		$state->status = $req->status;

		

		//dd($bar);

		$state->save();

    	return back()->with($info);

	}

	public function ListState(){	
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
			$states = DB::table('regions')

					->select('*')

					->join('states', 'regions.id', '=', 'states.region_id')

					->get();

		$info = ['sTitle'=>'Add District', 'pTitle'=>'List Districts','delete'=>'delete_state','edit'=>'edit_state', 'states'=> $states,'cdata'=>$cdata];

		//dd($info);

		return view('admin/states_list')->with('info', $info);

		

	}

	public function EditState($id){
		 $adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();

		$state= nep_states::Find($id);

		$regions= nep_regions::all();

		$info = ['sTitle'=>'Add District','eTitle'=>'Edit District', 'pTitle'=>'List Districts','cBtnTxt'=>'Cancel','upBtnTxt'=>'Update Record', 'state'=>$state, 'regions'=>$regions ,'cdata'=>$cdata];

		return view('admin/state_edit')->with('info', $info);

	}

	public function UpdateState(Request $req){
		 $adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		$info=['cdata',$cdata];

		$state= nep_states::Find($req->id);

		

		$state->Fill([

			'state_name' => $req->stname,

			'region_id' => $req->rgname,
			'longitude' => $req->lgd,
			'latitude' => $req->ltd,

			'status' => $req->status,

		]);

		$state->save();

    	return redirect()->route('Adminiscontroller/ListState')->with($info);

	}

	public function DeleteState($id){
		 $adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		$info=['cdata',$cdata];
		
		nep_states::Destroy($id);

    	return redirect()->route('Adminiscontroller/ListState')->with($info);

	}

	

}

