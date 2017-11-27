@extends('public.master')
@section('title','Blog')
@section('blog',"class=active")

@section('content')

{{-- Main contant start --}}
    <section id="blog-content">   
    <div class="container mt-10 mb-30 pt-10 pb-30">
        <div class="heading-line-bottom pb-15 mt-0 mb-30 col-sm-12">
          <h3 class="heading-title text-center" style="color:#F55E45;">Blogs</h3>
        </div>
        <div class="row multi-row-clearfix">
          <div class="blog-posts">
            @foreach($posts as $pos)
                    <div class="col-sm-6 col-md-3 col-lg-3 mb-50 list-dashed ">
                        <article class="post clearfix pb-20 " style="border-bottom: none !important;">
                            <div class="entry-header">
                                <div class="post-thumb"><a href="{{ url('blog_detail').'/'.$pos->id}}"><img alt="" src="{{ URL::to('public/blogimages'.'/'.$pos->image_path )}}" class="img-responsive" width="238px" style="height:160px;"></a></div>

                                <h5 class="entry-title"><a href="{{ url('blog_detail').'/'.$pos->id}}">{{ $pos->post_title }}</a></h5>

                                <ul class="list-inline font-12 mb-20 mt-10">
                                    <li>posted by <a href="#" class="text-theme-colored">Admin |</a></li>

                                    <li><span class="text-theme-colored">{{ $pos->time }}</span></li>
                                </ul>
                            </div>
                            <div class="entry-content">

                                <p class="mb-30">{{ str_limit($pos->descryption, 150, ' (...)') }}</p>

                                <ul class="list-inline like-comment pull-left font-12">

                                    <li><i class="pe-7s-comment"></i></li>

                                </ul>

                                <a class="pull-right text-gray font-12" href="{{ url('blog_detail').'/'.$pos->id}}"><i class="fa fa-angle-double-right text-theme-colored"></i> Read more</a>
                            </div>
                        </article>
                    </div>
                @endforeach
          </div>
        </div>
      </div>
  </section>

{{-- Main contant ends --}}

@stop
