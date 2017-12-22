<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\member;
use App\Http\Requests\professional;
use App\Http\Requests\Personal;


use Illuminate\Support\Facades\DB;
use App\nep_lawyers;
use App\nep_users;
use App\User;
use App\nep_photos;
use App\nep_lawyer_edu;
use App\nep_expertises;
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
use App\nep_certificate_award;
use App\nep_info;
use App\nep_questions;
use App\nep_answers;
use App\nep_appointments;

use Validator;
use Illuminate\Support\Facades\URL;
use Intervention\Image\ImageManager;
use App\Http\Controllers\Auth;
use Illuminate\Contracts\Auth\Authenticatable;

class SettingController extends Controller
{
    public function useredit()
    {
    	$id = \Auth::user()->id;
    	$role = \Auth::user()->role;
    	$barid = \Auth::user()->bar_id;
    	$cityid = \Auth::user()->city_id;
    	$stateid = \Auth::user()->state_id;
    	$lawfirm = \Auth::user()->law_firm_id;

    	// Fetch data from DB
    	#
    	#
    	// Gerenal data
      $expertises = DB::table('expertises')->select()->where('status','1')->get();
      $cities = DB::table('cities')->select()->where('status','1')->get();
      $usersName = DB::table('users')->select()->where('status','=','1')->where('role','LIKE','Law%')->get();

      $web_info = DB::table('info')->select()->first();

    	$regions = DB::table('regions')->select()->where('status','1')->get();

    	$expertise = DB::table('expertises')->select()->where('status','1')->get();

    	$bars = DB::table('bars')->select()->where('status','1')->get();

    	$courts = DB::table('courts')->select()->where('status','1')->get();

    	$languages = DB::table('languages')->select()->where('status','1')->get();

    	$lawfirms_id = DB::table('lawfirms')->select()->get();
    	#
    	#
    	#
    	// Data related to lawyer/lawfirm
    	$lawyer = DB::table('lawyers')->select()->where('ref_id',$id)->first();
    	
    	$lawfirms_name = DB::table('users')->select()->where('role','lawfirm')->where('status','1')->get();
    	

    	$city = DB::table('cities')->select()->where('id',$cityid)->where('status', '1')->first();

    	$state = DB::table('states')->select()->where('id',$stateid)->where('status', '1')->first();

    	$photos = DB::table('photos')->select()->where('parent_id',$id)->get();

    	$lawyer_edu = DB::table('lawyer_edu')->select()->where('lawyer_id',$id)->get();

    	$day_time = DB::table('days_time')->select()->where('parent_id',$id)->get();

      $firm_lawyers = DB::table('users as u')
            ->leftjoin('lawyers as l', 'l.ref_id', '=', 'u.id')
            ->where('u.status','1')
            ->where('law_firm_id','=',$id)
            ->select('u.*')
            ->get(); 


    	// Redirect users to there relevent page
		switch ($role) {
		    case "guest":
		    		return view('member_edit', compact('state','city','regions','web_info','expertises','usersName','cities'));
		        break;
		    case "lawyer":
		        	return view('edit', compact('lawyer','state','city','regions','expertise','lawfirms_id','lawfirms_name','bars','courts','languages','certificates','photos','lawyer_edu','day_time','web_info','firm_lawyers','expertises','usersName','cities'));
		        break;
		    case "lawfirm":
              $lawyer = DB::table('lawfirms')->select()->where('ref_id',$id)->first();
		    		  return view('edit1', compact('lawyer','state','city','regions','expertise','lawfirms_id','lawfirms_name','bars','courts','languages','certificates','photos','lawyer_edu','day_time','web_info','firm_lawyers','expertises','usersName','cities'));
		        break;
		    default:
		}// Switch ends

    }// useredit end

    // Professional information
    public function pro_info_update(professional $request)
    {
      $input = $request->all();

         // Implode data  
         $service_mode = $input['service'];
         $service_mode_data = implode(',',$service_mode);

         $payment_method = $input['payment'];
         $payment_method_data = implode(',',$payment_method);

         $lan = $input['language'];
         $languages = implode(',',$lan);

         $court = $input['court'];
         $court_names = implode(',',$court);

         $expertise = $input['expertise'];
         $experties_ids = implode(',',$expertise);

         // Pricing
         $phone = $input['p_p'];
         $phone_price = implode(',',$phone);

         $email = $input['e_p'];
         $email_price = implode(',',$email);

         $video = $input['v_p'];
         $video_price = implode(',',$video);

         $meeting = $input['m_p'];
         $meeting_price = implode(',',$meeting);



         if( $input['register'] == 'lawyer' ){
            //Save lawyer data in lawyer table
            $lawyer = nep_lawyers::findOrFail($input['ref_id']);
            $lawyer->fill([
              'bar_id'          => $input['bar'],
              'law_firm_id'     => $input['firmname'],
              'web_url'         => $input['website'],
              'court_names'      => $court_names,
              'service_mode'    => $service_mode_data,
              'fee_first'       => $input['firstfee'],
              'fee_hourly'      => $input['hourfee'],
              'experience'      => (int)$input['yoe'],
              'languages'       => $languages,
              'payment'         => $payment_method_data,
              'contact_video'   => $input['skype'],
              'expertise'       => $experties_ids,
              'phone_price'     => $phone_price,
              'personal_price'  => $meeting_price,
              'skype_price'     => $video_price,
              'email_price'     => $email_price,
              ]);
            $lawyer->save(); 
          }// End If
          else if( $input['register'] == 'lawfirm' ){
            //Save lawyer data in lawyer table
            $lawfirm = nep_lawfirms::findOrFail($input['ref_id']);
            $lawfirm->fill([
              'bar_id'          => $input['bar'],
              'web_url'         => $input['website'],
              'court_names'      => $court_names,
              'service_mode'    => $service_mode_data,
              'fee_first'       => $input['firstfee'],
              'fee_hourly'      => $input['hourfee'],
              'experience'      => (int)$input['yoe'],
              'languages'       => $languages,
              'payment'         => $payment_method_data,
              'contact_video'   => $input['skype'],
              'expertise'       => $experties_ids,
              'phone_price'     => $phone_price,
              'personal_price'  => $meeting_price,
              'skype_price'     => $video_price,
              'email_price'     => $email_price,
              ]);
            $lawfirm->save(); 
          }// End elseif
          else{
            return response()->json(['status'=>'error','message'=>'Your Can Not Update Your Data!']);
//            return redirect()->route('setting')->with('msg', 'Your Can Not Update Your Data!');
          }
        return response()->json(['status'=>'success','message'=>'Your data has been updated!']);
//          return redirect()->route('setting')->with('msg', 'Your data has been updated!!!');
    }// End professional information


    // Personal Information Uploaded
    public function per_info_update(Personal $request)
    {
      $input = $request->all();

      // This code is for to save profile image 
      $cover_image = $request->file('new_img');

      if($cover_image){

         $cover_image_file_name = time().'.'.$cover_image->getClientOriginalExtension();
         $cover_image->move(public_path('profileimages'), $cover_image_file_name);
      }
      else{
        $cover_image_file_name = $input['img'];
      }

      // Update Data Of Lawyer in User Table
      $users = nep_users::find($input['id']);   //'dob'   =>  'required',
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
        'region_id'     => $input['region'],  
        ]);
      $users->save();

      if( $input['register'] == 'lawyer' ){
          $this->validate($request, [
              'dob' => 'required',
              'license'   =>  'required',
          ]);
        // Save lawyer data in lawyer table
        $lawyer = nep_lawyers::findOrFail($input['ref_id']);
        $lawyer->fill([
          'description'     => $input['desc'],
          'dob'             => $input['dob'],
          'license_number'         =>  $input['license'],
          ]);
        $lawyer->save();
      } 
      else if( $input['register'] == 'lawfirm' ){
        $this->validate($request, [
            'dor'       => 'required',
            'license'   =>  'required',
        ]);
        // Save lawyer data in lawyer table
        $lawyer = nep_lawfirms::findOrFail($input['ref_id']);
        $lawyer->fill([
          'description'   =>  $input['desc'],
          'dor_site'      =>  $input['dor'],
          'license_number'       =>  $input['license'],
          ]);
        $lawyer->save();
      }
        return response()->json(['status'=>'success','message'=>'Personal Information Updated Successfully!']);
//      return redirect()->route('setting')->with('msg', 'Your data has been updated!!!');
    }


    // Gallery Uploaded 
    public function gallery(Request $request){
//      dd($request->all());
//        $this->validate($request, [
//          'photos.*' => 'required|mimes:jpeg,jpg,png|max:5000',
//        ]);
        dd(/*count(*/$request->all()/*)*/);


//        $validator = Validator::make(
//            $input_data, [
//                'photos.*' => 'required|mimes:jpg,jpeg,png,bmp|max:20000'
//            ],[
//                'photos.*.required' => 'Please upload an image',
//                'photos.*.mimes' => 'Only jpeg,png and bmp images are allowed',
//                'photos.*.max' => 'Sorry! Maximum allowed size for an image is 20MB',
//            ]
//        );

//        if ($validator->fails()) {
//            return 'i am here';
//        }

          $input = $request->all();
        dd($input);
          // Save multipale images/gallery 
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


            $watermark =  \Image::make(public_path('new/images/logo.png'));
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

            }// end foreach
          }// end if  

      return response()->json(['status'=>'success','message'=>'Your data has been updated!']);
    
    }// End function


    // Certicicates Uploded
    public function Certificates(Request $request)
    {
        $this->validate($request, [  
          'filesTitle.*'  =>  'required',
          'files.*'       =>  'required|mimes:jpeg,jpg,png|max:5000',
        ]);

        $input = $request->all();

        if(!empty($input['files'])){
          $certificates = $input['files'];
          $certificatesTitle = $input['filesTitle'];

          $count = 0;
        foreach($certificates as $file){

          $fileName = time().$count.'.'.$file->getClientOriginalExtension();
          $file->move(public_path('AwardsAndCertificates'),$fileName);
          
          // Certificates also save in awards table
          $cerModel = new nep_certificate_award;
          $cerModel->title = $certificatesTitle[$count];
          $cerModel->image_path = $fileName;
          $cerModel->certificate_award_type = 'certificate';
          $cerModel->parent_id = $input['id'];
          $cerModel->save();

          $certificate_id = $cerModel->id;

          // Notification
          $noti = new nep_notifications([
            'ref_id'        =>  $input['id'],
            'message'       =>  "Want to Upate His Data!",
            'user_type'     =>  $input['role'],
            'data_type'     =>  'Certificates',
            'data_type_id'  =>  $certificate_id,
            'type'          =>  'update',
            'status'        =>  'pending',
          ]);
          $noti->save();

          $count++;
       }
        

      return redirect()->route('setting')->with('msg', 'Your data has been updated!!!');
      }
      return redirect()->route('setting')->with('msg', 'Your data not updated, Due to some problem!');
    }// End function

    
    // Awards Uploded
    public function Awards(Request $request)
    {
        $this->validate($request, [  
          'awardTitle.*'  =>  'required',
          'award.*' => 'required|mimes:jpeg,jpg,png|max:5000',
        ]);

        $input = $request->all();

        if(!empty($input['award'])){
          $awards = $input['award'];
          $awardsTitle = $input['awardTitle'];

          $count = 0;
        foreach($awards as $file){

          $fileName = time().$count.'.'.$file->getClientOriginalExtension();
          $file->move(public_path('AwardsAndCertificates'),$fileName);
          
          $awardModel = new nep_certificate_award;
          $awardModel->title = $awardsTitle[$count];
          $awardModel->image_path = $fileName;
          $awardModel->certificate_award_type = 'award';
          $awardModel->parent_id = $input['id'];
          $awardModel->save();

          $award_id = $awardModel->id;
          // Notification
          $noti = new nep_notifications([
            'ref_id'        =>  $input['id'],
            'message'       =>  "Want to Upate His Data!",
            'user_type'     =>  $input['role'],
            'data_type'     =>  'Awards',
            'data_type_id'  =>  $award_id,
            'type'          =>  'update',
            'status'        =>  'pending',
          ]);
          $noti->save();

          $count++;
       }

      return redirect()->route('setting')->with('msg', 'Your data has been updated!!!');
      }
      return redirect()->route('setting')->with('msg', 'Your data not updated, Due to some problem!');
    }// End function


    // Education updated
    public function Education(Request $request)
    {
       $this->validate($request, [  
          'education.*'  =>  'required',
        ]);

        $input = $request->all();

        if( !empty( $input['edu_id'] ) ){
            $edu = $input['edu_id'];

            foreach($edu as $id){  
              $user = nep_lawyer_edu::find($id);
              $user->delete();
            }
          }

        $edu = $input['education'];

        foreach($edu as $title){
          
          $eduModel = new nep_lawyer_edu;
          $eduModel->education_name = $title;
          $eduModel->lawyer_id = $input['id'];
          $eduModel->save();
       }
      return redirect()->route('setting')->with('msg', 'Your data has been updated!!!');
    }

    // Time updated
    public function Time(Request $request)
    {
       $this->validate($request, [  
          'day.*'  =>  'required',
          'timet.*'  =>  'required',
          'timtf.*'  =>  'required',
        ]);

        $input = $request->all();
        // Previous data delete
          if( !empty( $input['time_id'] ) ){
            $time_id = $input['time_id'];

            foreach($time_id as $id){  
              $user = nep_days_time::find($id);
              $user->delete();
            }
          }

        // Save Time and date 
        $day = $input['day'];
        $timef = $input['timef'];
        $timet = $input['timet'];

        if (
           !empty($day) && !empty($timef) && !empty($timet) &&
           is_array($day) && is_array($timef) && is_array($timet) &&
           count($day) === count($timef) && count($day) === count($timet)
           ){

            for ($i = 0; $i < count($day); $i++) {

                $dtModel = new nep_days_time;
                    $dtModel->parent_id = $input['id'];
                    $dtModel->day = $day[$i];
                    $dtModel->time_from = $timef[$i];
                    $dtModel->time_to = $timet[$i];
                    $dtModel->save();

            } 
        }
         return redirect()->route('setting')->with('msg', 'Your data has been updated!!!');
      }// End function



    public function member_update(member $request)
    {
    	$input = $request->all();

    	// This code is for to save profile image 
      $cover_image = $request->file('new_img');

      if($cover_image){

         $cover_image_file_name = time().'.'.$cover_image->getClientOriginalExtension();
         $cover_image->move(public_path('profileimages'), $cover_image_file_name);
      }
      else{
        $cover_image_file_name = $input['img'];
      }

	    // Update Data Of Member
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
        'region_id'		  => $input['region'],	
        ]);
      $users->save();

        return redirect()->route('setting')->with('msg', 'Yous data has been updated!!!');
    } // member_update end


//     public function lawyer_update(lawyer $request)
//     {
//     	$input = $request->all();

//     // This code is for to save profile image 
//       $cover_image = $request->file('new_img');

//       if($cover_image){

//          $cover_image_file_name = time().'.'.$cover_image->getClientOriginalExtension();
//          $cover_image->move(public_path('profileimages'), $cover_image_file_name);
//       }
//       else{
//         $cover_image_file_name = $input['img'];
//       }

// 	// Update Data Of Lawyer in User Table
//       $users = nep_users::find($input['id']);
//       $users->fill([
//         'first_name'      => $input['first_name'],
//         'last_name'       =>  $input['last_name'],
//         'image_path'      => $cover_image_file_name,
//         'contact'         =>  $input['mobile'],
//         'office_contact'  =>  $input['officepn'],
//         'home_contact'    =>  $input['homepn'],
//         'address'         => $input['address'],
//         'state_id'        => $input['state'],
//         'city_id'         => $input['city'],
//         'region_id'		  => $input['region'],	
//         ]);
//       $users->save();

//     // Implode data  
// 		$service_mode = $input['service'];
//          $service_mode_data = implode(',',$service_mode);

//          $payment_method = $input['payment'];
//          $payment_method_data = implode(',',$payment_method);

//          $lan = $input['language'];
//          $data = implode(',',$lan);

//          $lan = $input['court'];
//          $court_names = implode(',',$lan);

//          $expertise = $input['expertise'];
//          $experties_ids = implode(',',$expertise);

//     //Save lawyer data in lawyer table
//       $lawyer = nep_lawyers::findOrFail($input['ref_id']);
//       $lawyer->fill([
//         'bar_id'          => $input['bar'],
//         'law_firm_id'     => $input['firmname'],
//         'marital_status'  => $input['status'],
//         'web_url'         => $input['website'],
//         'court_name'      => $court_names,
//         'area_of_practice' =>$input['areaOfPractice'],
//         'dob'             => $input['dob'],
//         'service_mode'    => $service_mode_data,
//         'fee_first'       => $input['firstfee'],
//         'fee_hourly'      => $input['hourfee'],
//         'free_consult'    => (int)$input['free'],
//         'experience'      => (int)$input['yoe'],
//         'languages'       => $data,
//         'payment'         => $payment_method_data,
//         'contact_video'   => $input['skype'],
//         'expertise'       => $experties_ids,
//         ]);
//       $lawyer->save(); 

//     // Save multipale images/gallery 
//     if(!empty($input['photos'])){ 
//       $photos = $input['photos'];
//         $count = 1;
//         foreach($photos as $img){

       
//           $imgName = time().$count++.'.'.$img->getClientOriginalExtension();
//           $img->move(public_path('clientphotos'),$imgName);
          
//           $photosModel = new nep_photos;
//           $photosModel->image_path = $imgName;
//           $photosModel->parent_id = $input['id'];
//           $photosModel->save();

// //@@@@@@@@@@@@@@@@@ This code is for watermark @@@@@@@@@@@@@@@@@@@@@@@@


// 			$watermark =  \Image::make(public_path('images/water_mark.png'));
// 			$image = \Image::make(public_path('clientphotos/'.$imgName));
// 			list($width, $height) = getimagesize(public_path('clientphotos/'.$imgName));
// 			//#1
// 			$watermarkSize = $width - 20; //size of the image minus 20 margins
// 			//#2
// 			$watermarkSize = $width / 2; //half of the image size
// 			//#3
// 			$resizePercentage = 70;//70% less then an actual image (play with this value)
// 			$watermarkSize = round($width * ((100 - $resizePercentage) / 100), 2); //watermark will be $resizePercentage less then the actual width of the image

// 			// resize watermark width keep height auto
// 			$watermark->resize($watermarkSize, null, function ($constraint) {
// 			    $constraint->aspectRatio();
// 			});
// 			//insert resized watermark to image center aligned
// 			$image->insert($watermark, 'center');
// 			//save new image
// 			$image->save(public_path('clientphotos/watermark'.$imgName));


// //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//       }// end foreach
//     }// end if  


// // Save multipale certificates 

//     if(!empty($input['files'])){
//       $certificates = $input['files'];

//         foreach($certificates as $file){
       
//           $fileName = time().'.'.$file->getClientOriginalExtension();
//           $file->move(public_path('clientcertificates'),$fileName);
          
//           $cerModel = new nep_certificates;
//           $cerModel->image_path = $fileName;
//           $cerModel->parent_id = $input['id'];
//           $cerModel->save();
//       }
//     }

// // Save Educational information 

//       $education = $input['education'];
//       // Previous data delete
//       $edu_id = $input['edu_id'];
//       	foreach($edu_id as $id){	
// 	      $user = nep_lawyer_edu::find($id);
// 	 	    $user->delete();
//       }
//       // New data add
//       if(!empty($education))
//       {
//         foreach($education as $edu){
//           $eduModel = new nep_lawyer_edu;
//           $eduModel->lawyer_id = $input['id'];
//           $eduModel->education_name = $edu;
//           $eduModel->save();
//         }
//       }

// // Save Time and date 

//       $day = $input['day'];
//       $timef = $input['timef'];
//       $timet = $input['timet'];

//       if (
//          !empty($day) && !empty($timef) && !empty($timet) &&
//          is_array($day) && is_array($timef) && is_array($timet) &&
//          count($day) === count($timef) && count($day) === count($timet)
//          ){

//           for ($i = 0; $i < count($day); $i++) {

//               $dtModel = new nep_days_time;
//                   $dtModel->parent_id = $input['id'];
//                   $dtModel->day = $day[$i];
//                   $dtModel->time_from = $timef[$i];
//                   $dtModel->time_to = $timet[$i];
//                   $dtModel->save();

//           } 
//       }
      
// // Send notification to dashboard

//           $noti = new nep_notifications([
//             'ref_id'  =>  $input['id'],
//             'message' =>  "This lawyer Update his Data!",
//             'type'    =>  'update',
//             'status'  =>  'pending',
//           ]);
//           $noti->save();

//       return redirect()->route('home')->with('msg', 'Your data has been updated!!!');

 
  
//     }// Lawyer_update end


    public function coverImage(Request $request)
    {
        $this->validate($request, [
            'id'       => 'required',
            'img'   =>  'required',
        ]);

        $input = $request->all();
        $id = $input['id'];

        $cover_image = $request->file('img');

           $cover_image_file_name = time().'.'.$cover_image->getClientOriginalExtension();
           $cover_image->move(public_path('profileimages'), $cover_image_file_name);

    if(nep_lawyers::find($id)){
      $users = nep_lawyers::find($id);
      $users->fill([
        'bg_image'      => $cover_image_file_name,
        ]);
      $users->save();
    }
    else{
      $users = nep_lawfirms::find($id);
      $users->fill([
        'bg_image'      => $cover_image_file_name,
        ]);
      $users->save();
    }
      return back()->with('msg','Cover photo has been changed!');
    }


    public function user_question()
    {

      $id = \Auth::user()->id;

      $expertises = DB::table('expertises')->select()->where('status','1')->get();
      $cities = DB::table('cities')->select()->where('status','1')->get();
      $usersName = DB::table('users')->select()->where('status','=','1')->where('role','LIKE','Law%')->get();
      $web_info = DB::table('info')->select()->first();

      $que_ans = DB::table('users as u')
          ->join('questions as que', 'que.user_id', '=', 'u.id')

            ->select('u.*','que.id as Qid','que.posted_date as Qdate','que.question','que.question_detail')

            ->where('u.status', '=', '1')
            ->where('que.status', '=', '1')
            ->where('user_id','=', $id )
            ->get();


      $answer = DB::table('answers as ans')
            ->join('users as u', 'u.id', '=', 'ans.replayer_id')

            ->select('u.*','ans.question_id','ans.replayer_id','ans.answer','ans.posted_date as Adate')

            ->where('u.status', '=', '1')
            ->where('ans.status', '=', '1')
            ->get();

      return view('userQuestions', compact('web_info','expertises','usersName','cities','que_ans','answer'));
    }

    public function user_appoinment()
    {
      $id = \Auth::user()->id;

      $expertises = DB::table('expertises')->select()->where('status','1')->get();
      $cities = DB::table('cities')->select()->where('status','1')->get();
      $usersName = DB::table('users')->select()->where('status','=','1')->where('role','LIKE','Law%')->get();
      $web_info = DB::table('info')->select()->first();

      $appoinments = DB::table('appointments')->select()->where('refered_to', $id)->get();


      return view('userAppoinments', compact('web_info','expertises','usersName','cities','appoinments'));
    }


}// Class end
