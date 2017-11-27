@extends('public.master')
@section('title','Quick Consult')
@section('content')

  	<!--Quick Header Start-->
	<!--<section id="quickheader">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 btn-group bootstrap-select dropup">
					<div class="finder-caption">
						<h1>Your legal advisor is just a phone call away.</h1>
						<span class="quick-subheading">Book a Quick Consult @ Rs.299 (all inclusive)</span>
						<span class="quick-text">Get 15 minutes of expert legal advice</span>
					</div>
				</div>
			</div>
		</div>
	</section>-->
	<!-- <section id="quickheader"> -->
<!--		<img src="images/consult-bg.jpg" alt="Consult Image Background">-->		
<!-- 		<div class="container">
			<div class="row">
				<div class="col-lg-10 btn-group bootstrap-select dropup">
					<div class="finder-caption">
						<h1>Your legal advisor is just a phone call away.</h1>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-10">
					<span class="quick-subheading">Book a Quick Consult @ Rs.299 (all inclusive)</span>
					<span class="quick-text">Get 15 minutes of expert legal advice</span>
				</div>
			</div>
		</div>
	</section> -->
	<section class="divider">
      
	    <div class="heading-line-bottom pb-15 mt-0 mb-30 mt-20 col-sm-12">
            <h3 class="heading-title text-center" style="color:#F55E45;">Quick Consult</h3>
        </div>
  

 		<div class="container">
			<div class="row">
				<div class="col-lg-10 btn-group bootstrap-select dropup">
					<div class="finder-caption">
						<h1>Your legal advisor is just a phone call away.</h1>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-10">
					<span class="quick-subheading">Book a Quick Consult @ Rs.299 (all inclusive)</span>
					<span class="quick-text">Get 15 minutes of expert legal advice</span>
				</div>
			</div>
		</div>

    </section>    

	<!--Quick Header End-->
	<!--step section start-->
	<section id="stepcount" >
		<div class="container ccontainer">
			<h2 class="ch2"> How NepalLawyer QuickConsult Works</h2>
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-5 col-xs-12 ct">
					<span class="counter active"><i class="pe-7s-map-marker b"></i></span>
					<span class="counter-text active"><b>Select your city and legal topic</b></span>
				</div>
				<div class="col-lg-1 col-md-1 hidden-sm hidden-xs dt ct">
					<i class="pe-7s-angle-right dts cfs"></i>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 ct">
					<span class="counter active"><i class="pe-7s-mail b"></i></span>
					<span class="counter-text active"><b>Pay the fee of Rs.299 online</b></span>
				</div>
				<div class="col-lg-1 col-md-1 hidden-sm hidden-xs dt ct">
					<i class="pe-7s-angle-right dts cfs"></i>
				</div>
				<div class="col-lg-4 col-md-3 col-sm-6 col-xs-12 ct">
					<span class="counter active"><i class="pe-7s-cash b"></i></span>
					<span class="counter-text active"><b>Talk to a top-rated lawyer within minutes (9am to 9pm Mon to Sat)</b></span>
				</div>
			</div>
		</div>
	</section>
	<!--step section end-->
	<!--problem section start-->
	<section id="email-section">
		<div class="container">
			<div class="row">
				<!--<form id="quick_contact_form_pay" class="quick_contact_form_pay" method="post" action="paypal.html">-->
					{!! Form::open(['route'=>'quick.consultform', 'method'=>'post', 'id'=>'quick_contact_form_pay', 'class'=>'form-quick_contact_form_pay']) !!}
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<label>Name</label><span>*</span>
						<input class="form-control" type="text" name="name" placeholder="Name" required>
						<label>Email</label><span>*</span>
						<input class="form-control" type="email" name="email" placeholder="Email" required>
						<label>Contact Number</label><span>*</span>
						<input class="form-control" type="text" name="phonenumber" placeholder="Contact Number" required>
						<label>City</label><span>*</span>
						<select name="city" class="selectpicker  form-control btnSize" data-live-search="true" required>
						   <option value="">Please Select City</option>
							@foreach($cities as $city)  
							   <option value="{{ $city->id }}">{{ $city->city_name }}</option>
							@endforeach 
						 </select>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<label>Legal Area</label><span>*</span>
						<select name="area" class="selectpicker  form-control btnSize" data-live-search="true">
						   <option value=""> Please Select Legal Area</option>
							@foreach( $expertises as $exp)  
							   <option value="{{ $exp->id }}">{{ $exp->expertise_name }}</option>
							@endforeach 
						 </select>
						<label>Question</label><span>*</span>
						<textarea name="form_message" class="form-control" placeholder="Ask A Question" rows="8" required></textarea>
					</div>
					<div class="col-lg-12 email-btn">
						<input class="btn btn-info" type="submit" value="Submit">
					</div>
					 {!! Form::close() !!}
				<!--</form>-->
			</div>
		</div>
	</section>
	<!--problem section end-->
	<!-- client reviews start-->
		<section id="testimonial-sec" class="testimonial-sec">
		<div class="container ccontainer">
			<div class="row">
			  <div class="col-md-12 title-center">
				<h2>What are others saying about NepalLawyer <i>Quick</i>Consult</h2>
			  </div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 tp-testimonial">
					  <p>The case manager at NepalLawyer called me within 1 minute of my booking the consultation and I was talking to a really well experienced Divorce lawyer within the next few minutes. Easy, Quick and Reliable – I would recommend NepalLawyer <i>Quick</i>Consult to everyone looking for a quick solid legal advice!</p>
					 <div class="couple-info">
						<div class="name">- Rajesh M, consulted for NRI Divorce matter in Pune</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 tp-testimonial">
					  <p>I feel so grateful having spoken to a great criminal defence lawyer in Mumbai. Really proves that no 2 lawyers are the same! I would certainly recommend NepalLawyer <i>Quick</i>Consult to all my family and friends. Thank you.</p>
					 <div class="couple-info">
						<div class="name">- Prakash K, consulted for Criminal matter in Mumbai</div>
					</div>		          
				  </div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 tp-testimonial">
					  <p>I was really surprised by how fast the case manager at NepalLawyer was able to understand my problem and put me in touch with a great property lawyer immediately. I was about to sign a property document and am glad I consulted through NepalLawyer <i>Quick</i>Consult before making any mistakes.</p>
					 <div class="couple-info">
					  <div class="name">- Anu S, consulted for Property matter in Delhi</div>
					</div>		          
				  </div>
			</div>
    	</div>
	</section>

@endsection