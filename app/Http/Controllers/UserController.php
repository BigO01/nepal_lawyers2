<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;



use App\Http\Requests;



use App\Http\Controllers\Controller;



use Validator;



use Illuminate\Support\Facades\Redirect;



use Illuminate\Support\Facades\DB;



use Illuminate\Support\Str;

use Illuminate\Support\Facades\Crypt;



use App\nep_users;

use App\nep_lawyfirm;

use App\nep_lawyer;

use App\nep_users_info;

use App\Role;

use App\Permission;



/*use DB;*/





class UserController extends Controller

{

    public function __constructor(){

		

		}

	public function AddUser(){
		 $adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		

		$info = ['sTitle'=>'Add User','eTitle'=>'Edit User', 'pTitle'=>'List Users', 'cmodel'=> 'UserModel','cdata'=>$cdata];

		return view('admin/user_add')->with('info', $info);

	}

	public function SaveUser(Request $req){
		 $adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$searchemail= $users= DB::table('users')

					->select('email')

					->where('email',$req->uemail)

					->get();

		if(count($searchemail)==1){

				session()->flash('emailvalidation', $req->uemail.' already exist! Try with another Email Address.');

          session()->flash('emailvalidtion_class','alert-danger');

		  $info = ['sTitle'=>'Add User','eTitle'=>'Edit User', 'pTitle'=>'List Users', 'cmodel'=> 'UserModel','cdata'=>$cdata];

            return view('admin/user_add')->with('info', $info);

			}

		$pimg=$req->uimg;

		//print_r($pimg);exit;

      if($req->uimg){

		  //$pimg = file($req->uimg);

         $pimg_name = time().'.'.$req->uimg->getClientOriginalExtension();

         $pimg->move(public_path('profileimages'), $pimg_name);

      }

      else{

        $pimg_name = '';

      }

		$user = new nep_users();

		$user->first_name = $req->ufname;

		$user->last_name = $req->ulname;

		$user->email = $req->uemail;

		$user->password = bcrypt($req->upswrd);

		$user->image_path = $pimg_name;

		$user->role = $req->urole;
		$user->remember_token = $req->_token;

		$user->status = $req->status;

		

		//print($pimg_name);exit;

		$user->save();

		if($req->urole=='owner'){

				$user->roles()->attach('1');

			}else if($req->urole=='admin'){

				$user->roles()->attach('2');

			}else if($req->urole=='guest'){

				$user->roles()->attach('5');

			}

		//$user->roles()->attach($admin->id);

		$info=['cdata',$cdata];
    	return redirect()->route('Adminiscontroller/ListUser')->with($info);

	}

	public function ListUser(){
		 $adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();

		$users= DB::table('users')

					->select('*')

					->where('role','admin')

					->orwhere('role','guest')
					->orwhere('role','lawyer')
					->orwhere('role','lawfirm')

					->get();

		

		$info = ['sTitle'=>'Add User', 'pTitle'=>'List Users','delete'=>'delete_user','edit'=>'edit_user', 'users'=> $users,'cdata'=>$cdata];

		return view('admin/users_list')->with('info', $info);

	}

	public function EditUser($id){
		 $adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		
		$user= nep_users::Find($id);
		$info = ['sTitle'=>'Add User','eTitle'=>'Edit User', 'pTitle'=>'List Users','cBtnTxt'=>'Cancel','upBtnTxt'=>'Update Record', 'user'=>$user,'cdata'=>$cdata];

		return view('admin/user_edit')->with('info', $info);

	}

	public function UpdateUser(Request $req){
		 $adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		

		$searchemail= $users= DB::table('users')

					->select('id','email')

					->where('email',$req->uemail)

					->get();

					//dd($searchemail);

		if(count($searchemail)==1 && $searchemail[0]->id != $req->id){

			$user= nep_users::Find($req->id);

				session()->flash('emailvalidation', $req->uemail.' already exist! Try with another Email Address.');

          session()->flash('emailvalidtion_class','alert-danger');

		  $info = ['sTitle'=>'Add User','eTitle'=>'Edit User', 'pTitle'=>'List Users', 'cmodel'=> 'UserModel', 'user'=>$user,'cdata'=>$cdata];

            return view('admin/user_edit')->with('info', $info);

			}

		if($req->hasFile('uimg')){

			$pimg=$req->uimg;

			  if($req->uimg){

				 $pimg_name = time().'.'.$req->uimg->getClientOriginalExtension();

				 $pimg->move(public_path('profileimages'), $pimg_name);

			  }

			  else{

				$pimg_name = '';

			  }

				$user= nep_users::Find($req->id);

				$user->Fill([

					'first_name' => $req->ufname,

					'last_name' => $req->ulname,

					'email' => $req->uemail,

					'image_path' => $pimg_name,

					'role' => $req->urole,

					'status' => $req->status,

				]);

				$user->save();

			}

			else{

				

				$user= nep_users::Find($req->id);

				$user->Fill([

					'first_name' => $req->ufname,

					'last_name' => $req->ulname,

					'email' => $req->uemail,

					'role' => $req->urole,

					'status' => $req->status,

				]);

				$user->save();

			}
		$info=['cdata',$cdata];

    	return redirect()->route('Adminiscontroller/ListUser')->with($info);

	}

	public function DeleteUser($id){
		 $adminobj = new Adminiscontroller();
		$cdata = $adminobj->data();
		$info=['cdata',$cdata];
		
		nep_users::Destroy($id);

    	return redirect()->route('Adminiscontroller/ListUser')->with($info);

	}

	public function SearchByEmail($email){

		$user= nep_users::Find($email);

		//dd($user);

	}

	

}

