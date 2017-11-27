@extends('public.master')
@section('title','Get Started')


@push('css')

<style>
/* Add here all your CSS customizations */
.form-group input[type="radio"] {
    display: none;
}

.form-group input[type="radio"] + .btn-group > label span {
    width: 20px;
}

.form-group input[type="radio"] + .btn-group > label span:first-child {
    display: none;
}
.form-group input[type="radio"] + .btn-group > label span:last-child {
    display: inline-block; 
}

.form-group input[type="radio"]:checked + .btn-group > label span:first-child {
    display: inline-block;
}
.form-group input[type="radio"]:checked + .btn-group > label span:last-child {
    display: none;   
}

.btn-group>.btn:first-child:not(:last-child):not(.dropdown-toggle) {
    border-radius: 0;

}
.btn-group>.btn:last-child:not(:first-child), .btn-group>.dropdown-toggle:not(:first-child) {
    border-radius: 0;
}
</style>

  <script>
  $( function() {
    $( "#dor" ).datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "-100:+0"
    });
  } );
  </script>

@endpush        

{{-- Main contant start --}}

@section('content')


    <!-- Section: Registration Form -->
    <section class="divider">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ">
            <div class="border-1px p-30 pt-20 mb-0">
              <h4 class="text-theme-colored mt-0 text-center"> COMPLETE YOUR ACCOUNT </h4>
              <hr>
              <h2 class="text-center" > {{ $data['email'] or old('email') }}  </h2>
       
{{-- Form Start Here --}}

                 {!! Form::open(['route'=>'signup2','id'=>'frmSignUp']) !!}
                   {{ csrf_field() }}

                {{-- These are hidden fields --}}

            <div class="row">
                <div class="form-group">

                @if($data)
                    <div class="col-md-6">
                        <input type="hidden" name="email" value="{{ $data['email'] or old('email') }}" class="form-control input-lg" required="required">
                    </div>

                    <div class="col-md-6">
                        <input type="hidden" name="fname" value="{{ $data['fname'] or old('fname') }}" class="form-control input-lg" required="required">
                    </div>
                   
                    <div class="col-md-6">
                        <input type="hidden" name="lname" value="{{ $data['lname'] or old('lname') }}" class="form-control input-lg" required="required">
                    </div>

                    <div class="col-md-6">
                        <input type="hidden" name="img" value="{{ $data['img'] or old('img') }}" class="form-control input-lg" required="required">
                    </div>
                @endif
                    
                </div>
            </div>

{{-- Hidden fields ends here --}}
              
                <div class="row mt-30">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="region"> Select Province <small style="color:red;">*</small></label>
                      <select id="region" name="region" class="form-control required" required="required">
                        <option value="">Select Your Region</option>
            @foreach( $regions as $region )
                        <option {{ old('region') == $region->id ? 'selected' : '' }} value="{{ $region->id }}">{{ $region->region_name }} </option>
            @endforeach 
                      </select>
                    </div>
                  </div>
                </div>
   
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="password">Password <small style="color:red;">*</small></label>
                      <input id="password" name="password" type="password" placeholder="Password" required="required" class="form-control">
                      <?php echo $errors->first('password', "<li style='color:red'>:message</li>") ?> 
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="password_confirmation">Re-enter Password <small style="color:red;">*</small></label>
                      <input id="password_confirmation" class="form-control input-lg" name="password_confirmation" type="Password" placeholder="Re-enter Password" required="required" />
                      <?php echo $errors->first('password_confirmation', "<li style='color:red'>:message</li>") ?> 
                    </div>
                  </div>
                </div>
             
                <h3 class="text-center mt-20 mb-30">I want to</h3>
                <?php echo $errors->first('register', "<li style='color:red'>:message</li>") ?> 
                

               <div class="row">
                    <div class="form-group">

                        <div class="col-sm-10 col-sm-offset-1 col-md-4 col-md-offset-0 center">  

                            <input type="radio" name="register" value="lawyer" id="lawyer" {{ old('register') == 'lawyer' ? 'checked' : '' }} />
                            <div class="btn-group">
                                <label for="lawyer" class="btn btn-lg btn-default">
                                    <span class="[ glyphicon glyphicon-ok ]"></span>
                                    <span> </span>
                                </label>
                                <label for="lawyer" class="btn btn-lg btn-primary">
                                    Register as Lawyer
                                </label>
                            </div>
                        </div>
                      
                        <div class="col-sm-10 col-sm-offset-1 col-md-4 col-md-offset-0 mt-sm-20 center">
                            <input type="radio" name="register" value="lawfirm" id="lawfirm" {{ old('register') == 'lawfirm' ? 'checked' : '' }} />
                            <div class="btn-group">
                                <label for="lawfirm" class="btn btn-lg btn-default">
                                    <span class="[ glyphicon glyphicon-ok ]"></span>
                                    <span> </span>
                                </label>
                                <label for="lawfirm" class="btn btn-lg btn-primary">
                                     Register as Law Firm
                                </label>
                            </div>
                        </div>

                         <div class="col-sm-10 col-sm-offset-1 col-md-4 col-md-offset-0 mt-sm-20 center">
                            <input type="radio" name="register" value="guest" id="member" {{ old('register') == 'guest' ? 'checked' : '' }} />
                                <div class="btn-group">
                                    <label for="member" class="btn btn-lg btn-default">
                                        <span class="[ glyphicon glyphicon-ok ]"></span>
                                        <span> </span>
                                    </label>
                                <label for="member" class="btn btn-lg btn-primary">
                                     Become a Member
                                </label>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row mt-20">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label for="check">
                                        <input id="check" class="checkbox" type="checkbox" name="checkBox" value="1" required="required" style="display:block;">I Accept the Nepal Lawyers <a href="#">  Terms of conditions </a> including the <a href="#"> Privacy Policy</a>
                                    </label>
                                    <?php echo $errors->first('checkBox', "<li style='color:red'>:message</li>") ?>  
                                </div>
                            </div>
                        </div>
                </div>
                
                <div class="row mt-10">
                    <div class="col-sm-4 col-sm-offset-4">
                        <div class="form-group">
                          <input type="submit" value="Submit" name="submit" class="btn btn-block btn-primary btn-sm mt-20 pt-10 pb-10" style="font-size:16px;">
                        </div>
                    </div>
                </div>
                
            {!! Form::close() !!}

              
              
              <!-- Job Form Validation-->
<script type="text/javascript">   
    $("#frmSignUp").validate();
</script>
            </div>
          </div>
        </div>
      </div>
    </section>


{{-- Main contant ends --}}

@stop
