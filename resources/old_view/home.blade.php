@extends('public.master')
@section('title','Home')

@section('content')

{{-- Main contant start --}}

    <div class="body">

			<div role="main" class="main">
		
				<div class="slider-container rev_slider_wrapper" style="height: 650px;">
					<div id="revolutionSlider" class="slider rev_slider manual">
						<ul>
							<li data-transition="fade" data-title="Advocate Team" data-thumb="images/slide1.jpg">

								<img src="{{ URL::to('public/images/slide1.jpg') }} "  
									alt=""
									data-bgposition="center center" 
									data-bgfit="cover" 
									data-bgrepeat="no-repeat"
									class="rev-slidebg">

								<div class="tp-caption top-label"
									data-x="right" data-hoffset="100"
									data-y="center" data-voffset="-95"
									data-start="1000"
									style="z-index: 5"
									data-transform_in="y:[-300%];opacity:0;s:500;">YOUR TRUSTED</div>

								<div class="tp-caption main-label"
									data-x="right" data-hoffset="100"
									data-y="center" data-voffset="-45"
									data-start="1500"
									data-whitespace="nowrap"						 
									data-transform_in="y:[100%];s:500;"
									data-transform_out="opacity:0;s:500;"
									style="z-index: 5"
									data-mask_in="x:0px;y:0px;">ADVOCATE TEAM</div>

								<div class="tp-caption bottom-label"
									data-x="right" data-hoffset="100"
									data-y="center" data-voffset="5"
									data-start="2000"
									style="z-index: 5"
									data-transform_in="y:[100%];opacity:0;s:500;">Consult With Our Experienced Team for Solutions.</div>

								<a class="tp-caption btn btn-primary btn-lg"
									data-hash
									data-hash-offset="85"
									href="#home-intro"
									data-x="right" data-hoffset="100"
									data-y="center" data-voffset="80"
									data-start="2500"
									data-whitespace="nowrap"						 
									data-transform_in="y:[100%];s:500;"
									data-transform_out="opacity:0;s:500;"
									style="z-index: 5"
									data-mask_in="x:0px;y:0px;">Request a Free Consultation</a>
								
							</li>
							<li data-transition="fade" data-title="Practice Areas" data-thumb="images/slide2.jpg">

								<img src="{{ URL::to('public/images/slide2.jpg') }} "  
									alt=""
									data-bgposition="center center" 
									data-bgfit="cover" 
									data-bgrepeat="no-repeat" 
									class="rev-slidebg">

								<div class="tp-caption main-label"
									data-x="right" data-hoffset="100"
									data-y="center" data-voffset="-205"
									data-start="1000"
									style="z-index: 5; font-size: 40px;"
									data-transform_in="y:[-300%];opacity:0;s:500;">PRACTICE AREAS</div>

								<div class="tp-caption tp-caption-overlay-opacity bottom-label"
									data-x="right" data-hoffset="100"
									data-y="center" data-voffset="-145"
									data-start="1500"
									data-transform_in="x:[-100%];opacity:0;s:500;"><i class="fa fa-check"></i> Criminal Law</div>

								<div class="tp-caption tp-caption-overlay-opacity bottom-label"
									data-x="right" data-hoffset="100"
									data-y="center" data-voffset="-100"
									data-start="1800"
									data-transform_in="x:[-100%];opacity:0;s:500;"><i class="fa fa-check"></i> Business Law</div>

								<div class="tp-caption tp-caption-overlay-opacity bottom-label"
									data-x="right" data-hoffset="100"
									data-y="center" data-voffset="-55"
									data-start="2100"
									data-transform_in="x:[-100%];opacity:0;s:500;"><i class="fa fa-check"></i> Health Law</div>

								<div class="tp-caption tp-caption-overlay-opacity bottom-label"
									data-x="right" data-hoffset="100"
									data-y="center" data-voffset="-10"
									data-start="2400"
									data-transform_in="x:[-100%];opacity:0;s:500;"><i class="fa fa-check"></i> Divorce Law</div>

								<div class="tp-caption tp-caption-overlay-opacity bottom-label"
									data-x="right" data-hoffset="100"
									data-y="center" data-voffset="35"
									data-start="2700"
									data-transform_in="x:[-100%];opacity:0;s:500;"><i class="fa fa-check"></i> Capital Law</div>

								<div class="tp-caption tp-caption-overlay-opacity bottom-label"
									data-x="right" data-hoffset="100"
									data-y="center" data-voffset="80"
									data-start="3000"
									data-transform_in="x:[-100%];opacity:0;s:500;"><i class="fa fa-check"></i> Accident Law</div>

								<a class="tp-caption btn btn-primary btn-lg"
									data-hash
									data-hash-offset="85"
									href="#practice-areas"
									data-x="right" data-hoffset="100"
									data-y="center" data-voffset="150"
									data-start="3500"
									data-whitespace="nowrap"						 
									data-transform_in="y:[100%];s:500;"
									data-transform_out="opacity:0;s:500;"
									style="z-index: 5"
									data-mask_in="x:0px;y:0px;">Learn More <i class="fa fa-long-arrow-right"></i></a>

							</li>
							<li data-transition="fade" data-title="Contact Us" data-thumb="images/slide3.jpg">

								<img src="{{ URL::to('public/images/slide3.jpg') }} "  
									alt=""
									data-bgposition="center center" 
									data-bgfit="cover" 
									data-bgrepeat="no-repeat" 
									class="rev-slidebg">

								<div class="tp-caption top-label"
									data-x="left" data-hoffset="100"
									data-y="center" data-voffset="-95"
									data-start="1000"
									style="z-index: 5"
									data-transform_in="y:[-300%];opacity:0;s:500;">We guide you through</div>

								<div class="tp-caption main-label"
									data-x="left" data-hoffset="100"
									data-y="center" data-voffset="-45"
									data-start="1500"
									data-whitespace="nowrap"						 
									data-transform_in="y:[100%];s:500;"
									data-transform_out="opacity:0;s:500;"
									style="z-index: 5"
									data-mask_in="x:0px;y:0px;">Bankrupcy Problems</div>

								<div class="tp-caption bottom-label"
									data-x="left" data-hoffset="100"
									data-y="center" data-voffset="5"
									data-start="2000"
									style="z-index: 5"
									data-transform_in="y:[100%];opacity:0;s:500;">ith over 35 years of Law practice in Courts</div>

								<a class="tp-caption btn btn-primary btn-lg"
									href="demo-law-firm-contact-us.html"
									data-x="left" data-hoffset="100"
									data-y="center" data-voffset="80"
									data-start="2500"
									data-whitespace="nowrap"						 
									data-transform_in="y:[100%];s:500;"
									data-transform_out="opacity:0;s:500;"
									style="z-index: 5"
									data-mask_in="x:0px;y:0px;">Contact Us</a>

							</li>
						</ul>
					</div>
				</div>


				<div class="container">
<div class="featured-boxes featured-boxes-style-3 featured-boxes-flat">
						<div class="row">
							<div class="col-md-3 col-sm-6">
								<div class="featured-box featured-box-quaternary featured-box-effect-3">
									<div class="box-content">
										<i class="icon-featured fa fa-anchor"></i>
										<h4>BANKRUPCY</h4>
										<p>Representation in civil litigation cases.</p>
									</div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="featured-box featured-box-quaternary featured-box-effect-3">
									<div class="box-content">
										<i class="icon-featured fa fa-car"></i>
										<h4>TRAFFIC TIKETS</h4>
										<p>Representation in civil litigation cases.</p>
									</div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="featured-box featured-box-quaternary featured-box-effect-3">
									<div class="box-content">
										<i class="icon-featured fa fa-balance-scale"></i>
										<h4>PERSONAL INJURY</h4>
										<p>Representation in civil litigation cases.</p>
									</div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="featured-box featured-box-quaternary featured-box-effect-3">
									<div class="box-content">
										<i class="icon-featured fa fa-home"></i>
										<h4>ESTATE PLANNING</h4>
										<p>Representation in civil litigation cases. </p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			<div class="container">
			<div class="col-md-12 center">
							<h2 class="mt-xl mb-none">Toughest Defense Lawyers for Your Money</h2>
							<div class="divider divider-primary divider-small divider-small-center mb-xl">
								<hr>
							</div>
						</div>

<div class="row mt-xlg">

										<div class="col-md-3">
											<h5 class="text-uppercase mt-lg">IN THE COURT OF LAW</h5>
											<a href="#">
												<span class="thumb-info">
													<span class="thumb-info-wrapper">
														<img src="{{ URL::to('public/images/banner1.jpg') }} " class="img-responsive" alt="">
														<span class="thumb-info-title">
															<span class="thumb-info-inner">Criminal Law</span>
															<span class="thumb-info-type">FIND OUT MORE </span>
														</span>
														<span class="thumb-info-action">
															<span class="thumb-info-action-icon"><i class="fa fa-flag-o"></i></span>
														</span>
													</span>
												</span>
											</a>
										</div>
										<div class="col-md-3">
											<h5 class="text-uppercase mt-lg">MEDICAL NEGLIGENCE</h5>
											<a href="">
												<span class="thumb-info">
													<span class="thumb-info-wrapper">
														<img src="{{ URL::to('public/images/banner2.jpg') }} " class="img-responsive" alt="">
														<span class="thumb-info-title">
															<span class="thumb-info-inner">Medical Malpractice</span>
															<span class="thumb-info-type">FIND OUT MORE </span>
														</span>
														<span class="thumb-info-action">
															<span class="thumb-info-action-icon"><i class="fa fa-bolt"></i></span>
														</span>
													</span>
												</span>
											</a>
										</div>
										<div class="col-md-3">
											<h5 class="text-uppercase mt-lg">FAMILY LAW</h5>
											<a href="">
												<span class="thumb-info">
													<span class="thumb-info-wrapper">
														<img src="{{ URL::to('public/images/banner3.jpg') }} " class="img-responsive" alt="">
														<span class="thumb-info-title">
															<span class="thumb-info-inner">Insurance Law</span>
															<span class="thumb-info-type">FIND OUT MORE </span>
														</span>
														<span class="thumb-info-action">
															<span class="thumb-info-action-icon"><i class="fa fa-headphones"></i></span>
														</span>
													</span>
												</span>
											</a>
										</div>
										<div class="col-md-3">
											<h5 class="text-uppercase mt-lg">STOP A FORECLOSURE</h5>
											<a href="">
												<span class="thumb-info">
													<span class="thumb-info-wrapper">
														<img src="{{ URL::to('public/images/banner4.jpg') }} " class="img-responsive" alt="">
														<span class="thumb-info-title">
															<span class="thumb-info-inner">Real Estate Law</span>
															<span class="thumb-info-type">FIND OUT MORE </span>
														</span>
														<span class="thumb-info-action">
															<span class="thumb-info-action-icon"><i class="fa fa-lock"></i></span>
														</span>
													</span>
												</span>
											</a>
										</div>
										</div>

</div>





				

				<div class="container-fluid">
					<div class="row">
					
							
									
<div class="col-md-6 p-none">
							<section class="section section-primary match-height mt-xl" style="background-image: url(/public/images/holder1.jpg);">
			
								<div class="counters counters-text-light">
								
									<div class="counter mb-lg mt-lg">
										<i class="fa fa-usd icons"></i>
										<strong data-to="325000">0</strong>
										<label class="padd">RECOVERED FOR OUR CLIENTS THIS YEAR</label>
										<p class="font-size-md padd2">Sometimes you may find yourself in difficult situations and not be able to defuse the situation without going to court.</p>
										<button class="btn btn-primary mb-xl padd"> Contact Us</button>
									</div>
								</div>
</section>
									</div>
								
					
<div class="col-md-6 p-none">
							<section class="section section-primary match-height mt-xl" style="background-image: url(/public/images/holder2.jpg);">
								
									<div class="counters counters-text-light">
								
									<div class="counter mb-lg mt-lg">
										<i class="fa fa-usd  icons"></i>
										<strong data-to="125000">0</strong>
										<label class="padd" >RECOVERED BAIL EXPENSES THIS YEAR</label>
										
										<p class="font-size-md padd2">Sometimes you may find yourself in difficult situations and not be able to defuse the situation without going to court.</p>
										<button class="btn btn-primary mb-xl padd"> Contact Us</button>
									</div>
								</div>
</section>
									</div>
								</div>
							
						</div>

			


					<div class="container">
						<div class="row">
							<div class="col-md-12 center">
								<h2 class="mt-xl mb-none">Attorneys</h2>
								<div class="divider divider-primary divider-small divider-small-center mb-xl">
									<hr>
								</div>
							</div>
						</div>
						<div class="row mt-lg">
							<div class="owl-carousel owl-theme owl-team-custom show-nav-title" data-plugin-options="{'items': 4, 'margin': 10, 'loop': false, 'nav': true, 'dots': false}">
								<div class="center mb-lg">
									<a href="">
										<img src="{{ URL::to('public/images/team1.jpg') }} " class="img-responsive" alt="">
									</a>
									<h4 class="mt-md mb-none">THOMAS MCCLAIN</h4>
									<p class="mb-none">Criminal Law</p>
									
										
									
								</div>
								<div class="center mb-lg">
									<a href="">
										<img src="{{ URL::to('public/images/team2.jpg') }} " class="img-responsive" alt="">
									</a>
									<h4 class="mt-md mb-none">ROSE JOHNSON</h4>
									<p class="mb-none">Business Law</p>
									
								</div>
								<div class="center mb-lg">
									<a href="">
										<img src="{{ URL::to('public/images/team3.jpg') }} " class="img-responsive" alt="">
									</a>
									<h4 class="mt-md mb-none">SIMON ROBINS</h4>
									<p class="mb-none">Divorce Law</p>
									
								</div>
								<div class="center mb-lg">
									<a href="">
										<img src="{{ URL::to('public/images/team4.jpg') }} " class="img-responsive" alt="">
									</a>
									<h4 class="mt-md mb-none">NELSON CONROY</h4>
									<p class="mb-none">Accident Law</p>
									
								</div>
								
								
							</div>
						</div>
					</div>

				</div>
				
				<div class="owl-carousel owl-theme mb-none" data-plugin-options="{'items': 1}">
					<div class="row">
						<div class="col-md-6 p-none">
							<section class="section section-primary pl-lg pr-lg match-height" style="background-color: #212736 !important; border-color:#212736 !important;">
							
								<div class="row">
								
									<div class="col-md-12" style="margin-left: 10px;">
										<h2 class="mb-none"><strong>Banking and Finance</strong></h2>
										
										<p class="mb-none text-light mtb">Maybe it won’t get that far, but those who care about these international law disputes think China and the U.S. are on a collision course because both sides hew closely to contradictory readings of international law.</p>
										<button class="btn btn-primary mb-xl mtb"> Contact Us</button>
									</div>
</div>

								
							</section>
						</div>
						<div class="col-md-6 p-none">
							<section class="parallax section section-parallax match-height" data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="{{ URL::to('/public/images/mslide1.jpg') }}">
							</section>
						</div>




					</div>

					<div class="row">
						<div class="col-md-6 p-none">
							<section class="section section-primary pl-lg pr-lg match-height" style="background-color: #212736 !important; border-color:#212736 !important; ">
								<div class="row">
								
									<div class="col-md-12" style="margin-left: 10px;">
										<h2 class="mb-none"><strong>Corporate Lawsuits</strong></h2>
										
										<p class="mb-none text-light mtb">Maybe it won’t get that far, but those who care about these international law disputes think China and the U.S. are on a collision course because both sides hew closely to contradictory readings of international law.</p>
										<button class="btn btn-primary mb-xl mtb"> Contact Us</button>
									</div>

								</div>
							</section>
						</div>
						<div class="col-md-6 p-none">
							<section class="parallax section section-parallax match-height" data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="{{ URL::to('/public/images/mslide2.jpg') }}">
							</section>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 p-none">
							<section class="section section-primary pl-lg pr-lg match-height" style="background-color: #212736 !important; border-color:#212736 !important;">
								<div class="row">
								
									<div class="col-md-12" style="margin-left: 10px;">
										<h2 class="mb-none"><strong>20 years of experience in various malpractice cases</strong></h2>
										
										<p class="mb-none text-light mtb">Maybe it won’t get that far, but those who care about these international law disputes think China and the U.S. are on a collision course because both sides hew closely to contradictory readings of international law.</p>
										<button class="btn btn-primary mb-xl mtb"> Contact Us</button>
									</div>

								</div>
							</section>
						</div>
						<div class="col-md-6 p-none">
							<section class="parallax section section-parallax match-height" data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="{{ URL::to('/public/images/mslide3.jpg') }} ">
							</section>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 p-none">
							<section class="section section-primary pl-lg pr-lg match-height" style="background-color: #212736 !important; border-color:#212736 !important;">
								<div class="row">
								
									<div class="col-md-12" style="margin-left: 10px;">
										<h2 class="mb-none"><strong>Intellectual Property</strong></h2>
										
										<p class="mb-none text-light mtb">Maybe it won’t get that far, but those who care about these international law disputes think China and the U.S. are on a collision course because both sides hew closely to contradictory readings of international law.</p>
										<button class="btn btn-primary mb-xl mtb"> Contact Us</button>
									</div>

								</div>
							</section>
						</div>
						<div class="col-md-6 p-none">
							<section class="parallax section section-parallax match-height" data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="{{ URL::to('/public/images/mslide4.jpg') }} ">
							</section>
						</div>
					</div>

					</div>

					
<div class="container">
<div class="col-md-12 center">
								<h2 class="mt-xl mb-none">What Our Clients Say About Our Services</h2>
								<div class="divider divider-primary divider-small divider-small-center mb-xl">
									<hr>
								</div>
							</div>
<div class="row mt-xlg">

<div class="col-md-6">

									
									<div class="embed-responsive embed-responsive-16by9">
										<iframe style="border:0;" allowfullscreen="" src="http://www.youtube.com/embed/oNBBijn4JuY?showinfo=0&amp;wmode=opaque"></iframe>
									</div>
									</div>

						<div class="col-md-6">
						<div class="owl-carousel owl-theme mb-none" data-plugin-options="{'items': 1}">
						<div class="col-md-12">
							<div class="testimonial testimonial-style-4">
								<blockquote>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat.</p>
								</blockquote>
								<div class="testimonial-arrow-down"></div>
								<div class="testimonial-author">
									<div class="testimonial-author-thumbnail">
										<img src="{{ URL::to('public/images/testimonials1.png') }} " class="img-responsive img-circle" alt="">
									</div>
									<p><strong>John Smith</strong><span>CEO & Founder - Okler</span></p>
								</div>
							</div>
						

							<div class="testimonial testimonial-style-4">
								<blockquote>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat.</p>
								</blockquote>
								<div class="testimonial-arrow-down"></div>
								<div class="testimonial-author">
									<div class="testimonial-author-thumbnail">
										<img src="{{ URL::to('public/images/testimonials2.png') }} " class="img-responsive img-circle" alt="">
									</div>
									<p><strong>John Smith</strong><span>CEO & Founder - Okler</span></p>
								</div>
							</div>

						</div>
						<div class="col-md-12">
							<div class="testimonial testimonial-style-4">
								<blockquote>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat.</p>
								</blockquote>
								<div class="testimonial-arrow-down"></div>
								<div class="testimonial-author">
									<div class="testimonial-author-thumbnail">
										<img src="{{ URL::to('public/images/testimonials3.png') }} " class="img-responsive img-circle" alt="">
									</div>
									<p><strong>John Smith</strong><span>CEO & Founder - Okler</span></p>
								</div>
							</div>
						

							<div class="testimonial testimonial-style-4">
								<blockquote>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat.</p>
								</blockquote>
								<div class="testimonial-arrow-down"></div>
								<div class="testimonial-author">
									<div class="testimonial-author-thumbnail">
										<img src="{{ URL::to('public/images/testimonals4.png') }}" class="img-responsive img-circle" alt="">
									</div>
									<p><strong>John Smith</strong><span>CEO & Founder - Okler</span></p>
								</div>
							</div>

						</div>
<div class="col-md-12">
							<div class="testimonial testimonial-style-4">
								<blockquote>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat.</p>
								</blockquote>
								<div class="testimonial-arrow-down"></div>
								<div class="testimonial-author">
									<div class="testimonial-author-thumbnail">
										<img src="{{ URL::to('public/images/testimonials1.png') }} " class="img-responsive img-circle" alt="">
									</div>
									<p><strong>John Smith</strong><span>CEO & Founder - Okler</span></p>
								</div>
							</div>
						

							<div class="testimonial testimonial-style-4">
								<blockquote>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat.</p>
								</blockquote>
								<div class="testimonial-arrow-down"></div>
								<div class="testimonial-author">
									<div class="testimonial-author-thumbnail">
										<img src="{{ URL::to('public/images/testimonials2.png') }} " class="img-responsive img-circle" alt="">
									</div>
									<p><strong>John Smith</strong><span>CEO & Founder - Okler</span></p>
								</div>
							</div>

						</div>


						</div>
						</div>


</div>
</div>


					

					<div class="row">	

						<ul class="portfolio-list lightbox m-none" data-plugin-options="{'delegate': 'a.lightbox-portfolio', 'type': 'image', 'gallery': {'enabled': true}}">
							<li class="col-md-3 col-sm-6 col-xs-12" style="padding-left: 0px; padding-right: 0px;" >
								<div class="portfolio-item">
									<span class="thumb-info thumb-info-lighten thumb-info-centered-icons">
										<span class="thumb-info-wrapper">
											<img src="{{ URL::to('public/images/gallery1.jpg') }} " class="img-responsive" alt="">
											<span class="thumb-info-action">
												<a href="images/gallery1.jpg" class="lightbox-portfolio">
													<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fa fa-search-plus"></i></span>
												</a>
											</span>
										</span>
									</span>
								</div>
							</li>
							<li class="col-md-3 col-sm-6 col-xs-12" style="padding-left: 0px; padding-right: 0px;" >
								<div class="portfolio-item">
									<span class="thumb-info thumb-info-lighten thumb-info-centered-icons">
										<span class="thumb-info-wrapper">
											<img src="{{ URL::to('public/images/gallery2.jpg') }}" class="img-responsive" alt="">
											<span class="thumb-info-action">
												<a href="images/gallery2.jpg" class="lightbox-portfolio">
													<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fa fa-search-plus"></i></span>
												</a>
											</span>
										</span>
									</span>
								</div>
							</li>
							<li class="col-md-3 col-sm-6 col-xs-12" style="padding-left: 0px; padding-right: 0px;" >
								<div class="portfolio-item">
									<span class="thumb-info thumb-info-lighten thumb-info-centered-icons">
										<span class="thumb-info-wrapper">
											<img src="{{ URL::to('public/images/gallery3.jpg') }}" class="img-responsive" alt="">
											<span class="thumb-info-action">
												<a href="images/gallery3.jpg" class="lightbox-portfolio">
													<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fa fa-search-plus"></i></span>
												</a>
											</span>
										</span>
									</span>
								</div>
							</li>
							<li class="col-md-3 col-sm-6 col-xs-12" style="padding-left: 0px; padding-right: 0px;" >
								<div class="portfolio-item">
									<span class="thumb-info thumb-info-lighten thumb-info-centered-icons">
										<span class="thumb-info-wrapper">
											<img src="{{ URL::to('public/images/gallery4.jpg') }}" class="img-responsive" alt="">
											<span class="thumb-info-action">
												<a href="images/gallery4.jpg" class="lightbox-portfolio">
													<span class="thumb-info-action-icon thumb-info-action-icon-light"><i class="fa fa-search-plus"></i></span>
												</a>
											</span>
										</span>
									</span>
								</div>
							</li>
						</ul>
					</div>


<div class="container">
<div class="col-md-12 center"><h2>Toughest Defense Lawyers with Best Results</h2>
								<div class="divider divider-primary divider-small divider-small-center mb-xl">
									<hr>
								</div>
							</div>
<div class="row">
						<div class="pricing-table">
							<div class="col-md-3 col-sm-6">
								<div class="plan most-popular">
									<h3>IMMIGRATION<br> LAW<span><i class="fa fa-trophy"></i></span></h3>
									
									<ul>
										<li> CRIMINAL DEFENSE</li>
										<li> FAMILY DISPUTES</li>
										<li> BROKER FRAUD</li>
										<li> DOMESTIC VIOLENCE</li>
										<li> MEDICAL MALPRACTICE</li>
										<li> INTELLECTUAL PROPERTY</li>
									</ul>
									<a class="btn btn-lg btn-primary" href="#">SEE SUCCESS RATES </a>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="plan most-popular">
									
									<h3>BANKING & <br>FINANCE<span><i class="fa fa-graduation-cap"></i></span></h3>
									
									<ul>
										<li> CRIMINAL DEFENSE</li>
										<li> FAMILY DISPUTES</li>
										<li> BROKER FRAUD</li>
										<li> DOMESTIC VIOLENCE</li>
										<li> MEDICAL MALPRACTICE</li>
										<li> INTELLECTUAL PROPERTY</li>
									</ul>
									<a class="btn btn-lg btn-primary" href="#">SEE SUCCESS RATES </a>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="plan most-popular">
									<h3>EMPLOYMENT<br> LAW<span><i class="fa fa-gift"></i></span></h3>

									<ul>
										<li> CRIMINAL DEFENSE</li>
										<li> FAMILY DISPUTES</li>
										<li> BROKER FRAUD</li>
										<li> DOMESTIC VIOLENCE</li>
										<li> MEDICAL MALPRACTICE</li>
										<li> INTELLECTUAL PROPERTY</li>
									</ul>
									<a class="btn btn-lg btn-primary" href="#">SEE SUCCESS RATES </a>
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="plan most-popular">
									<h3>FORECLOSURE<br> DEFENSE<span><i class="fa fa-users"></i></span></h3>
									
									<ul>
										<li> CRIMINAL DEFENSE</li>
										<li> FAMILY DISPUTES</li>
										<li> BROKER FRAUD</li>
										<li> DOMESTIC VIOLENCE</li>
										<li> MEDICAL MALPRACTICE</li>
										<li> INTELLECTUAL PROPERTY</li>
									</ul>
									<a class="btn btn-lg btn-primary" href="#">SEE SUCCESS RATES </a>
								</div>
							</div>
						</div>

					</div>
</div>

<section class="video section section-text-light section-video section-center" data-video-path="video/dark" data-plugin-video-background data-plugin-options="{'posterType': 'jpg', 'position': '50% 50%', 'overlay': true}">
					<div class="container">
					<div class="row">
						<div class="col-md-12 center">
							<h2 class="mt-xl mb-none">Read our expertly written blog or follow us on social media</h2>
							<div class="divider divider-primary divider-small divider-small-center mb-xl">
								<hr>
							</div>
						</div>
					</div>
					<div class="row mt-xl">
						<div class="col-md-6">

							<div class="thumb-info thumb-info-side-image thumb-info-no-zoom mb-xl">
								<span class="thumb-info-side-image-wrapper p-none hidden-xs">
									<a title="" href="#">
										<img src="{{ URL::to('public/images/blog1.jpg') }} " class="img-responsive" alt="" style="width: 195px;">
									</a>
								</span>
								<div class="thumb-info-caption">
									<div class="thumb-info-caption-text">
										<h2 class="mb-md mt-xs"><a title="" class="text-dark" href="#">Award of Honor</a></h2>
										<span class="post-meta">
											<span>January 10, 2017 | <a href="#">John Doe</a></span>
										</span>
										<p class="font-size-md">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eu pulvinar magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
										<a class="mt-md" href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
									</div>
								</div>
							</div>

						</div>
						<div class="col-md-6">

							<div class="thumb-info thumb-info-side-image thumb-info-no-zoom mb-xl">
								<span class="thumb-info-side-image-wrapper p-none hidden-xs">
									<a title="" href="#">
										<img src="{{ URL::to('public/images/blog2.jpg') }} " class="img-responsive" alt="" style="width: 195px;">
									</a>
								</span>
								<div class="thumb-info-caption">
									<div class="thumb-info-caption-text">
										<h2 class="mb-md mt-xs"><a title="" class="text-dark" href="#">The Best Lawyer</a></h2>
										<span class="post-meta">
											<span>January 10, 2017 | <a href="#">John Doe</a></span>
										</span>
										<p class="font-size-md">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eu pulvinar magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
										<a class="mt-md" href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

				</section>

				


				<section class="section section-background section-footer" style="background-image: url(/public/images/back.jpg); background-position: 50% 100%;">
					<div class="container">
						<div class="row">
							<div class="col-md-6 col-md-offset-6">
								<h2 class="mt-xl mb-none">Request a Free Consultation</h2>
								<p>Consult with our experienced team for complete solutions to your legal issues.</p>
								<div class="divider divider-primary divider-small mb-xl">
									<hr>
								</div>
								<form id="contactForm" action="php/contact-form.php" method="POST">
									<div class="row">
										<div class="form-group">
											<div class="col-sm-6">
												<input type="text" value="" placeholder="Your name" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name" required>
											</div>
											<div class="col-sm-6">
												<input type="email" value="" placeholder="Your email address *" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<div class="col-md-12">
												<input type="text" value="" placeholder="Subject" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="subject" id="subject" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<div class="col-md-12">
												<textarea maxlength="5000" placeholder="Message *" data-msg-required="Please enter your message." rows="3" class="form-control" name="message" id="message" required></textarea>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<input type="submit" value="Send Message" class="btn btn-primary mb-xl" data-loading-text="Loading...">

											<div class="alert alert-success hidden" id="contactSuccess">
												Message has been sent to us.
											</div>

											<div class="alert alert-danger hidden" id="contactError">
												Error sending your message.
											</div>
										</div>
									</div>
								</form>

							</div>
						</div>
					</div>
				</section>
				
				</div>

{{-- Main contant ends --}}

@stop


@push('css')
	 <!-- Favicon -->
        <link rel="shortcut icon" href="" type="image/x-icon" />
        <link rel="apple-touch-icon" href="">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Web Fonts  -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Icons">

		<link href="{{ URL::to('public/style.css" rel="stylesheet" type="text/css') }} ">
    
   		<link rel="stylesheet" type="text/css" href="{{ URL::to('public/css/semantic.min.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('public/vendor/bootstrap/css/bootstrap.min.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('public/vendor/font-awesome/css/font-awesome.min.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('public/vendor/animate/animate.min.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('public/vendor/simple-line-icons/css/simple-line-icons.min.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('public/vendor/owl.carousel/assets/owl.carousel.min.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('public/vendor/owl.carousel/assets/owl.theme.default.min.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('public/vendor/magnific-popup/magnific-popup.min.css') }} ">

        <!-- Theme CSS -->
        <link rel="stylesheet" href="{{ URL::to('public/css/theme.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('public/css/theme-elements.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('public/css/theme-blog.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('public/css/theme-shop.css') }} ">

        <!-- Current Page CSS -->
        <link rel="stylesheet" href="{{ URL::to('public/vendor/rs-plugin/css/settings.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('public/vendor/rs-plugin/css/layers.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('public/vendor/rs-plugin/css/navigation.css') }} ">

        <!-- Skin CSS -->
        <link rel="stylesheet" href="{{ URL::to('public/css/skins/skin-law-firm.css') }} "> 

        <!-- Demo CSS -->
        <link rel="stylesheet" href="{{ URL::to('public/css/demos/demo-law-firm.css') }} ">

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="{{ URL::to('public/css/custom.css') }} ">

		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css') }} ">
<!-- /********************/ for date picker jquery -->

		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css') }} ">

@endpush

@push('js1')

	
<!-- /********************/  -->
        <!-- Head Libs -->
    <script type="text/javascript" src="{{ URL::to('public/js/jqueryform.js') }} "></script>
    <script src="{{ URL::to('public/vendor/modernizr/modernizr.min.js') }} "></script>

<!-- /********************/ for date picker jquery -->
	

<!-- /********************/ foor gallery file upload  -->

	<script src="{{ URL::to('public/js/gallery.js') }} "></script>
<!-- /********************/  -->
 <style>

       input[type=file].v {
           color: transparent;
           display: block;

       }

        .imageThumb {
            max-height: 75px;
            border: 2px solid;
            padding: 1px;
            cursor: pointer;
        }
        .pip {
            display: inline-block;
            margin: 10px 10px 0 0;
        }
        .remove {
            display: block;
            background: #353C4E;
            border: 1px solid #353C4E;
            color: white;
            text-align: center;
            cursor: pointer;
        }
        .remove:hover {
            background: #c39341;
            color: #353C4E;
        }

    </style>

@endpush

@push('js')
		<!-- Vendor -->
		<script src="{{ URL::to('public/vendor/jquery/jquery.min.js') }} "></script>
		<script src="{{ URL::to('public/vendor/jquery.appear/jquery.appear.min.js') }} "></script>
		<script src="{{ URL::to('public/vendor/jquery.easing/jquery.easing.min.js') }} "></script>
		<script src="{{ URL::to('public/vendor/jquery-cookie/jquery-cookie.min.js') }} "></script>
		<script src="{{ URL::to('public/vendor/bootstrap/js/bootstrap.min.js') }} "></script>
		<script src="{{ URL::to('public/vendor/common/common.min.js') }} "></script>
		<script src="{{ URL::to('public/vendor/jquery.validation/jquery.validation.min.js') }} "></script>
		<script src="{{ URL::to('public/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js') }} "></script>
		<script src="{{ URL::to('public/vendor/jquery.gmap/jquery.gmap.min.js') }} "></script>
		<script src="{{ URL::to('public/vendor/jquery.lazyload/jquery.lazyload.min.js') }} "></script>
		<script src="{{ URL::to('public/vendor/isotope/jquery.isotope.min.js') }} "></script>
		<script src="{{ URL::to('public/vendor/owl.carousel/owl.carousel.min.js') }} "></script>
		<script src="{{ URL::to('public/vendor/magnific-popup/jquery.magnific-popup.min.js') }} "></script>
		<script src="{{ URL::to('public/vendor/vide/vide.min.js') }} "></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="{{ URL::to('public/js/theme.js') }} "></script>
		
		<!-- Current Page Vendor and Views -->
		<script src="{{ URL::to('public/vendor/rs-plugin/js/jquery.themepunch.tools.min.js') }} "></script>
		<script src="{{ URL::to('public/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js') }} "></script>

		<!-- Current Page Vendor and Views -->
		<script src="{{ URL::to('public/js/views/view.contact.js') }} "></script>

		<!-- Demo -->
		<script src="{{ URL::to('public/js/demos/demo-law-firm.js') }} "></script>	
		
		<!-- Theme Custom -->
		<script src="{{ URL::to('public/js/custom.js') }} "></script>
		
		<!-- Theme Initialization Files -->
		<script src="{{ URL::to('public/js/theme.init.js') }} "></script>

@endpush

