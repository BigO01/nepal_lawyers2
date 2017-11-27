@extends('public.master')
@section('title', 'Get Listed')

@section('content')

    <section class="divider">
      <div class="container">
          <div class="heading-line-bottom col-sm-12 pb-20">
            <h3 class="heading-title text-center" style="color:#F55E45;">Lawyers Get Listed</h3>
        </div>
      </div>
    </section>    

    <section id="about">
      <div class="container" style="padding-top: 0px !important; padding-bottom: 0px !important;">
        <div class="row">
          <div class="col-md-6">
            <div class="line-bottom pb-sm-20"></div>
            <h2>WELCOME TO OUR WEBSITE!</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit voluptate est, enim debitis cumque ipsam. Perferendis architecto aliquam excepturi veritatis, nam quibusdam qui fugiat fuga soluta aut voluptatibus, debitis, eveniet ab! Voluptates veritatis ab vitae possimus ad, soluta exercitationem distinctio.</p>
            <p>Over 42,000 dedicated employees, working in 17 regional clusters around the globe, deliver operational excellence — to provide viable answers to the most challenging supply chain questions.</p>
            <div class="row">
              <div class="col-md-6">
                <div class="about-designation">
                 <p><strong class="text-uppercase">MR. Lawyer<br>
                  </strong><small>Chairman &amp; Chief Executive Officer</small></p>
                </div>
              </div>
              <div class="col-md-6">
                <figure>
                  <div><img class="img-responsive mb-sm-15" alt="autograph" src="images/signature.png"></div>
                </figure>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <a href="#"><img class="img-fullwidth" src="http://placehold.it/450x250" alt=""></a>
          </div>
        </div>
      </div>

        <div class="section-content container" style="background: white;">
          <div class="row">
            <div class="col-md-4">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="icon-box left media bg-deep p-30 mb-20"> <a class="media-left pull-left" href="#"> <i class="pe-7s-user text-theme-colored"></i></a>
                    <div class="media-body"> <strong>Register / SignUp</strong>
                      <a href="{{ route('login') }}" ><button class="btn btn-info mt-10">Click Here!</button></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

    </section>

         


    <section id="about">
      <div class="container"  style="margin-top: 0px !important; padding-top: 0px !important;">
        <div class="row">
          <div class="col-md-6">
            <a href="#"><img class="img-fullwidth" src="http://placehold.it/450x250" alt=""></a>
          </div>
          <div class="col-md-6">
            <div class="line-bottom pb-sm-20"></div>
            <h2>WELCOME TO OUR WEBSITE!</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit voluptate est, enim debitis cumque ipsam. Perferendis architecto aliquam excepturi veritatis, nam quibusdam qui fugiat fuga soluta aut voluptatibus, debitis, eveniet ab! Voluptates veritatis ab vitae possimus ad, soluta exercitationem distinctio.</p>
            <p>Over 42,000 dedicated employees, working in 17 regional clusters around the globe, deliver operational excellence — to provide viable answers to the most challenging supply chain questions.</p>
            <div class="row">
              <div class="col-md-6">
                <div class="about-designation">
                 <p><strong class="text-uppercase">MR. Lawyer<br>
                  </strong><small>Chairman &amp; Chief Executive Officer</small></p>
                </div>
              </div>
              <div class="col-md-6">
                <figure>
                  <div><img class="img-responsive mb-sm-15" alt="autograph" src="images/signature.png"></div>
                </figure>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@stop

