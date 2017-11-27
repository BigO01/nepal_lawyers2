<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Registration;
use App\Http\Requests\signup2;
use App\Http\Requests\member;
use App\Http\Requests\lawyer;
use App\Http\Requests\lawfirm;
use Laravel\Socialite\Facades\Socialite;
use App\nep_lawyers;
use App\nep_users;
use App\User;
use App\nep_certificates;
use App\nep_photos;
use App\nep_lawyer_edu;
use App\nep_expertises;
use App\nep_lawyer_expertise;
use App\nep_days_time;
use App\nep_lawfirms;
use App\nep_notifications;
use App\nep_regions;
use App\nep_cities;
use App\nep_states;
use App\nep_bars;
use App\nep_courts;
use App\nep_languages;
use App\Permission;
use App\Role;
use App\nep_info;

use Illuminate\Support\Facades\URL;
use Intervention\Image\ImageManager;
use App\Http\Controllers\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\DB;
use Validator;
use Crypt;

class RegisterController extends Controller
{

    public function index()
    {
        $web_info = DB::table('info')->select()->first();
        $expertises = DB::table('expertises')->select()->where('status','1')->get();
        $cities = DB::table('cities')->select()->where('status','1')->get();
        $usersName = DB::table('users')->select()->where('status','=','1')->where('role','LIKE','Law%')->get();
        return view('registration', compact('web_info','expertises','usersName','cities'));
    }

    /* Signup general data */
    public function signup($ee = NULL,$fe = NULL,$le = NULL)
    {
        $web_info = DB::table('info')->select()->first();
        $expertises = DB::table('expertises')->select()->where('status','1')->get();
        $cities = DB::table('cities')->select()->where('status','1')->get();
        $usersName = DB::table('users')->select()->where('status','=','1')->where('role','LIKE','Law%')->get();
         // Data come from email selection
         if($ee){
            $de = Crypt::decrypt($ee);
            $df = Crypt::decrypt($fe);
            $dl = Crypt::decrypt($le); 
         
            $data = [
                'email' => $de,
                'fname' => $df,
                'lname' => $dl,
                'img'   => '',
                ];
          }
          // Get data from API's
          else{
        
            $name = session()->get('name');
            $email = session()->get('email');
            $img = session()->get('img');
            
            $data = [
                'email' => $email,
                'fname' => $name,
                'img'   => $img,
                'lname' => '',
                ];
        
        } 
        
        // Check email already exist in DB
        if (DB::table('users')->where('email', '=',$data['email'])->exists()) {
          
          session()->flash('msg', 'This email already exist! Try with another email..');
          session()->flash('msg_class','alert-success');
          return redirect()->route('login');
          }
          else{

          // Check for if user email not featch
          if(empty($data['email'])){
            session()->flash('msg', 'Oops... We did not found your email address, Please try with your email!');
            session()->flash('msg_class','alert-danger');
            return view('registration', compact('web_info','expertises','usersName','cities'));
          }

        // retrive all regions and pass to view
        $regions = DB::table('regions')->select()->get();

        return view('getstarted', compact('data', 'regions','web_info','expertises','usersName','cities')); 
      }
    }// End Signup function


    /* Lawyer add on the request of lawfirm */
    public function signedUp($id ,$email)
    {
        $web_info = DB::table('info')->select()->first();
        $expertises = DB::table('expertises')->select()->where('status','1')->get();
        $cities = DB::table('cities')->select()->where('status','1')->get();
        $usersName = DB::table('users')->select()->where('status','=','1')->where('role','LIKE','Law%')->get();
         // Data come from email selection

            $id = Crypt::decrypt($id);
            $email = Crypt::decrypt($email);
         
        // Check email already exist in DB
        if (DB::table('users')->where('email', '=',$email)->exists()) {
          
          session()->flash('msg', 'This email already exist! Try with another email..');
          session()->flash('msg_class','alert-success');
          return redirect()->route('login');
          }
          else{

        // retrive all regions and pass to view
        $regions = DB::table('regions')->select()->get();
        $firm = DB::table('users')->select()->where('id','=',$id)->first();

        return view('requestedLawyerForm', compact('email', 'regions','web_info','firm','expertises','usersName','cities')); 
      }
    }// End SignedUp function

    public function lawyer_request(Request $request)
    {

      $web_info = DB::table('info')->select()->first();
      $expertises = DB::table('expertises')->select()->where('status','1')->get();
        $cities = DB::table('cities')->select()->where('status','1')->get();
        $usersName = DB::table('users')->select()->where('status','=','1')->where('role','LIKE','Law%')->get();

      $this->validate($request, [
            'new_img'                 => 'mimes:jpeg,jpg,png|max:5000',
            'email'                   => 'required',
            'fname'                   => 'required',
            'dob'                     => 'required',
            'license'                 => 'required',
            'password'                => 'required|between:8,30|confirmed',
            'password_confirmation'   => 'required|between:8,30',
            'checkBox'                => 'required',
          ]);

      $input = $request->all();

            // This code is for to save profile image 
      $cover_image = $request->file('new_img');

      if($cover_image){

         $cover_image_file_name = time().'.'.$cover_image->getClientOriginalExtension();
         $cover_image->move(public_path('profileimages'), $cover_image_file_name);
      }
      elseif(!empty($input['img'])){
        $url = $input['img'];
       $cover_image_file_name = time().'.jpg';
       file_put_contents(public_path('profileimages/'.$cover_image_file_name), file_get_contents($url));
      }
      else{
        $cover_image_file_name = "dummy.png";
      }

      /* Data store in USER table */        
      $users = new nep_users([
        'email'      => $input['email'],
        'first_name'      => $input['fname'],
        'image_path'      => $cover_image_file_name ,
        'password'        =>  bcrypt($input['password']),
        'role'            => 'lawyer',
        'term_condition'  => (int)$input['checkBox'],
        ]);
      $users->save();

      $id = $users->id; 

      /* Data store in Lawyer table */
      $lawyer = new nep_lawyers([
        'ref_id'          => $id,
        'law_firm_id'     => $input['firmname'],
        'license_number'  => $input['license'],
        'dob'             => $input['dob'],
        ]);
      $lawyer->save(); 

      // Send notification to dashboard
      $noti = new nep_notifications([
        'ref_id'    =>  $id,
        'message'   =>  "This lawyer want to register!",
        'user_type' =>  'lawyer',
        'data_type' =>  'license',
        'type'      =>  'register',
        'status'    =>  'pending',
        ]);
      $noti->save();

      \Auth::loginUsingId($id);

      return redirect()->route('home')->with('msg', 'You have successfully registerd, Now please complete your profile in setting section!');

    }



    // Here select categorie in which user fall   
    public function signup2(signup2 $request)
    {
        $web_info = DB::table('info')->select()->first();
        $expertises = DB::table('expertises')->select()->where('status','1')->get();
        $cities = DB::table('cities')->select()->where('status','1')->get();
        $usersName = DB::table('users')->select()->where('status','=','1')->where('role','LIKE','Law%')->get();


        $input = $request->all(); //Get data from previous form

        if (DB::table('users')->where('email', '=',$input['email'])->exists()) {
          
          session()->flash('msg', 'This email already exist! Try with another email..');
          session()->flash('msg_class','alert-success');
            return view('registration', compact('web_info','expertises','usersName','cities'));
          }
          else{

        $img = $input['img'];
          if(!empty($input['img']))
          {
           $url = $input['img'];

          //Download facebook/google image
           $img = time().'.jpg';
           file_put_contents(public_path('profileimages/'.$img), file_get_contents($url));
            }

        /* Data store in USER table */        
        $users = new nep_users([
        'region_id'       => $input['region'],
        'email'      => $input['email'],
        'first_name'      => $input['fname'],
        'last_name'       =>  $input['lname'],
        'image_path'      => $img ,
        'password'        =>  bcrypt($input['password']),
        'role'            => $input['register'],
        'term_condition'  => (int)$input['checkBox'],
        ]);
         $users->save(); 

        /* Get user id to pass into next form */
        $user_id = $users->id;   
        
        /* User Role */
        if($input['register'] == 'guest'){
                $users->roles()->attach('5');  
        }
        else if($input['register'] == 'lawyer'){
                $users->roles()->attach('4'); 

                $lawyer = new nep_lawyers([
                'ref_id'  => $user_id,
                ]);
                $lawyer->save();
                $lawyer_id = $lawyer->id;

                $input['l_id'] = $lawyer_id;
        }
        else{
                $users->roles()->attach('3');
                $lawfirm = new nep_lawfirms([
                'ref_id'  => $user_id,
                ]);
                $lawfirm->save();
                $lawfirm_id = $lawfirm->id;

                $input['l_id'] = $lawfirm_id; 
        }

        /* Save id in $input variable */
        $input['id'] = $user_id;     

        // If user is MEMBER
        if($input['register'] == 'guest'){
          session()->put('data', $input);
          return redirect()->route('member_form');

        }// End if

        // If user is LAWYER        
        elseif($input['register'] == 'lawyer')
        {
            session()->put('data', $input);
            return redirect()->route('lawyer_form');
        }

        // If user is LAWFIRM
        else
        {
          session()->put('data', $input);
           return redirect()->route('lawfirm_form');
        }

      }// else close  
  
    }// function close


/*$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$*/ 

    // Load view of MEMBER form with data
    public function member_form()
    {

      $input = \Session::get('data');
      $web_info = DB::table('info')->select()->first();
      $expertises = DB::table('expertises')->select()->where('status','1')->get();
      $cities = DB::table('cities')->select()->where('status','1')->get();
      $usersName = DB::table('users')->select()->where('status','=','1')->where('role','LIKE','Law%')->get();

      // These states fetch accoring to region that selected before      
      $states = DB::table('states')->select()->where('region_id', '=',$input['region'])->get();

      return view('userForm', compact('input', 'states','web_info','expertises','usersName','cities'));
    }

/*$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$*/     

    // Load view of LAWYER form with data
    public function lawyer_form()
    {
      $input = \Session::get('data');

      $web_info = DB::table('info')->select()->first();
      $expertises = DB::table('expertises')->select()->where('status','1')->get();
      $cities = DB::table('cities')->select()->where('status','1')->get();
      $usersName = DB::table('users')->select()->where('status','=','1')->where('role','LIKE','Law%')->get();
       // These states fetch accoring to region that selected before 
       $states = DB::table('states')->select()->where('region_id', '=',$input['region'])->get();

      // $bars = DB::table('bars')->select()->where('status','1')->get();
      // $courts = DB::table('courts')->select()->where('status','1')->get();
      $firm_id = DB::table('lawfirms')->select()->get();
      $firm_name = DB::table('users')->select()->where('role','lawfirm')->where('status','1')->get();
      // $languages = DB::table('languages')->select()->where('status','1')->get();
      // $expertises = DB::table('expertises')->select()->where('status','1')->get();

      return view('lawyerform', compact('input','states','firm_id','firm_name','web_info','expertises','usersName','cities' ));
    }

/*$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$*/     

    // Load view of LAWFIRM form with data
    public function lawfirm_form()
    {
      $input = \Session::get('data');

      $web_info = DB::table('info')->select()->first();
      $expertises = DB::table('expertises')->select()->where('status','1')->get();
        $cities = DB::table('cities')->select()->where('status','1')->get();
        $usersName = DB::table('users')->select()->where('status','=','1')->where('role','LIKE','Law%')->get();
      $states = DB::table('states')->select()->where('region_id', '=',$input['region'])->get();

      // $bars = DB::table('bars')->select()->where('status','1')->get();
      // $courts = DB::table('courts')->select()->where('status','1')->get();
      // $languages = DB::table('languages')->select()->where('status','1')->get();
      // $expertises = DB::table('expertises')->select()->where('status','1')->get();

      return view('lawfirmForm', compact('input', 'states','web_info','expertises','usersName','cities'));
    }    

/*$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$*/     


    // Lawyer Register in Member table
    public function member(member $request)
    {
      session()->forget('data');
      $input = $request->all();

      // This code is for to save profile image 
      $cover_image = $request->file('new_img');

      if($cover_image){

         $cover_image_file_name = time().'.'.$cover_image->getClientOriginalExtension();
         $cover_image->move(public_path('profileimages'), $cover_image_file_name);
      }
      elseif(!empty($input['img'])){
        $url = $input['img'];
       $cover_image_file_name = time().'.jpg';
       file_put_contents(public_path('profileimages/'.$cover_image_file_name), file_get_contents($url));
      }
      else{
        $cover_image_file_name = "dummy.png";
      }


      // Now store data into user table
      $users = nep_users::find($input['id']);
      $users->fill([
        'first_name'      => $input['first_name'],
        'last_name'       =>  $input['last_name'],
        'image_path'      => $cover_image_file_name,
        'contact'         =>  $input['mobile'],
        'office_contact'  =>  $input['officepn'],
        'home_contact'    =>  $input['homepn'],
        'address'         => $input['address'],
        'state_id'        => $input['state'],
        'city_id'         => $input['city'],
        'gender'       => $input['gender'],
        ]);
      $users->save();

      // User Login when register
      \Auth::loginUsingId($input['id']);
      return redirect()->route('home')->with('msg', 'You Have Successfully Registerd!!!');

      }


/*$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$*/  


    // Lawyer Register in LAWYER table
    public function lawyer(lawyer $request){

      session()->forget('data');
      $input = $request->all();

      //This code is for to save profile image   
      $cover_image = $request->file('new_img');

      if($cover_image){

         $cover_image_file_name = time().'.'.$cover_image->getClientOriginalExtension();
         $cover_image->move(public_path('profileimages'), $cover_image_file_name);
      }
      elseif(!empty($input['img'])){
        $url = $input['img'];
        $cover_image_file_name = time().'.jpg';
        file_put_contents(public_path('profileimages/'.$cover_image_file_name), file_get_contents($url));
      }
      else{
        $cover_image_file_name = "dummy.png";
      }

      // Now store data into user table 
      $users = nep_users::find($input['id']);
      $users->fill([
        'first_name'      => $input['first_name'],
        'image_path'      => $cover_image_file_name,
        'contact'         =>  $input['mobile'],
        'office_contact'  =>  $input['officepn'],
        'home_contact'    =>  $input['homepn'],
        'address'         => $input['address'],
        'state_id'        => $input['state'],
        'city_id'         => $input['city'],
        'gender'       => $input['gender'],
        ]);
         $users->save();
         
         // User Login when register 
         \Auth::loginUsingId($input['id']);

        // Data submit into lawyer table 

         // $service_mode = $input['service'];
         // $service_mode_data = implode(',',$service_mode);

         // $payment_method = $input['payment'];
         // $payment_method_data = implode(',',$payment_method);

         // $lan = $input['language'];
         // $data = implode(',',$lan);

         // $lan = $input['court'];
         // $court_names = implode(',',$lan);

         // $expertise = $input['expertise'];
         // $experties_ids = implode(',',$expertise);

      $lawyer = nep_lawyers::find($input['lawyerID']);
      $lawyer->fill([
        'ref_id'          => $input['id'],
        'law_firm_id'     => $input['firmname'],
        'marital_status'  => $input['status'],
        'license_number'  => $input['license'],
        'dob'             => $input['dob'],
        // 'bar_id'          => $input['bar'],
        // 'web_url'         => $input['website'],
        // 'court_name'      => $court_names,
        // 'area_of_practice' =>$input['areaOfPractice'],
        // 'service_mode'    => $service_mode_data,
        // 'fee_first'       => $input['firstfee'],
        // 'fee_hourly'      => $input['hourfee'],
        // 'free_consult'    => (int)$input['free'],
        // 'experience'      => (int)$input['yoe'],
        // 'languages'       => $data,
        // 'payment'         => $payment_method_data,
        // 'contact_video'   => $input['skype'],
        // 'expertise'       => $experties_ids,
        ]);
      $lawyer->save(); 


// Save multipale images/gallery 

/*
    if(!empty($input['photos'])){ 
      $photos = $input['photos'];
        $count = 1;
        foreach($photos as $img){

       
          $imgName = time().$count++.'.'.$img->getClientOriginalExtension();
          $img->move(public_path('clientphotos'),$imgName);
          
          $photosModel = new nep_photos;
          $photosModel->image_path = $imgName;
          $photosModel->parent_id = $input['id'];
          $photosModel->save();

//@@@@@@@@@@@@@@@@@ This code is for watermark @@@@@@@@@@@@@@@@@@@@@@@@


$watermark =  \Image::make(public_path('images/water_mark.png'));
$image = \Image::make(public_path('clientphotos/'.$imgName));
list($width, $height) = getimagesize(public_path('clientphotos/'.$imgName));
//#1
$watermarkSize = $width - 20; //size of the image minus 20 margins
//#2
$watermarkSize = $width / 2; //half of the image size
//#3
$resizePercentage = 70;//70% less then an actual image (play with this value)
$watermarkSize = round($width * ((100 - $resizePercentage) / 100), 2); //watermark will be $resizePercentage less then the actual width of the image

// resize watermark width keep height auto
$watermark->resize($watermarkSize, null, function ($constraint) {
    $constraint->aspectRatio();
});
//insert resized watermark to image center aligned
$image->insert($watermark, 'center');
//save new image
$image->save(public_path('clientphotos/watermark'.$imgName));


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
      }
    }  
*/

// Save multipale certificates 

    // if(!empty($input['files'])){
    //   $certificates = $input['files'];

    //     foreach($certificates as $file){
       
    //       $fileName = time().'.'.$file->getClientOriginalExtension();
    //       $file->move(public_path('clientcertificates'),$fileName);
          
    //       $cerModel = new nep_certificates;
    //       $cerModel->image_path = $fileName;
    //       $cerModel->parent_id = $input['id'];
    //       $cerModel->save();
    //   }
    // }

// Save Educational information 

      // $education = $input['education'];
      // if(!empty($education))
      // {
      //   foreach($education as $edu){
      //     $eduModel = new nep_lawyer_edu;
      //     $eduModel->lawyer_id = $input['id'];
      //     $eduModel->education_name = $edu;
      //     $eduModel->save();
      //   }
      // }     

// Save Time and date 

      // $day = $input['day'];
      // $timef = $input['timef'];
      // $timet = $input['timet'];

      // if (
      //    !empty($day) && !empty($timef) && !empty($timet) &&
      //    is_array($day) && is_array($timef) && is_array($timet) &&
      //    count($day) === count($timef) && count($day) === count($timet)
      //    ){

      //     for ($i = 0; $i < count($day); $i++) {

      //         $dtModel = new nep_days_time;
      //             $dtModel->parent_id = $input['id'];
      //             $dtModel->day = $day[$i];
      //             $dtModel->time_from = $timef[$i];
      //             $dtModel->time_to = $timet[$i];
      //             $dtModel->save();

      //     } 
      // }
      

          // Send notification to dashboard
          $noti = new nep_notifications([
            'ref_id'    =>  $input['id'],
            'message'   =>  "This lawyer want to register!",
            'user_type' =>  'lawyer',
            'data_type' =>  'license',
            'type'      =>  'register',
            'status'    =>  'pending',
          ]);
          $noti->save();

      return redirect()->route('home')->with('msg', 'You have successfully registerd, Now please complete your profile in setting section!');

      }// End function lawyers



/*$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$*/  


    // Lawyer Register in LAWFIRM table
    public function lawfirm(lawfirm $request){
      session()->forget('data');
      $input = $request->all();

      // Save image
      $cover_image = $request->file('new_img');

      if($cover_image){

         $cover_image_file_name = time().'.'.$cover_image->getClientOriginalExtension();
         $cover_image->move(public_path('profileimages'), $cover_image_file_name);
      }
      elseif(!empty($input['img'])){
        $url = $input['img'];
        $cover_image_file_name = time().'.jpg';
        file_put_contents(public_path('profileimages/'.$cover_image_file_name), file_get_contents($url));
      }
      else{
        $cover_image_file_name = "dummy.png";
      }

      // Now store data into user table
      $users = nep_users::find($input['id']);
      $users->fill([
        'first_name'      => $input['first_name'],
        'image_path'      => $cover_image_file_name,
        'contact'         => $input['officepn'],
        'address'         => $input['address'],
        'state_id'        => $input['state'],
        'city_id'         => $input['city'],
        ]);
         $users->save(); 

        // User Login when register 
        \Auth::loginUsingId($input['id']);

// Data submit into lawyer table

         // $service_mode = $input['service'];
         // $service_modes = implode(',',$service_mode);

         // $payment_method = $input['payment'];
         // $payment_methods = implode(',',$payment_method);

         // $lan = $input['court'];
         // $court_names = implode(',',$lan);

         // $lan = $input['language'];
         // $languages = implode(',',$lan);

         // $expertise = $input['expertise'];
         // $experties_ids = implode(',',$expertise);

      $lawyer = nep_lawfirms::find($input['lawfirmID']);
      $lawyer->fill([
        'ref_id'          =>  $input['id'],
        // 'bar_id'          => $input['bar'],
        'license_number'  => $input['license'],
        // 'web_url'         => $input['website'],
        'law_firm_name'   => $input['first_name'],
        // 'experience'      => (int)$input['yoe'],
        // 'service_mode'    => $service_modes,
        // 'contact_video'   => $input['skype'],
        // 'fee_first'       => $input['firstfee'],
        // 'fee_hour'      => $input['hourfee'],
        // 'free_consult'    => (int)$input['free'],
        'dor_site'        => $input['dor'],
        // 'court_names'      => $court_names,
        // 'languages'       => $languages,
        // 'payment'         => $payment_methods,
        // 'expertise'       => $experties_ids,
        ]);
      $lawyer->save(); 


// Save multipale images/gallery 
/*
    if(!empty($input['photos'])){ 
      $photos = $input['photos'];
        $count = 1;
        foreach($photos as $img){
       
         
          $imgName = time().$count++.'.'.$img->getClientOriginalExtension();
          $img->move(public_path('clientphotos'),$imgName);
          

          $photosModel = new nep_photos;
          $photosModel->image_path = $imgName;
          $photosModel->parent_id = $input['id'];
          $photosModel->save();

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

$watermark =  \Image::make(public_path('images/water_mark.png'));
$image = \Image::make(public_path('clientphotos/'.$imgName));
list($width, $height) = getimagesize(public_path('clientphotos/'.$imgName));
//#1
$watermarkSize = $width - 20; //size of the image minus 20 margins
//#2
$watermarkSize = $width / 2; //half of the image size
//#3
$resizePercentage = 70;//70% less then an actual image (play with this value)
$watermarkSize = round($width * ((100 - $resizePercentage) / 100), 2); //watermark will be $resizePercentage less then the actual width of the image

// resize watermark width keep height auto
$watermark->resize($watermarkSize, null, function ($constraint) {
    $constraint->aspectRatio();
});
//insert resized watermark to image center aligned
$image->insert($watermark, 'center');
//save new image
$image->save(public_path('clientphotos/watermark'.$imgName));

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

      }
    }  
*/

// Save multipale certificates

    // if(!empty($input['files'])){
    //   $certificates = $input['files'];

    //     foreach($certificates as $file){
       
    //       $fileName = time().'.'.$file->getClientOriginalExtension();
    //       $file->move(public_path('clientcertificates'),$fileName);
          
    //       $cerModel = new nep_certificates;
    //       $cerModel->image_path = $fileName;
    //       $cerModel->parent_id = $input['id'];
    //       $cerModel->save();
    //   }
    // }
    

// Save Time and date  

      // $day = $input['day'];
      // $timef = $input['timef'];
      // $timet = $input['timet'];

      // if (
      //    !empty($day) && !empty($timef) && !empty($timet) &&
      //    is_array($day) && is_array($timef) && is_array($timet) &&
      //    count($day) === count($timef) && count($day) === count($timet)
      //    ){

      //     for ($i = 0; $i < count($day); $i++) {

      //         $dtModel = new nep_days_time;
      //             $dtModel->parent_id = $input['id'];
      //             $dtModel->day = $day[$i];
      //             $dtModel->time_from = $timef[$i];
      //             $dtModel->time_to = $timet[$i];
      //             $dtModel->save();

      //       } 
      //     }

          // Notification for dashboard
          $noti = new nep_notifications([
            'ref_id'    =>  $input['id'],
            'message'   =>  "This lawfirm want to register!",
            'user_type' =>  'lawfirm',
            'data_type' =>  'license',
            'type'      =>  'register',
            'status'    =>  'pending',
          ]);
          $noti->save();

      return redirect()->route('home')->with('msg', 'You have successfully registerd, Now please complete your profile in setting section!');
     
    }// End function lawfirm
   

    





  /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($services)
    {
        return Socialite::driver($services)->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback($services)
    {
        $user = Socialite::driver($services)->stateless()->user();
        
            $name  = $user->getName();
            $email = $user->getEmail();
            $img   = $user->getAvatar();
      
        session()->put('name', $name);
        session()->put('email', $email);
        session()->put('img', $img);
        
        return redirect()->route('signup');
    }

}
