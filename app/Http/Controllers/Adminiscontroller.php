<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailchimpController;

use App\Http\Requests\courtreq;

use Validator;

use App\nep_courts;
use App\nep_appointments;
use App\nep_users;
use App\nep_questions;
use App\nep_answers;
use App\nep_posts;
use App\nep_quickconsultations;
use App\nep_post_comment;
use App\nep_ratings_comments;
use App\nep_claimprofile;
use Mailchimp;

use Illuminate\Support\Facades\Redirect;

use DB;
use App\nep_notifications;
use App\nep_certificate_award;

class AdminisController extends Controller
{
    public function __constructor(){
			
		}
		public function data(){
				$notiupd = DB::table('notifications')
					->orwhere('type','update')
					->where('status','pending')
					->get();
				$notireg = DB::table('notifications')
						->orwhere('type','register')
						->where('status','pending')
						->get();
				$noticom = DB::table('notifications')
						->orwhere('type','comment')
						->where('status','pending')
						->get();
				$notipostcom = DB::table('post_comment')
						->where('status','pending')
						->get();
				$notiapp = DB::table('appointments')
						->where('status','0')
						->get();
				$notiqc = DB::table('quickconsultations')
						->where('status','0')
						->get();
				$notirating = DB::table('ratings_comments')
						->where('status','0')
						->get();
				$noticlaimprofile = DB::table('claimprofile')
						->where('status','pending')
						->get();
				//dd(count($noticom));
				$cnotiques= count($this->getQuestions());
				$cnotians= count($this->getAnswers());
				$cnotireg = count($notireg);
				$cnotiupd = count($notiupd);
				$cnoticom = count($noticom);
				$cnotipostcom = count($notipostcom);
				$cnotiapp = count($notiapp);
				$notiqc = count($notiqc);
				$notirating = count($notirating);
				$noticliamprofile = count($noticlaimprofile);
				
				$dataarra=['upd'=>$cnotiupd,'reg'=>$cnotireg,'com'=>$cnoticom,'ques'=> $cnotiques, 'ans'=> $cnotians,'postcmt'=> $cnotipostcom,'appoint'=>$cnotiapp,'quickc'=>$notiqc,'rating'=>$notirating,'claimprofile'=>$noticliamprofile];
				return $dataarra;
			}
	public function login(){
			$info = ['sTitle'=>'Nepal Lawer'];
			//dd($info);
			return view('admin/login')->with('info', $info);;
		}
	public function index(){
			$dataarr= $this->data();
			$info = ['sTitle'=>'Admin Panel', 'pTitle'=>'Administration Panel','cdata'=>$dataarr];
			return view('admin/dashboard')->with('info', $info);
		}
		public function LCA(){
			$noticom = $this->getComment();
			$dataarr= $this->data();
			$info = ['sTitle'=>'Comment', 'pTitle'=>'List Comments','cdata'=> $dataarr,'comments'=>$noticom];
			//dd($info);
			return view('admin/comments_list')->with('info', $info);;
		}
		public function LPCA(){
			$notipostcmt = $this->getPostComments();
			$dataarr= $this->data();
			$info = ['sTitle'=>'Comment', 'pTitle'=>'List Comments','cdata'=> $dataarr,'comments'=>$notipostcmt];
			//dd($info);
			return view('admin/post_comment_list')->with('info', $info);;
		}
		public function LNA(){
			$noticom = $this->getRegister();
			$dataarr= $this->data();
			
			$info = ['sTitle'=>'New Accounts For Approval','edit'=>'Edit','delete'=>'Delete', 'pTitle'=>'List New Accounts For Approval','cdata'=> $dataarr,'accounts'=>$noticom];
			//dd($info);
			return view('admin/new_accounts_list')->with('info', $info);
		}
		public function LUA(){
			$noticom = $this->getUpdate();
			$dataarr= $this->data();
			$info = ['sTitle'=>'Update Accounts For Award/Certificate','edit'=>'Edit','delete'=>'Delete', 'pTitle'=>'List Update Accounts For Award/Certificate','cdata'=> $dataarr,'accounts'=>$noticom];
			//dd($info);
			return view('admin/update_accounts_list')->with('info', $info);
		}
		public function getPostComments(){
				return $notipostcmt = DB::table('post_comment')
							->select('post_comment.*','posts.post_title')
							->leftjoin('posts', 'posts.id', '=', 'post_comment.post_id')		
							->get();
			}
		public function getQuestions(){
				return $notique = DB::table('questions')
						->where('status','pending')
						->get();
			}
		public function getAnswers(){
				return $notique = DB::table('answers')
						->where('status','pending')
						->get();
			}
		public function ListQuestions(){
			$dataarr= $this->data();
			$questions = DB::table('questions')
							->select('questions.*','users.image_path','users.first_name as user_name')
							->leftjoin('users', 'users.id', '=', 'questions.user_id')
							->get();
			$info = ['sTitle'=>'Questions List','enable'=>'EnableQuestion','disable'=>'DisableQuestion', 'pTitle'=>'Questions List','cdata'=> $dataarr,'questions'=>$questions];
			//dd($info);
			return view('admin/questions_list')->with('info', $info);
				
			}
		public function ListAnswers(){
			$dataarr= $this->data();
			$answers = DB::table('answers')
						->select('answers.*','users.image_path','users.first_name as user_name','questions.question as question','questions.question_detail as question_detail')
							->leftjoin('users', 'users.id', '=', 'answers.replayer_id')
							->leftjoin('questions', 'questions.id', '=', 'answers.question_id')
							->get();
			$info = ['sTitle'=>'Answers List','enable'=>'EnableAnswer','disable'=>'DisableAnswer', 'pTitle'=>'Answers List','cdata'=> $dataarr,'answers'=>$answers];
			//dd($info);
			return view('admin/answers_list')->with('info', $info);
				
			}
		public function EnableQuestion(Request $req){
				$ques= nep_questions::Find($req->id);
				$ques->Fill([
					'status' => '1',
				]);
				$ques->save();
				return redirect()->route('Adminiscontroller/ListQuestion');
			}
		public function EnableAnswer(Request $req){
				$ans= nep_answers::Find($req->id);
				$ans->Fill([
					'status' => '1',
				]);
				$ans->save();
				return redirect()->route('Adminiscontroller/ListAnswer');
			}
		public function DisableQuestion(Request $req){
			$ques= nep_questions::Find($req->id);
			$ques->Fill([
				'status' => '0',
			]);
			$ques->save();
			return redirect()->route('Adminiscontroller/ListQuestion');
		}
		public function DisableAnswer(Request $req){
				$ans= nep_answers::Find($req->id);
				$ans->Fill([
					'status' => '0',
				]);
				$ans->save();
				return redirect()->route('Adminiscontroller/ListAnswer');
			}
		public function getComment(){
				return $noticom = DB::table('notifications')
						->select('notifications.*','users.first_name as name')
						->leftjoin('users', 'users.id', '=', 'notifications.ref_id')
						->where('type','comment')
						->get();
			}
		public function getRegister(){
				return	$notireg =DB::table('notifications')
							->select('notifications.*','lawfirms.license_number  as f_license_number','lawfirms.id as lw_id','lawyers.license_number as l_license_number','lawyers.id as l_id','users.image_path','users.first_name','users.role')
							->leftjoin('users', 'users.id', '=', 'notifications.ref_id')
							->leftjoin('lawyers', 'lawyers.ref_id', '=', 'notifications.ref_id')
							->leftjoin('lawfirms', 'lawfirms.ref_id', '=', 'notifications.ref_id')
							->where('type','register')
							->get();
			}
		public function getUpdate(){
			return $notireg =DB::table('notifications')
							->select('notifications.*','lawfirms.license_number  as f_license_number','lawfirms.id as lw_id','lawyers.license_number as l_license_number','lawyers.id as l_id','certificate_award.image_path as award','certificate_award.title as award_title','users.image_path','users.first_name','users.role')
							->leftjoin('users', 'users.id', '=', 'notifications.ref_id')
							->leftjoin('certificate_award', 'certificate_award.id', '=', 'notifications.data_type_id')
							->leftjoin('lawyers', 'lawyers.ref_id', '=', 'notifications.ref_id')
							->leftjoin('lawfirms', 'lawfirms.ref_id', '=', 'notifications.ref_id')
							->where('type','update')
							->get();
		}
		public function CommentApprove(Request $req){
				$noti= nep_notifications::Find($req->id);
				$noti->Fill([
					'status' => 'approve',
				]);
				$noti->save();
				return redirect()->route('Adminiscontroller/ListCommentsApproval');
			}
		public function CommentPending(Request $req){
				$noti= nep_notifications::Find($req->id);
				$noti->Fill([
					'status' => 'pending',
				]);
				$noti->save();
				return redirect()->route('Adminiscontroller/ListCommentsApproval');
			}
		public function CommentDisable(Request $req){
				$noti= nep_notifications::Find($req->id);
				$noti->Fill([
					'status' => 'disable',
				]);
				$noti->save();
				return redirect()->route('Adminiscontroller/ListCommentsApproval');
			}
		public function CommentBlock(Request $req){
				$noti= nep_notifications::Find($req->id);
				$noti->Fill([
					'status' => 'block',
				]);
				$noti->save();
				return redirect()->route('Adminiscontroller/ListCommentsApproval');
			}
		public function PostCommentApprove(Request $req){
				$noti= nep_post_comment::Find($req->id);
				$noti->Fill([
					'status' => 'approve',
				]);
				$noti->save();
				return redirect()->route('Adminiscontroller/ListPostCommentsApproval');
			}
		public function PostCommentPending(Request $req){
				$noti= nep_post_comment::Find($req->id);
				$noti->Fill([
					'status' => 'pending',
				]);
				$noti->save();
				return redirect()->route('Adminiscontroller/ListPostCommentsApproval');
			}
		public function PostCommentDisable(Request $req){
				$noti= nep_post_comment::Find($req->id);
				$noti->Fill([
					'status' => 'disable',
				]);
				$noti->save();
				return redirect()->route('Adminiscontroller/ListPostCommentsApproval');
			}
		public function PostCommentBlock(Request $req){
				$noti= nep_post_comment::Find($req->id);
				$noti->Fill([
					'status' => 'block',
				]);
				$noti->save();
				return redirect()->route('Adminiscontroller/ListPostCommentsApproval');
			}
			
		public function AccountApprove(Request $req){
				$noti= nep_notifications::Find($req->id);
				$noti->Fill([
					'status' => 'approve',
				]);
				$noti->save();
				if($noti->user_type=='lawfirm'){
					$user= nep_users::Find($noti->ref_id);
						$user->Fill([
							'status' => '1',
						]);
						$user->save();
					}
				if($noti->user_type=='lawyer'){
					$user= nep_users::Find($noti->ref_id);
						$user->Fill([
							'status' => '1',
						]);
						$user->save();
					}
				return redirect()->route('Adminiscontroller/ListNewApproval');
			}
		public function AccountPending(Request $req){
				$noti= nep_notifications::Find($req->id);
				$noti->Fill([
					'status' => 'pending',
				]);
				$noti->save();
				if($noti->user_type=='lawfirm'){
					$user= nep_users::Find($noti->ref_id);
						$user->Fill([
							'status' => '0',
						]);
						$user->save();
					}
				if($noti->user_type=='lawyer'){
					$user= nep_users::Find($noti->ref_id);
						$user->Fill([
							'status' => '0',
						]);
						$user->save();
					}
				return redirect()->route('Adminiscontroller/ListNewApproval');
			}
		public function AccountDisable(Request $req){
				$noti= nep_notifications::Find($req->id);
				$noti->Fill([
					'status' => 'disable',
				]);
				$noti->save();
				if($noti->user_type=='lawfirm'){
					$user= nep_users::Find($noti->ref_id);
						$user->Fill([
							'status' => '0',
						]);
						$user->save();
					}
				if($noti->user_type=='lawyer'){
					$user= nep_users::Find($noti->ref_id);
						$user->Fill([
							'status' => '0',
						]);
						$user->save();
					}
				return redirect()->route('Adminiscontroller/ListNewApproval');
			}
		public function AccountBlock(Request $req){
				$noti= nep_notifications::Find($req->id);
				$noti->Fill([
					'status' => 'block',
				]);
				$noti->save();
				if($noti->user_type=='lawfirm'){
					$user= nep_users::Find($noti->ref_id);
						$user->Fill([
							'status' => '0',
						]);
						$user->save();
					}
				if($noti->user_type=='lawyer'){
					$user= nep_users::Find($noti->ref_id);
						$user->Fill([
							'status' => '0',
						]);
						$user->save();
					}
				return redirect()->route('Adminiscontroller/ListNewApproval');
			}
			
		public function UpdateAccountApprove(Request $req){
				$noti= nep_notifications::Find($req->id);
				$noti->Fill([
					'status' => 'approve',
				]);
				$noti->save();
				
				$award= nep_certificate_award::Find($noti->data_type_id);
				$award->Fill([
					'status' => 'approve',
				]);
				$award->save();
				return redirect()->route('Adminiscontroller/ListUpdateApproval');
			}
		public function UpdateAccountPending(Request $req){
				$noti= nep_notifications::Find($req->id);
				$noti->Fill([
					'status' => 'pending',
				]);
				$noti->save();
				$award= nep_certificate_award::Find($noti->data_type_id);
				$award->Fill([
					'status' => 'pending',
				]);
				$award->save();
				return redirect()->route('Adminiscontroller/ListUpdateApproval');
			}
		public function UpdateAccountDisable(Request $req){
				$noti= nep_notifications::Find($req->id);
				$noti->Fill([
					'status' => 'disable',
				]);
				$noti->save();
				$award= nep_certificate_award::Find($noti->data_type_id);
				$award->Fill([
					'status' => 'disable',
				]);
				$award->save();
				return redirect()->route('Adminiscontroller/ListUpdateApproval');
			}
		public function UpdateAccountBlock(Request $req){
				$noti= nep_notifications::Find($req->id);
				$noti->Fill([
					'status' => 'block',
				]);
				$noti->save();
				$award= nep_certificate_award::Find($noti->data_type_id);
				$award->Fill([
					'status' => 'block',
				]);
				$award->save();
				return redirect()->route('Adminiscontroller/ListUpdateApproval');
			}
		public function MailView(){
				$emails = DB::table('emails')
						->where('status','1')
						->get();
				$dataarr= $this->data();
			$info = ['sTitle'=>'Send An Email', 'pTitle'=>'Send An Email','cdata'=>$dataarr,'emails'=>$emails];
			return view('admin/mailview')->with('info', $info);
				
			}
		public function ListAppointments(){
			$dataarr= $this->data();
			$appoints = DB::table('appointments')
							
							->leftjoin('users as urt', 'urt.id', '=', 'appointments.refered_to')
							->leftjoin('users as urb', 'urb.id', '=', 'appointments.refered_by')
							->select('appointments.*','urt.email as urtemail','urb.email as urbemail')
							->get();
			$info = ['sTitle'=>'Appointments List','edit'=>'edit_appointment','del'=>'delete_appointment', 'pTitle'=>'Appointments List','cdata'=> $dataarr,'appoints'=>$appoints];
			//dd($info);
			return view('admin/appointments_list')->with('info', $info);
			}
		public function EditAppointment($id){
			$dataarr= $this->data();
			$appoint=  DB::table('appointments')
							->leftjoin('users as urt', 'urt.id', '=', 'appointments.refered_to')
							->leftjoin('users as urb', 'urb.id', '=', 'appointments.refered_by')
							->select('appointments.*','urt.email as urtemail','urb.email as urbemail')
							->where('appointments.id','=',$id)
							->first();
							//->get();
			//dd($appoint);
			$info = ['eTitle'=>'Edit Appointment','upBtnTxt'=>'Update Record', 'appoint'=>$appoint, 'cdata'=> $dataarr ];
			return view('admin/appointment_edit')->with('info', $info);
		}
		public function UpdateAppointment(Request $req){
		$dataarr= $this->data();
		$appoint= nep_appointments::Find($req->id);
		$appoint->Fill([
			'descryption' => $req->descrip,
			'status' => $req->status,
		]);
		//dd($court);
		$appoint->save();
		$info = ['cdata' => $dataarr];
    	return redirect()->route('Adminiscontroller/ListAppointments');
	}
		public function DA($id){
			$dataarr= $this->data();
			nep_appointments::Destroy($id);
			$info=['cdata' => $dataarr];
			return redirect()->route('Adminiscontroller/ListAppointments')->with('info',$info);
		}
		public function ListQuickConsultations(){
			$dataarr= $this->data();
			$quickconsultations = DB::table('quickconsultations')
							->leftjoin('cities', 'cities.id', '=', 'quickconsultations.city_id')
							->leftjoin('expertises', 'expertises.id', '=', 'quickconsultations.expertise_id')
							->select('quickconsultations.*','cities.city_name as cityname','expertises.expertise_name as expertisename')
							->get();
			$info = ['sTitle'=>'Quick Consultations List','pTitle'=>'Quick Consultations List','edit'=>'edit_quickconsultation','del'=>'delete_quickconsultation','cdata'=> $dataarr,'quickconsultations'=>$quickconsultations];
			//dd($info);
			return view('admin/quickconsultations_list')->with('info', $info);
			}
		public function EditQuickConsultation($id){
			$dataarr= $this->data();
			$quickconsultation = DB::table('quickconsultations')
							->leftjoin('cities', 'cities.id', '=', 'quickconsultations.city_id')
							->leftjoin('expertises', 'expertises.id', '=', 'quickconsultations.expertise_id')
							->select('quickconsultations.*','cities.city_name as cityname','expertises.expertise_name as expertisename')
							->where('quickconsultations.id','=',$id)
							->first();
							//->get();
			//dd($appoint);
			$info = ['eTitle'=>'Edit Quick Consultation','upBtnTxt'=>'Update Record', 'quickconsultation'=>$quickconsultation, 'cdata'=> $dataarr ];
			return view('admin/quickconsultation_edit')->with('info', $info);
		}
		public function UpdateQuickConsultation(Request $req){
		$dataarr= $this->data();
		$qc= nep_quickconsultations::Find($req->id);
		$qc->Fill([
			'descryption' => $req->descrip,
			'status' => $req->status,
		]);
		//dd($court);
		$qc->save();
		$info = ['cdata' => $dataarr];
    	return redirect()->route('Adminiscontroller/ListQuickConsultations');
	}
		public function DQC($id){
			$dataarr= $this->data();
			nep_quickconsultations::Destroy($id);
			$info=['cdata' => $dataarr];
			return redirect()->route('Adminiscontroller/ListQuickConsultations')->with('info',$info);
		}
		public function LRC(){
			$dataarr= $this->data();
			$appoints = DB::table('ratings_comments')
							->leftjoin('users as urt', 'urt.id', '=', 'ratings_comments.rated_id')
							->leftjoin('users as urb', 'urb.id', '=', 'ratings_comments.rateing_id')
							->select('ratings_comments.*','urt.email as urtemail','urb.email as urbemail')
							->get();
			//dd($appoints);
			$info = ['sTitle'=>'Rating Comments List','approve'=>'ApproveRatingComment','disable'=>'DisableRatingComment', 'pTitle'=>'Rating Comments List','cdata'=> $dataarr,'appoints'=>$appoints];
			//dd($info);
			return view('admin/rating_comments_list')->with('info', $info);
			}
		public function RatingCommentEnable(Request $req){
				$rc= nep_ratings_comments::Find($req->id);
				$rc->Fill([
					'status' => '1',
				]);
				$rc->save();
				return redirect()->route('Adminiscontroller/ListRatingComments');
			}
		public function RatingCommentDisable(Request $req){
				$rc= nep_ratings_comments::Find($req->id);
				$rc->Fill([
					'status' => '0',
				]);
				$rc->save();
				return redirect()->route('Adminiscontroller/ListRatingComments');
		}
		public function LCP(){
			$cliamprofiles = DB::table('claimprofile')
							->leftjoin('users as urb', 'urb.id', '=', 'claimprofile.user_id')
							->select('claimprofile.*','urb.email as claimedemail','claimprofile.email as orgemail','urb.image_path','urb.first_name','urb.role')
							->get();
			$dataarr= $this->data();
			$info = ['sTitle'=>'List Claim Profiles','pending'=>'Pending','disable'=>'Disable','delete'=>'Delete','block'=>'Block', 'pTitle'=>'List Claim Profiles','cdata'=> $dataarr,'cliamprofiles'=>$cliamprofiles];
			//dd($info);
			return view('admin/claim_accounts_list')->with('info', $info);
		}
		public function ClaimAccountApprove(Request $req){
				$noti= nep_claimprofile::Find($req->id);
				$noti->Fill([
					'status' => 'approve',
				]);
				$noti->save();
				return redirect()->route('Adminiscontroller/ListClaimProfiles');
			}
		public function ClaimAccountPending(Request $req){
				$noti= nep_claimprofile::Find($req->id);
				$noti->Fill([
					'status' => 'pending',
				]);
				$noti->save();
				return redirect()->route('Adminiscontroller/ListClaimProfiles');
			}
		public function ClaimAccountDisable(Request $req){
				$noti= nep_claimprofile::Find($req->id);
				$noti->Fill([
					'status' => 'disable',
				]);
				$noti->save();
				return redirect()->route('Adminiscontroller/ListClaimProfiles');
			}
		public function ClaimAccountBlock(Request $req){
				$noti= nep_notifications::Find($req->id);
				$noti->Fill([
					'status' => 'block',
				]);
				$noti->save();
				return redirect()->route('Adminiscontroller/ListClaimProfiles');
			}
}
