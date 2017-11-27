@extends('public.master')
@section('title','Blog Detail')

@section('content')

{{-- Main contant start --}}

      <section>
      <div class="container mb-30 pt-30 pb-30">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <div class="blog-posts single-post">
              <article class="post clearfix mb-0">
                <div class="entry-header">
                  <div class="clearfix"></div>
                  <div class="post-thumb"> <img alt="No image" src="{{ URL::to('public/blogimages'.'/'.$post->image_path )}}"> </div>
                  <a href="#">
                  <h3>{{ $post->post_title }}</h3>
                  </a>
                  <div class="entry-meta">
                    <span><i class="fa fa-user text-theme-colored"></i> Published by <a href="#">Admin</a> of <a href="#">Nepla Lawyer</a></span>
                    <span><i class="fa fa-comments text-theme-colored"></i> <a href="#">43</a></span>
                    <span><i class="fa fa-calendar text-theme-colored"></i> {{ $post->time }}</span>
                  </div>
                </div>
                <div class="entry-content mt-40">
                  {{ $post->descryption }}
                </div>
              </article>

              <div class="comments-area">
                <h5 class="comments-title">Comments:</h5>
                <ul class="comment-list">
                @foreach($comments as $comment)  
                  <li class="mb-20">
                    <div class="media comment-author">
                        @foreach($users as $user)
                            @if( $comment->replier_id == $user->id)
                                <img class="img-thumbnail" src="{{ URL::to('public/profileimages/'.$user->image_path)}}" width="65" alt="" style="height: 65px;">
                            @endif
                        @endforeach
                      <div class="media-body">
                        <h5 class="media-heading comment-heading">
                        @foreach($users as $user)
                            @if( $comment->replier_id == $user->id)
                                {{ $user->first_name }} {{ $user->last_name }}
                            @endif
                        @endforeach
                        </h5>
                        <div class="comment-date">{{ $comment->time }}</div>
                        <p>{{ $comment->comment }}</p>
                      </div>
                    </div>
                  </li>
                @endforeach
                </ul>
              </div>
              <div class="comment-box">
                <div class="row">
                  <div class="col-sm-12">
                    <h5>Leave a Comment</h5>
                    <div class="row">
                      {!! Form::open(['route'=>'comment_blog', 'id'=>'comment-form']) !!}
                      <input type="hidden" name="post_id" value="{{ $post->id}}">
                      <input type="hidden" name="replayer_id" value="@if(Auth::check()) {{ Auth::user()->id}} @endif">
                        <div class="col-sm-6 pt-0 pb-0">
                          <div class="form-group">
                            <input class="form-control" required="" name="contact_name" id="contact_name" placeholder="Enter Name" value="@if(Auth::check()){{ Auth::user()->first_name}} {{ Auth::user()->last_name}}@endif" type="text" readonly>
                            <?php echo $errors->first('contact_name', "<li style='color:red'>:message</li>") ?>
                          </div>
                          <div class="form-group">
                            <input required="" class="form-control" name="contact_email2" id="contact_email2" placeholder="Enter Email" value="@if(Auth::check()){{ Auth::user()->email}} @endif" type="text" readonly>
                            <?php echo $errors->first('contact_email2', "<li style='color:red'>:message</li>") ?>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <textarea class="form-control" required name="contact_message2" id="contact_message2" placeholder="Enter Message" rows="7"></textarea>
                            <?php echo $errors->first('contact_message2', "<li style='color:red'>:message</li>") ?>
                          </div>
                          <div class="form-group">
                           @if(Auth::check())    
                                <button type="submit" class="btn btn-dark btn-flat pull-right m-0">Submit</button>
                            @else
                                <button class="btn btn-dark btn-flat pull-right m-0" disabled>Submit</button>
                                <p class="mt-10"><span><span style="color:red">* </span>Please login first!</span></p>
                            @endif    
                          </div>
                        </div>
                      {!! Form::close() !!}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>  

{{-- Main contant ends --}}

@stop
