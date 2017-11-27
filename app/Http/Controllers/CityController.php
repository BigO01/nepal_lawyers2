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

use App\nep_cities;

use App\nep_regions;





class CityController extends Controller

{

    public function __constructor(){

		

		}

	public function AddCity(){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$regions = nep_regions::all();
		$states= nep_states::all();

		//dd($users);

		$info = ['sTitle'=>'Add City','eTitle'=>'Edit City', 'pTitle'=>'List Cities', 'states'=> $states ,'cdata'=> $cdata,'regions' => $regions];

		return view('admin/city_add')->with('info', $info);

	}

	public function SaveCity(Request $req){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		

		

		$city = new nep_cities();

		$city->state_id = $req->stname;

		$city->city_name = $req->ctname;

		$city->latitude = $req->ltd;

		$city->longitude = $req->lgd;

		$city->status = $req->status;

		

		//dd($bar);

		$city->save();
		$info = ['cdate'=> $cdata];
    	return back()->with($info);

	}

	public function ListCity(){

		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		

		$cities = DB::table('states')

					->select('*')

					->join('cities', 'states.id', '=', 'cities.state_id')

					->get();

		

		//dd($courts);

		$info = ['sTitle'=>'Add City', 'pTitle'=>'List Cities','delete'=>'delete_city','edit'=>'edit_city', 'cities'=> $cities, 'cdata'=>$cdata];

		return view('admin/cities_list')->with('info', $info);

	}

	public function EditCity($id){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$regions = nep_regions::all();

		$city= nep_cities::Find($id);

		$states= nep_states::all();

		//($courtinfo);

		$info = ['sTitle'=>'Add City','eTitle'=>'Edit City', 'pTitle'=>'List Cities','cBtnTxt'=>'Cancel','upBtnTxt'=>'Update Record', 'regions'=>$regions, 'city'=>$city, 'states'=>$states,'cdata'=> $cdata ];

		return view('admin/city_edit')->with('info', $info);

	}

	public function UpdateCity(Request $req){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$city= nep_cities::Find($req->id);

		//dd($city);

		$city->Fill([

			'state_id' => $req->stname,

			'city_name' => $req->ctname,

			'status' => $req->status,

		]);

		//dd($court);

		$city->save();
		$info= ['cdata'=> $cdata];
    	return redirect()->route('Adminiscontroller/ListCity')->with($info);

	}

	public function DeleteCity($id){
		$adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		$info=['cdata'=> $cdata];
		nep_cities::Destroy($id);

    	return redirect()->route('Adminiscontroller/ListCity')->with($info);

	}

	

}

