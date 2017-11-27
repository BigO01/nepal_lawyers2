<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route for Public Pages


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('quickconsult', 'HomeController@QuickConsultation')->name('quickconsult');
Route::post('quick-consultform',[
	'uses' =>'HomeController@QuickConsultationSubmission',
	'as' =>'quick.consultform',
]);


 Route::get('/', [
 		'uses'	=>	'HomeController@index',
 		'as'	=>	'home',
 		]);
Route::get('/contact', 'LocalController@contact')->name('contact');
Route::get('/about', 'LocalController@about');
Route::get('/faq','LocalController@faq')->name('faq');
Route::get('/questions','LocalController@question_board')->name('questions');
Route::get('/blog','LocalController@Blog')->name('/blog');
Route::get('/blog_detail/{id}','BlogController@detail');
Route::post('comment_blog','BlogController@comment')->name('comment_blog');
Route::post('rating','RatingController@rating_comment')->name('rating');
Route::get('lawyerGetListed', 'LocalController@lawyerGetListed')->name('lawyerGetListed');



 	// Send email for varification of email   
	Route::Post('/send', 
		[ 'uses' => 'MailController@send_email_conformation',
		  'as'   => 'send',
		]);

	Route::get('/signup/{ee?}/{le?}/{fe?}', [
	    'uses' => 'RegisterController@signup',
	    'as'   => 'signup',
	    ]);

	// Contact Us form email
	Route::post('sendemail', [
		'uses'  => 'MailController@contactus',
		'as'	=> 'sendemail',
		]);

	// Send mail to lawyer to join website
	Route::post('sendmaillawyer',[
		'uses'	=>	'MailController@add_lawyer',
		'as'	=>	'sendmaillawyer',
		])->middleware('auth');

	Route::get('/signedUp/{id}/{email}', [
	    'uses' => 'RegisterController@signedUp',
	    'as'   => 'signedUp',
	    ]);

	Route::post('lawyer_request',[
		'uses' => 'RegisterController@lawyer_request',
	    'as'   => 'lawyer_request',
		]);




	// Get general data
	Route::Post('/signup2', [
	    'uses' => 'RegisterController@signup2',
	    'as'   => 'signup2',
	    ]);

	// Go to MEMBER form page
	Route::get('/member_form', [
			'uses'   =>  'RegisterController@member_form',
			'as'     =>  'member_form',
		]);


	// Go to LAWYER form page
	Route::get('/lawyer_form', [
			'uses'   =>  'RegisterController@lawyer_form',
			'as'     =>  'lawyer_form',
		]);

	// Go to LAWYER form page
	Route::get('/lawfirm_form', [
			'uses'   =>  'RegisterController@lawfirm_form',
			'as'     =>  'lawfirm_form',
		]);

	// Save data of member
	Route::post('/member',[
			'uses' => 'RegisterController@member',
			'as'   => 'member',
			]);         

	// Save data of lawyer
	Route::post('/lawyer',[
			'uses' => 'RegisterController@lawyer',
			'as'   => 'lawyer',
			]); 

	// Save data of lawfirm
	Route::post('/lawfirm',[
			'uses' => 'RegisterController@lawfirm',
			'as'   => 'lawfirm',
			]); 

	// Lawyer and firm list
	Route::get('/findlawyer', 'FindLawyerController@lawyerlist');

	
    // Indivisual Detail
	Route::get('detail/{id}', [
         'uses' => 'DetailController@index',
         'as'   => 'detail',
        ])->WHERE(['id'=>"[0-9]+"]);

	// Claim profile
	Route::post('claim','ClaimprofilController@claim')->name('claim');






	Route::group(array('middleware' => 'auth'), function()
	{
		// For user profile
		Route::get('/profile', 'ProfileController@index');
		// Profile edit
		Route::get('/setting', 'SettingController@useredit')->name('setting');
		// User questions
		Route::get('user_question',[
				'uses'	=>	'SettingController@user_question',
				'as'	=>	'user_question',
			]); 
		Route::get('user_appoinment',[
				'uses'	=>	'SettingController@user_appoinment',
				'as'	=>	'user_appoinment',
			]);

		Route::post('/update_member', 'SettingController@member_update')->name('update_member');
		Route::post('/professional_information', 'SettingController@pro_info_update')->name('professional_information');

		Route::post('/personal_information', 'SettingController@per_info_update')->name('personal_information');

		Route::post('/Gallery', 'SettingController@gallery')->name('Gallery');

		Route::post('/Certificates', 'SettingController@Certificates')->name('Certificates');

		Route::post('/Awards', 'SettingController@Awards')->name('Awards');

		Route::post('/Education', 'SettingController@Education')->name('Education');

		Route::post('/Time', 'SettingController@Time')->name('Time');

		Route::post('cover', 'SettingController@coverImage')->name('cover');

	});
					  
// Ajax request to fetch cities
Route::post('/getcity', function(){
	if(Request::ajax()){
		$state = $_POST['state_id'];
		$cities = DB::table('cities')->select()->where('state_id', '=',$state)->get();
  
		foreach($cities as $city)
		    {
		        echo "
				<option value='$city->id'>$city->city_name</option>
		            ";
		    }
	}
});

// Ajax request to fetch states
Route::post('/getstate', function(){
	if(Request::ajax()){
		$region = $_POST['region_id'];
	$states = DB::table('states')->select()->where('region_id', '=',$region)->get();
  
		foreach($states as $state)
		    {
		            echo "
				<option value='$state->id'>$state->state_name</option>
		            ";
		    }
	}
})->name('getstate');


// GET request to fetch Lawyers list related to Alphabets
Route::get('/findlawyers/{word}', function($word){
		
		$web_info = DB::table('info')->select()->first();
    	$cities = DB::table('cities')->select()->where('status','1')->get();
  		$states = DB::table('states')->select()->where('status','1')->get();
  		$regions = DB::table('regions')->select()->where('status','1')->get();
  		$badges = DB::table('badges')->select()->where('status','1')->get();
  		$expertises = DB::table('expertises')->select()->where('status','1')->get();
  		$lawfirm_names = DB::table('users')->select()->where('status','1')->where('role','=','lawfirm')->get();
  		$usersName = DB::table('users')->select()->where('status','=','1')->where('role','LIKE','Law%')->get();
  		$faqs = DB::table('faqs')->select()->where('status', '=', '1')->limit(5)->get();
  		$ratings = DB::table('ratings_comments')->where('status','1')->get();

		 $data = DB::table('users as u')
		     ->leftjoin('regions as r', 'r.id', '=', 'u.region_id')
		     ->leftjoin('lawfirms as f', 'f.ref_id', '=', 'u.id')
		     ->leftjoin('lawyers as l', 'l.ref_id', '=', 'u.id')

		     ->select('u.*','r.region_name','f.experience as fexperience','f.expertise as f_expertise_id', 'l.experience as lexperience','l.expertise as l_expertise_id','l.law_firm_id','l.premium as l_premium','f.premium as f_premium','f.badge as f_badge','l.badge as l_badge','f.fee_first as f_fee_first','l.fee_first as l_fee_first')
		     // ->Where('u.status', '=', '1')
		     ->orWhere([
					    ['u.status', '=', '1'],
					    ['u.role', '=', 'lawyer'],
					    ['u.first_name', 'like' , $word.'%'],
					])
		     ->orWhere([
					    ['u.status', '=', '1'],
					    ['u.role', '=', 'lawfirm'],
					    ['u.first_name', 'like' , $word.'%'],
					])

			 ->paginate(5);

		return view('findalawyer', compact('data','expertises','cities','states','regions','lawfirm_names','web_info','badges','usersName','faqs','ratings'));

})->name('findlawyers');



// GET request to fetch Lawyers list related to expertises
Route::get('/findlawyer_list/{word}', function($word){
		
		$web_info = DB::table('info')->select()->first();
		$usersName = DB::table('users')->select()->where('status','=','1')->where('role','LIKE','Law%')->get();
  		$faqs = DB::table('faqs')->select()->where('status', '=', '1')->limit(5)->get();
    	$cities = DB::table('cities')->select()->where('status','1')->get();
  		$states = DB::table('states')->select()->where('status','1')->get();
  		$regions = DB::table('regions')->select()->where('status','1')->get();
  		$badges = DB::table('badges')->select()->where('status','1')->get();
  		$expertises = DB::table('expertises')->select()->where('status','1')->get();
  		$lawfirm_names = DB::table('users')->select()->where('status','1')->where('role','=','lawfirm')->get();
  		$ratings = DB::table('ratings_comments')->where('status','1')->get();


		 $data = DB::table('users as u')
		     ->leftjoin('regions as r', 'r.id', '=', 'u.region_id')
		     ->leftjoin('lawfirms as f', 'f.ref_id', '=', 'u.id')
		     ->leftjoin('lawyers as l', 'l.ref_id', '=', 'u.id')

		     ->select('u.*','r.region_name','f.experience as fexperience','f.expertise as f_expertise_id', 'l.experience as lexperience','l.expertise as l_expertise_id','l.law_firm_id','l.premium as l_premium','f.premium as f_premium','f.badge as f_badge','l.badge as l_badge','f.fee_first as f_fee_first','l.fee_first as l_fee_first')
		     // ->Where('u.status', '=', '1')
		     ->orWhere([
					    ['u.status', '=', '1'],
					    ['u.role', '=', 'lawyer'],
					    ['l.expertise', 'like' , '%'.$word.'%'],
					])
		     ->orWhere([
					    ['u.status', '=', '1'],
					    ['u.role', '=', 'lawfirm'],
					    ['f.expertise', 'like' , '%'.$word.'%'],
					])

			 ->paginate(5);

		return view('findalawyer', compact('data','expertises','cities','states','regions','lawfirm_names','web_info','badges','usersName','faqs','ratings'));

})->name('findlawyer_list');


// GET request to fetch Lawyers list related to Lawfirm
Route::get('/lawfirms', function(){
		
		$web_info = DB::table('info')->select()->first();
    	$cities = DB::table('cities')->select()->where('status','1')->get();
  		$states = DB::table('states')->select()->where('status','1')->get();
  		$regions = DB::table('regions')->select()->where('status','1')->get();
  		$badges = DB::table('badges')->select()->where('status','1')->get();
  		$expertises = DB::table('expertises')->select()->where('status','1')->get();
  		$lawfirm_names = DB::table('users')->select()->where('status','1')->where('role','=','lawfirm')->get();
  		$usersName = DB::table('users')->select()->where('status','=','1')->where('role','LIKE','Law%')->get();
  		$faqs = DB::table('faqs')->select()->where('status', '=', '1')->limit(5)->get();
  		$ratings = DB::table('ratings_comments')->where('status','1')->get();


		 $data = DB::table('users as u')
		     ->leftjoin('regions as r', 'r.id', '=', 'u.region_id')
		     ->leftjoin('lawfirms as f', 'f.ref_id', '=', 'u.id')
		     ->leftjoin('lawyers as l', 'l.ref_id', '=', 'u.id')

		     ->select('u.*','r.region_name','f.experience as fexperience','f.expertise as f_expertise_id', 'l.experience as lexperience','l.expertise as l_expertise_id','l.law_firm_id','l.premium as l_premium','f.premium as f_premium','f.badge as f_badge','l.badge as l_badge','f.fee_first as f_fee_first','l.fee_first as l_fee_first')
		     // ->Where('u.status', '=', '1')
		     ->orWhere([
					    ['u.status', '=', '1'],
					    ['u.role', '=', 'lawfirm'],
					])

			 ->paginate(5);

		return view('findalawyer', compact('data','expertises','cities','states','regions','lawfirm_names','web_info','badges','usersName','faqs','ratings'));

})->name('lawfirms');


// GET request to fetch Lawyers list related to Search Home page
Route::any('/search1', function(){

		$name = Input::get('name');		
		$city = Input::get('city');
		$area	= Input::get('area');

		$web_info = DB::table('info')->select()->first();
    	$cities = DB::table('cities')->select()->where('status','1')->get();
  		$states = DB::table('states')->select()->where('status','1')->get();
  		$regions = DB::table('regions')->select()->where('status','1')->get();
  		$badges = DB::table('badges')->select()->where('status','1')->get();
  		$expertises = DB::table('expertises')->select()->where('status','1')->get();
  		$lawfirm_names = DB::table('users')->select()->where('status','1')->where('role','=','lawfirm')->get();
  		$usersName = DB::table('users')->select()->where('status','=','1')->where('role','LIKE','Law%')->get();
  		$faqs = DB::table('faqs')->select()->where('status', '=', '1')->limit(5)->get();
  		$ratings = DB::table('ratings_comments')->where('status','1')->get();

		$qry='';
		if($name!=''){
				$qry =[['u.first_name', '=' ,$name],['u.status', '=', '1']];
			}elseif($city!=''){
				$qry =[['u.city_id', '=' , (int)$city],['u.status', '=', '1']];
			}elseif($area!=''){
				$qry =[ ['l.expertise', 'like' , '%'.$area.'%'],['u.status', '=', '1']];
			}elseif(($name!='')&&($city!='')){
				$qry =[['u.first_name', '=' ,$name],['u.city_id', '=' , (int)$city],['u.status', '=', '1']];
			}elseif(($area!='')&&($city!='')){
				$qry =[ ['u.city_id', '=' , (int)$city],['l.expertise', 'like' , '%'.$area.'%'],['u.status', '=', '1']];
			}elseif(($area!='')&&($name!='')){
				$qry =[['u.first_name', '=' ,$name],['l.expertise', 'like' , '%'.$area.'%'],['u.status', '=', '1']];
			}elseif(($area!='')&&($name!='')&&($city!='')){
				$qry =[['u.first_name', '=' ,$name],['l.expertise', 'like' , '%'.$area.'%'],['u.city_id', '=' , (int)$city],['u.status', '=', '1']];
			}else{
				$qry =[['u.first_name', '=' ,''],['l.expertise', 'like' , '%'.''.'%'],['u.city_id', '=' , ''],['u.status', '=', '1']];
			}

		 $data = DB::table('users as u')
		     ->leftjoin('regions as r', 'r.id', '=', 'u.region_id')
		     ->leftjoin('lawfirms as f', 'f.ref_id', '=', 'u.id')
		     ->leftjoin('lawyers as l', 'l.ref_id', '=', 'u.id')

		     ->select('u.*','r.region_name','f.experience as fexperience','f.expertise as f_expertise_id', 'l.experience as lexperience','l.expertise as l_expertise_id','l.law_firm_id','l.premium as l_premium','f.premium as f_premium','f.badge as f_badge','l.badge as l_badge','f.fee_first as f_fee_first','l.fee_first as l_fee_first')
		     ->where(function ($query) {
				    $query->where('u.role', '=', 'lawfirm')
				          ->orWhere('u.role', '=', 'lawyer');
				})
			->WHERE($qry)
		    /* ->orWhere([
					     ['u.status', '=', '1'],
					     ['u.role', '=', 'lawyer'],
					     ['l.expertise', 'like' , '%'.$area.'%'],
					 ])
		     ->orWhere([
					     ['u.status', '=', '1'],
					     ['u.role', '=', 'lawfirm'],
					     ['f.expertise', 'like' , '%'.$area.'%'],
					 ])

			 ->orWhere([['u.first_name', '=' ,$name],['u.status', '=', '1']])
		     ->orWhere([['u.city_id', '=' , (int)$city],['u.status', '=', '1']])*/
			 ->paginate(5);

		return view('findalawyer', compact('data','expertises','cities','states','regions','lawfirm_names','web_info','badges','usersName','faqs','ratings'));
	

})->name('search1');

// GET request to fetch Lawyers list related to Search
Route::any('/search', function(){

		$name = Input::get('name');		
		$city = Input::get('city');
		$state = Input::get('state');
		$region = Input::get('region');

		$web_info = DB::table('info')->select()->first();
    	$cities = DB::table('cities')->select()->where('status','1')->get();
  		$states = DB::table('states')->select()->where('status','1')->get();
  		$regions = DB::table('regions')->select()->where('status','1')->get();
  		$badges = DB::table('badges')->select()->where('status','1')->get();
  		$expertises = DB::table('expertises')->select()->where('status','1')->get();
  		$lawfirm_names = DB::table('users')->select()->where('status','1')->where('role','=','lawfirm')->get();
  		$usersName = DB::table('users')->select()->where('status','=','1')->where('role','LIKE','Law%')->get();
  		$faqs = DB::table('faqs')->select()->where('status', '=', '1')->limit(5)->get();
		$ratings = DB::table('ratings_comments')->where('status','1')->get();


		 $data = DB::table('users as u')
		     ->leftjoin('regions as r', 'r.id', '=', 'u.region_id')
		     ->leftjoin('lawfirms as f', 'f.ref_id', '=', 'u.id')
		     ->leftjoin('lawyers as l', 'l.ref_id', '=', 'u.id')

		     ->select('u.*','r.region_name','f.experience as fexperience','f.expertise as f_expertise_id', 'l.experience as lexperience','l.expertise as l_expertise_id','l.law_firm_id','l.premium as l_premium','f.premium as f_premium','f.badge as f_badge','l.badge as l_badge','f.fee_first as f_fee_first','l.fee_first as l_fee_first')

			 ->orWhere([['u.first_name', '=' ,$name],['u.status', '=', '1'],['u.role', '=', 'lawfirm']])
			 ->orWhere([['u.first_name', '=' ,$name],['u.status', '=', '1'],['u.role', '=', 'lawyer']])
		     ->orWhere([['u.city_id', '=' , (int)$city],['u.status', '=', '1'],['u.role', '=', 'lawfirm']])
		     ->orWhere([['u.city_id', '=' , (int)$city],['u.status', '=', '1'],['u.role', '=', 'lawyer']])
		     ->orWhere([['u.state_id', '=' , (int)$state],['u.status', '=', '1'],['u.role', '=', 'lawyer']])
		     ->orWhere([['u.state_id', '=' , (int)$state],['u.status', '=', '1'],['u.role', '=', 'lawfirm']])
		     ->orWhere([['u.region_id', '=' , (int)$region],['u.status', '=', '1'],['u.role', '=', 'lawfirm']])
		     ->orWhere([['u.region_id', '=' , (int)$region],['u.status', '=', '1'],['u.role', '=', 'lawyer']])

			 ->paginate(5);


		return view('findalawyer', compact('data','expertises','cities','states','regions','lawfirm_names','web_info','badges','usersName','faqs','ratings'));
	

})->name('search');






// Post Questions
Route::post('/ask','QuestionController@submit')->name('ask');

//Answers
Route::post('/answer','QuestionController@ans')->name('answer');








// Facebook socialight
Route::get('login/{services}', 'RegisterController@redirectToProvider');
Route::get('login/{services}/callback', 'RegisterController@handleProviderCallback');

// Google socialight
Route::get('login/{services}', 'RegisterController@redirectToProvider');
Route::get('login/{services}/callback', 'RegisterController@handleProviderCallback');
//Mailchimp Subscribe
Route::post('subscribe',['as'=>'subscribe','uses'=>'MailchimpController@subscribe']);
//Admin Contoller Routes Starts
//ajax call to delete gallery image
Route::get('/deletegimage/{id}','DetailController@deletegimage')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/ListQuickConsultations',[
	'uses' =>'Adminiscontroller@ListQuickConsultations',
	'as' =>'Adminiscontroller/ListQuickConsultations',
]);
Route::get('Adminiscontroller/edit_quickconsultation/{id}','Adminiscontroller@EditQuickConsultation')->WHERE(['id'=>"[0-9]+"]);
Route::post('Adminiscontroller/update-quickconsultation',[
	'uses' =>'Adminiscontroller@UpdateQuickConsultation',
	'as' =>'Adminiscontroller/update.quickconsultation',
]);
Route::get('Adminiscontroller/delete_quickconsultation/{id}','Adminiscontroller@DQC')->WHERE(['id'=>"[0-9]+"]);

Route::post('SetAppointment',[
     'uses' =>'AppointmentController@SetAppointment',
     'as' =>'SetAppointment',
 ]);
 Route::get('Adminiscontroller/edit_appointment/{id}','Adminiscontroller@EditAppointment')->WHERE(['id'=>"[0-9]+"]);
 Route::post('Adminiscontroller/update-appointment',[
	'uses' =>'Adminiscontroller@UpdateAppointment',
	'as' =>'Adminiscontroller/update.appointment',
]);
Route::get('Adminiscontroller/ListAppointments','Adminiscontroller@ListAppointments')->name('Adminiscontroller/ListAppointments');

Route::get('Adminiscontroller/delete_appointment/{id}','Adminiscontroller@DA')->WHERE(['id'=>"[0-9]+"]);

// Contact Us form email
Route::get('Admin','Adminiscontroller@login')->name('Admin');
Route::group(array('middleware' => 'admin'), function()
	{
	Route::post('adminmailer', [
		'uses'  => 'MailController@adminemailsend',
		'as'	=> 'adminmailer',
		]);
Route::get('Adminiscontroller/MailView','AdminisController@MailView')->name('Adminiscontroller/MailView');
//Blog post routes start
Route::get('Adminiscontroller/AddPost','PostController@AddPost');
Route::get('Adminiscontroller/ListPost','PostController@ListPost');
Route::get('Adminiscontroller/edit_post/{id}','PostController@EditPost')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/delete_post/{id}','PostController@DeletePost')->WHERE(['id'=>"[0-9]+"]);
	
//Route::get('save-lang','UserController@SaveUser');


Route::post('Adminiscontroller/save-post',[
	'uses' =>'PostController@SavePost',
	'as' =>'Adminiscontroller/save.post',
]);
Route::post('Adminiscontroller/update-post',[
	'uses' =>'PostController@Updatepost',
	'as' =>'Adminiscontroller/update.post',
]);
Route::get('Adminiscontroller/ListPost',[
	'uses' =>'PostController@ListPost',
	'as' =>'Adminiscontroller/ListPost',
]);
//Blog post routes end
//Slide routes start
Route::get('Adminiscontroller/AddSlide','SlideController@AddSlide');
Route::get('Adminiscontroller/ListSlide','SlideController@ListSlide');
Route::get('Adminiscontroller/edit_slide/{id}','SlideController@EditSlide')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/delete_slide/{id}','SlideController@DeleteSlide')->WHERE(['id'=>"[0-9]+"]);

//Route::get('save-lang','UserController@SaveUser');


Route::post('Adminiscontroller/save-slide',[
	'uses' =>'SlideController@SaveSlide',
	'as' =>'Adminiscontroller/save.slide',
]);
Route::post('Adminiscontroller/update-slide',[
	'uses' =>'SlideController@Updateslide',
	'as' =>'Adminiscontroller/update.slide',
]);
Route::get('Adminiscontroller/ListSlide',[
	'uses' =>'SlideController@ListSlide',
	'as' =>'Adminiscontroller/ListSlide',
]);
//Slide routes end
//testimonial routes start
Route::get('Adminiscontroller/AddTestimonial','TestimonialController@AddTestimonial');
Route::get('Adminiscontroller/ListTestimonial','TestimonialController@ListTestimonial');
Route::get('Adminiscontroller/edit_testimonial/{id}','TestimonialController@EditTestimonial')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/delete_testimonial/{id}','TestimonialController@DeleteTestimonial')->WHERE(['id'=>"[0-9]+"]);

//Route::get('save-lang','UserController@SaveUser');


Route::post('Adminiscontroller/save-testimonial',[
	'uses' =>'TestimonialController@SaveTestimonial',
	'as' =>'Adminiscontroller/save.testimonial',
]);
Route::post('Adminiscontroller/update-testimonial',[
	'uses' =>'TestimonialController@Updatetestimonial',
	'as' =>'Adminiscontroller/update.testimonial',
]);
Route::get('Adminiscontroller/ListTestimonial',[
	'uses' =>'TestimonialController@ListTestimonial',
	'as' =>'Adminiscontroller/ListTestimonial',
]);
//tstimonial routes end
// WEbinfo start
Route::get('Adminiscontroller/WebInfo','InfoController@ViewInfo')->name('Adminiscontroller/WebInfo');
Route::get('Adminiscontroller/ChangeWebInfo/{id}','InfoController@EditInfo')->WHERE(['id'=>"[0-9]+"]);
Route::post('Adminiscontroller/update-webinfo',[
	'uses' =>'InfoController@updateInfo',
	'as' =>'Adminiscontroller/update.webinfo',
]);
//Webinfo end
// WEbabout start
Route::get('Adminiscontroller/WebAbout','AboutController@ViewAbout')->name('Adminiscontroller/WebAbout');
Route::get('Adminiscontroller/ChangeWebAbout/{id}','AboutController@EditAbout')->WHERE(['id'=>"[0-9]+"]);
Route::post('Adminiscontroller/update-webabout',[
	'uses' =>'AboutController@updateAbout',
	'as' =>'Adminiscontroller/update.webabout',
]);
//Webabout end

Route::get('Adminiscontroller','Adminiscontroller@index')->name('Adminiscontroller');
Route::get('adminiscontroller','Adminiscontroller@index')->name('Adminiscontroller');
Route::get('Adminiscontroller/getQuestion','Adminiscontroller@getQuestions');
Route::get('Adminiscontroller/getAnswer','Adminiscontroller@getAnswers');
Route::get('Adminiscontroller/ListQuestion','Adminiscontroller@ListQuestions')->name('Adminiscontroller/ListQuestion');
Route::get('Adminiscontroller/ListAnswer','Adminiscontroller@ListAnswers')->name('Adminiscontroller/ListAnswer');
Route::get('Adminiscontroller/EnableQuestion/{id}','Adminiscontroller@EnableQuestion')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/EnableAnswer/{id}','Adminiscontroller@EnableAnswer')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/DisableQuestion/{id}','Adminiscontroller@DisableQuestion')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/DisableAnswer/{id}','Adminiscontroller@DisableAnswer')->WHERE(['id'=>"[0-9]+"]);




Route::get('Adminiscontroller/ListCommentsApproval','Adminiscontroller@LCA')->name('Adminiscontroller/ListCommentsApproval');
Route::get('Adminiscontroller/ListPostCommentsApproval','Adminiscontroller@LPCA')->name('Adminiscontroller/ListPostCommentsApproval');
Route::get('Adminiscontroller/ListNewApproval','Adminiscontroller@LNA')->name('Adminiscontroller/ListNewApproval');
Route::get('Adminiscontroller/ListUpdateApproval','Adminiscontroller@LUA')->name('Adminiscontroller/ListUpdateApproval');
Route::get('Adminiscontroller/Approve/{id}','Adminiscontroller@Approve')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/Pending/{id}','Adminiscontroller@Pending')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/Disable/{id}','Adminiscontroller@Disable')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/Block/{id}','Adminiscontroller@Block')->WHERE(['id'=>"[0-9]+"]);
//rating comment start
Route::get('Adminiscontroller/ListClaimProfiles','Adminiscontroller@LCP')->name('Adminiscontroller/ListClaimProfiles');

Route::get('Adminiscontroller/ListRatingComments','Adminiscontroller@LRC')->name('Adminiscontroller/ListRatingComments');
Route::get('Adminiscontroller/ApproveRatingComment/{id}','Adminiscontroller@RatingCommentEnable')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/DisableRatingComment/{id}','Adminiscontroller@RatingCommentDisable')->WHERE(['id'=>"[0-9]+"]);

//rating comment end
//cliam profile start
Route::get('Adminiscontroller/ClaimAccountApprove/{id}','Adminiscontroller@ClaimAccountApprove')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/ClaimAccountPending/{id}','Adminiscontroller@ClaimAccountPending')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/ClaimAccountDisable/{id}','Adminiscontroller@ClaimAccountDisable')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/ClaimAccountBlock/{id}','Adminiscontroller@ClaimAccountBlock')->WHERE(['id'=>"[0-9]+"]);

//cliam profile end

Route::get('Adminiscontroller/PostCommentApprove/{id}','Adminiscontroller@PostCommentApprove')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/PostCommentPending/{id}','Adminiscontroller@PostCommentPending')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/PostCommentDisable/{id}','Adminiscontroller@PostCommentDisable')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/PostCommentBlock/{id}','Adminiscontroller@PostCommentBlock')->WHERE(['id'=>"[0-9]+"]);


Route::get('Adminiscontroller/AccountApprove/{id}','Adminiscontroller@AccountApprove')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/AccountPending/{id}','Adminiscontroller@AccountPending')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/AccountDisable/{id}','Adminiscontroller@AccountDisable')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/AccountBlock/{id}','Adminiscontroller@AccountBlock')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/UpdateAccountApprove/{id}','Adminiscontroller@UpdateAccountApprove')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/UpdateAccountPending/{id}','Adminiscontroller@UpdateAccountPending')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/UpdateAccountDisable/{id}','Adminiscontroller@UpdateAccountDisable')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/UpdateAccountBlock/{id}','Adminiscontroller@UpdateAccountBlock')->WHERE(['id'=>"[0-9]+"]);
//Admin Contoller Routes End

//Admin Courts Routes
Route::get('Adminiscontroller/AddCourt','CourtController@AddCourt');
Route::get('Adminiscontroller/ListCourt','CourtController@ListCourt');
Route::get('Adminiscontroller/edit_court/{id}','CourtController@EditCourt')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/delete_court/{id}','CourtController@DeleteCourt')->WHERE(['id'=>"[0-9]+"]);
//Route::post('save-court','CourtController@SaveCourt');
Route::post('Adminiscontroller/save-court',[
	'uses' =>'CourtController@SaveCourt',
	'as' =>'Adminiscontroller/save.court',
]);
Route::post('Adminiscontroller/update-court',[
	'uses' =>'CourtController@updateCourt',
	'as' =>'Adminiscontroller/update.court',
]);
Route::get('Adminiscontroller/ListCourt',[
	'uses' =>'CourtController@ListCourt',
	'as' =>'Adminiscontroller/ListCourt',
]);
Route::get('Adminiscontroller/AddBar','BarController@AddBar');
Route::get('Adminiscontroller/ListBar','BarController@ListBar');
Route::get('Adminiscontroller/edit_bar/{id}','BarController@EditBar')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/delete_bar/{id}','BarController@DeleteBar')->WHERE(['id'=>"[0-9]+"]);
//Route::post('save-court','CourtController@SaveCourt');
Route::post('Adminiscontroller/save-bar',[
	'uses' =>'BarController@SaveBar',
	'as' =>'Adminiscontroller/save.bar',
]);
Route::post('Adminiscontroller/update-bar',[
	'uses' =>'BarController@updateBar',
	'as' =>'Adminiscontroller/update.bar',
]);
Route::get('Adminiscontroller/ListBar',[
	'uses' =>'BarController@ListBar',
	'as' =>'Adminiscontroller/ListBar',
]);


Route::get('Adminiscontroller/AddLanguage','LanguageController@AddLanguage');
Route::get('Adminiscontroller/ListLanguage','LanguageController@ListLanguage');
Route::get('Adminiscontroller/edit_language/{id}','LanguageController@EditLanguage')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/delete_language/{id}','LanguageController@DeleteLanguage')->WHERE(['id'=>"[0-9]+"]);
//Route::get('save-lang','LanguageController@SaveLanguage');


Route::post('Adminiscontroller/save-lang',[
	'uses' =>'LanguageController@SaveLanguage',
	'as' =>'Adminiscontroller/save.lang',
]);
Route::post('Adminiscontroller/update-lang',[
	'uses' =>'LanguageController@UpdateLanguage',
	'as' =>'Adminiscontroller/update.lang',
]);
Route::get('Adminiscontroller/ListLanguage',[
	'uses' =>'LanguageController@ListLanguage',
	'as' =>'Adminiscontroller/ListLanguage',
]);
///Admin User Routes
Route::get('Adminiscontroller/AddUser','UserController@AddUser');
Route::get('Adminiscontroller/ListUser','UserController@ListUser');
Route::get('Adminiscontroller/edit_user/{id}','UserController@EditUser')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/delete_user/{id}','UserController@DeleteUser')->WHERE(['id'=>"[0-9]+"]);

//Route::get('save-lang','UserController@SaveUser');


Route::post('Adminiscontroller/save-user',[
	'uses' =>'UserController@SaveUser',
	'as' =>'Adminiscontroller/save.user',
]);
Route::post('Adminiscontroller/update-user',[
	'uses' =>'UserController@UpdateUser',
	'as' =>'Adminiscontroller/update.user',
]);
Route::get('Adminiscontroller/ListUser',[
	'uses' =>'UserController@ListUser',
	'as' =>'Adminiscontroller/ListUser',
]);

//Admin Region Routes
Route::get('Adminiscontroller/AddRegion','RegionController@AddRegion');
Route::get('Adminiscontroller/ListRegion','RegionController@ListRegion');
Route::get('Adminiscontroller/edit_region/{id}','RegionController@EditRegion')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/delete_region/{id}','RegionController@DeleteRegion')->WHERE(['id'=>"[0-9]+"]);

//Route::get('save-lang','UserController@SaveUser');


Route::post('Adminiscontroller/save-region',[
	'uses' =>'RegionController@SaveRegion',
	'as' =>'Adminiscontroller/save.region',
]);
Route::post('Adminiscontroller/update-region',[
	'uses' =>'RegionController@Updateregion',
	'as' =>'Adminiscontroller/update.region',
]);
Route::get('Adminiscontroller/ListRegion',[
	'uses' =>'RegionController@ListRegion',
	'as' =>'Adminiscontroller/ListRegion',
]);

//Admin States Routes
Route::get('Adminiscontroller/AddState','StateController@AddState');
Route::get('Adminiscontroller/ListState','StateController@ListState');
Route::get('Adminiscontroller/edit_state/{id}','StateController@EditState')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/delete_state/{id}','StateController@DeleteState')->WHERE(['id'=>"[0-9]+"]);

//Route::get('save-lang','UserController@SaveUser');


Route::post('Adminiscontroller/save-state',[
	'uses' =>'StateController@SaveState',
	'as' =>'Adminiscontroller/save.state',
]);
Route::post('Adminiscontroller/update-state',[
	'uses' =>'StateController@UpdateState',
	'as' =>'Adminiscontroller/update.state',
]);
Route::get('Adminiscontroller/ListState',[
	'uses' =>'StateController@ListState',
	'as' =>'Adminiscontroller/ListState',
]);

//Admin Cities Routes
Route::get('Adminiscontroller/AddCity','CityController@AddCity');
Route::get('Adminiscontroller/ListCity','CityController@ListCity');
Route::get('Adminiscontroller/edit_city/{id}','CityController@EditCity')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/delete_city/{id}','CityController@DeleteCity')->WHERE(['id'=>"[0-9]+"]);

//Route::get('save-lang','UserController@SaveUser');


Route::post('Adminiscontroller/save-city',[
	'uses' =>'CityController@SaveCity',
	'as' =>'Adminiscontroller/save.city',
]);
Route::post('Adminiscontroller/update-city',[
	'uses' =>'CityController@UpdateCity',
	'as' =>'Adminiscontroller/update.city',
]);
Route::get('Adminiscontroller/ListCity',[
	'uses' =>'CityController@ListCity',
	'as' =>'Adminiscontroller/ListCity',
]);
//Admin Lawyers Routes
Route::get('Adminiscontroller/AddLawyer','LawyerController@AddLawyer');
Route::get('Adminiscontroller/ListLawyer','LawyerController@ListLawyer');
Route::get('Adminiscontroller/ListPremiumLawyer','LawyerController@ListPremiumLawyer');
Route::get('Adminiscontroller/edit_lawyer/{id}','LawyerController@EditLawyer')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/delete_lawyer/{id}','LawyerController@DeleteLawyer')->WHERE(['id'=>"[0-9]+"]);

//Route::get('save-lang','UserController@SaveUser');


Route::post('Adminiscontroller/save-lawyer',[
	'uses' =>'LawyerController@SaveLawyer',
	'as' =>'Adminiscontroller/save.lawyer',
]);
Route::post('Adminiscontroller/update-lawyer',[
	'uses' =>'LawyerController@UpdateLawyer',
	'as' =>'Adminiscontroller/update.lawyer',
]);
Route::get('Adminiscontroller/ListLawyer',[
	'uses' =>'LawyerController@ListLawyer',
	'as' =>'Adminiscontroller/ListLawyer',
]);
//Admin LawFirms Routes
Route::get('Adminiscontroller/AddLawfirm','LawfirmController@AddLawfirm');
Route::get('Adminiscontroller/ListLawfirm','LawfirmController@ListLawfirm');
Route::get('Adminiscontroller/ListPremiumLawfirm','LawfirmController@ListPremiumLawfirm');
Route::get('Adminiscontroller/edit_lawfirm/{id}','LawfirmController@EditLawfirm')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/delete_lawfirm/{id}','LawfirmController@DeleteLawfirm')->WHERE(['id'=>"[0-9]+"]);

//Route::get('save-lang','UserController@SaveUser');


Route::post('Adminiscontroller/save-lawfirm',[
	'uses' =>'LawfirmController@SaveLawfirm',
	'as' =>'Adminiscontroller/save.lawfirm',
]);
Route::post('Adminiscontroller/update-lawfirm',[
	'uses' =>'LawfirmController@UpdateLawfirm',
	'as' =>'Adminiscontroller/update.lawfirm',
]);
Route::get('Adminiscontroller/ListLawfirm',[
	'uses' =>'LawfirmController@ListLawfirm',
	'as' =>'Adminiscontroller/ListLawfirm',
]);

//Admin Lawyers Routes
Route::get('Adminiscontroller/AddExpertise','ExpertiseController@AddExpertise');
Route::get('Adminiscontroller/ListExpertise','ExpertiseController@ListExpertise');
Route::get('Adminiscontroller/edit_expertise/{id}','ExpertiseController@EditExpertise')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/delete_expertise/{id}','ExpertiseController@DeleteExpertise')->WHERE(['id'=>"[0-9]+"]);

//Route::get('save-lang','UserController@SaveUser');


Route::post('Adminiscontroller/save-expertise',[
	'uses' =>'ExpertiseController@SaveExpertise',
	'as' =>'Adminiscontroller/save.expertise',
]);
Route::post('Adminiscontroller/update-expertise',[
	'uses' =>'ExpertiseController@UpdateExpertise',
	'as' =>'Adminiscontroller/update.expertise',
]);
Route::get('Adminiscontroller/ListExpertise',[
	'uses' =>'ExpertiseController@ListExpertise',
	'as' =>'Adminiscontroller/ListExpertise',
]);
//End Expertises Route

//Admin FAQ Routes
Route::get('Adminiscontroller/AddFaq','FaqController@AddFaq');
Route::get('Adminiscontroller/ListFaq','FaqController@ListFaq');
Route::get('Adminiscontroller/edit_faq/{id}','FaqController@EditFaq')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/delete_faq/{id}','FaqController@DeleteFaq')->WHERE(['id'=>"[0-9]+"]);

//Route::get('save-lang','UserController@SaveUser');


Route::post('Adminiscontroller/save-faq',[
	'uses' =>'FaqController@SaveFaq',
	'as' =>'Adminiscontroller/save.faq',
]);
Route::post('Adminiscontroller/update-faq',[
	'uses' =>'FaqController@UpdateFaq',
	'as' =>'Adminiscontroller/update.faq',
]);
Route::get('Adminiscontroller/ListFaq',[
	'uses' =>'FaqController@ListFaq',
	'as' =>'Adminiscontroller/ListFaq',
]);
//Admin badges Routes
Route::get('Adminiscontroller/AddBadge','BadgeController@AddBadge');
Route::get('Adminiscontroller/ListBadge','FaqController@ListBadge');
Route::get('Adminiscontroller/edit_badge/{id}','BadgeController@EditBadge')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/delete_badge/{id}','BadgeController@DeleteBadge')->WHERE(['id'=>"[0-9]+"]);

//Route::get('save-lang','UserController@SaveUser');


Route::post('Adminiscontroller/save-badge',[
	'uses' =>'BadgeController@SaveBadge',
	'as' =>'Adminiscontroller/save.badge',
]);
Route::post('Adminiscontroller/update-badge',[
	'uses' =>'BadgeController@UpdateBadge',
	'as' =>'Adminiscontroller/update.badge',
]);
Route::get('Adminiscontroller/ListBadge',[
	'uses' =>'BadgeController@ListBadge',
	'as' =>'Adminiscontroller/ListBadge',
]);

Route::get('Adminiscontroller/AddEmail','EmailController@AddEmail');
Route::get('Adminiscontroller/ListEmail','EmailController@ListEmail');
Route::get('Adminiscontroller/edit_email/{id}','EmailController@EditEmail')->WHERE(['id'=>"[0-9]+"]);
Route::get('Adminiscontroller/delete_email/{id}','EmailController@DeleteEmail')->WHERE(['id'=>"[0-9]+"]);

Route::post('Adminiscontroller/save-email',[
	'uses' =>'EmailController@SaveEmail',
	'as' =>'Adminiscontroller/save.email',
]);
Route::post('Adminiscontroller/update-email',[
	'uses' =>'EmailController@UpdateEmail',
	'as' =>'Adminiscontroller/update.email',
]);
Route::get('Adminiscontroller/ListEmail',[
	'uses' =>'EmailController@ListEmail',
	'as' =>'Adminiscontroller/ListEmail',
]);

// Ajax request to fetch cities
Route::post('Adminiscontroller/admingetcity', function(){
	if(Request::ajax()){
		$state = $_POST['state_id'];
		$cities = DB::table('cities')->select()->where('state_id', '=',$state)->get();
  
		foreach($cities as $city)
		    {
		        echo "
				<option value='$city->id'>$city->city_name</option>
		            ";
		    }
	}
})->name('Adminiscontroller/admingetcity');

// Ajax request to fetch cities
Route::post('Adminiscontroller/edit_lawfirm/admingetcity', function(){
	if(Request::ajax()){
		$state = $_POST['state_id'];
		$cities = DB::table('cities')->select()->where('state_id', '=',$state)->get();
  
		foreach($cities as $city)
		    {
		        echo "
				<option value='$city->id'>$city->city_name</option>
		            ";
		    }
	}
})->name('Adminiscontroller/edit_lawfirm/admingetcity');

// Ajax request to fetch cities
Route::post('Adminiscontroller/edit_lawyer/admingetcity', function(){
	if(Request::ajax()){
		$state = $_POST['state_id'];
		$cities = DB::table('cities')->select()->where('state_id', '=',$state)->get();
  
		foreach($cities as $city)
		    {
		        echo "
				<option value='$city->id'>$city->city_name</option>
		            ";
		    }
	}
})->name('Adminiscontroller/edit_lawyer/admingetcity');



// Ajax request to fetch states
Route::post('Adminiscontroller/admingetstate', function(){
	if(Request::ajax()){
		$region = $_POST['region_id'];
	$states = DB::table('states')->select()->where('region_id', '=',$region)->get();
  
		foreach($states as $state)
		    {
		            echo "
				<option value='$state->id'>$state->state_name</option>
		            ";
		    }
	}
})->name('Adminiscontroller/admingetstate');

// Ajax request to fetch states
Route::post('Adminiscontroller/edit_city/admingetstate', function(){
	if(Request::ajax()){
		$region = $_POST['region_id'];
	$states = DB::table('states')->select()->where('region_id', '=',$region)->get();
  
		foreach($states as $state)
		    {
		            echo "
				<option value='$state->id'>$state->state_name</option>
		            ";
		    }
	}
})->name('Adminiscontroller/edit_city/admingetstate');

// Ajax request to fetch states
Route::post('Adminiscontroller/edit_lawfirm/admingetstate', function(){
	if(Request::ajax()){
		$region = $_POST['region_id'];
	$states = DB::table('states')->select()->where('region_id', '=',$region)->get();
  
		foreach($states as $state)
		    {
		            echo "
				<option value='$state->id'>$state->state_name</option>
		            ";
		    }
	}
})->name('Adminiscontroller/edit_lawfirm/admingetstate');

// Ajax request to fetch states
Route::post('Adminiscontroller/edit_lawyer/admingetstate', function(){
	if(Request::ajax()){
		$region = $_POST['region_id'];
	$states = DB::table('states')->select()->where('region_id', '=',$region)->get();
  
		foreach($states as $state)
		    {
		            echo "
				<option value='$state->id'>$state->state_name</option>
		            ";
		    }
	}
})->name('Adminiscontroller/edit_lawyer/admingetstate');


});
//Admin Routes End

