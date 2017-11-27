@extends('public.master')
@section('title','Home')
@section('home',"class=active")

@push('css')
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <script src="{{ URL::to('public/new/js/smoothScroll.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ URL::to('public/slider-css/normalize.min.css') }}" media="screen, print" />
    <link rel="stylesheet" type="text/css" href="{{ URL::to('public/slider-css/n2-ss-52.css') }}" media="screen, print" />
    <style type="text/css">.n2-ss-spinner-simple-white-container {
        position: absolute;
        top: 50%;
        left: 50%;
        margin: -20px;
        background: #fff;
        width: 20px;
        height: 20px;
        padding: 10px;
        border-radius: 50%;
        z-index: 1000;
    }

    .n2-ss-spinner-simple-white {
        outline: 1px solid RGBA(0,0,0,0);
        width:100%;
        height: 100%;
    }

    .n2-ss-spinner-simple-white:before {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 20px;
        height: 20px;
        margin-top: -11px;
        margin-left: -11px;
    }

    .n2-ss-spinner-simple-white:not(:required):before {
        content: '';
        border-radius: 50%;
        border-top: 2px solid #333;
        border-right: 2px solid transparent;
        animation: n2SimpleWhite .6s linear infinite;
        -webkit-animation: n2SimpleWhite .6s linear infinite;
    }
    @keyframes n2SimpleWhite {
        to {transform: rotate(360deg);}
    }

    @-webkit-keyframes n2SimpleWhite {
        to {-webkit-transform: rotate(360deg);}
    }</style>
    <script type="text/javascript">window.N2PRO=1;window.N2GSAP=1;window.N2PLATFORM="wordpress";window.nextend={localization: {}, deferreds:[], loadScript: function(url){n2jQuery.ready(function () {var d = n2.Deferred();nextend.deferreds.push(d); n2.ajax({url:url,dataType:"script",cache:true,complete:function(){setTimeout(function(){d.resolve()})}})})}, ready: function(cb){n2.when.apply(n2, nextend.deferreds).done(function(){cb.call(window,n2)})}};window.N2SSPRO=1;window.N2SS3C="smartslider3";
    nextend.fontsLoaded = false;
    nextend.fontsLoadedActive = function () {nextend.fontsLoaded = true;};
    var fontData = {
        google: {
            families: ["Roboto:300,400:latin"]
        },
        active: function(){nextend.fontsLoadedActive()},
        inactive: function(){nextend.fontsLoadedActive()}
    };
    if(typeof WebFontConfig !== 'undefined'){
        var _WebFontConfig = WebFontConfig;
        for(var k in WebFontConfig){
            if(k == 'active'){
                fontData.active = function(){nextend.fontsLoadedActive();_WebFontConfig.active();}
            }else if(k == 'inactive'){
                fontData.inactive = function(){nextend.fontsLoadedActive();_WebFontConfig.inactive();}
            }else if(k == 'google'){
                if(typeof WebFontConfig.google.families !== 'undefined'){
                    for(var i = 0; i < WebFontConfig.google.families.length; i++){
                        fontData.google.families.push(WebFontConfig.google.families[i]);
                    }
                }
            }else{
                fontData[k] = WebFontConfig[k];
            }
        }
    }
    if(typeof WebFont === 'undefined'){
        window.WebFontConfig = fontData;
    }else{
        WebFont.load(fontData);
    }</script>
    <script type="text/javascript" src="{{ URL::to('public/slider-js/n2.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('public/slider-js/nextend-gsap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('public/slider-js/nextend-frontend.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('public/slider-js/smartslider-frontend.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('public/slider-js/smartslider-simple-type-frontend.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('public/slider-js/nextend-webfontloader.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('public/slider-js/n2-ss-52.js') }}"></script>
    <script type="text/javascript">window.n2jQuery.ready((function($){
        window.nextend.ready(function() {

            nextend.fontsDeferred = n2.Deferred();
            if(nextend.fontsLoaded){
                nextend.fontsDeferred.resolve();
            }else{
                nextend.fontsLoadedActive = function () {
                    nextend.fontsLoaded = true;
                    nextend.fontsDeferred.resolve();
                };
                var intercalCounter = 0;
                nextend.fontInterval = setInterval(function(){
                    if(intercalCounter > 3 || document.documentElement.className.indexOf('wf-active') !== -1){
                        nextend.fontsLoadedActive();
                        clearInterval(nextend.fontInterval);
                    }
                    intercalCounter++;
                }, 1000);
            }
            new N2Classes.SmartSliderSimple('#n2-ss-52', {"admin":false,"translate3d":1,"callbacks":"","randomize":{"randomize":0,"randomizeFirst":0},"align":"normal","isDelayed":0,"load":{"fade":1,"scroll":0},"playWhenVisible":1,"playWhenVisibleAt":0.5,"responsive":{"desktop":1,"tablet":1,"mobile":1,"onResizeEnabled":true,"type":"fullwidth","downscale":1,"upscale":1,"minimumHeight":0,"maximumHeight":3000,"maximumSlideWidth":3000,"maximumSlideWidthLandscape":3000,"maximumSlideWidthTablet":3000,"maximumSlideWidthTabletLandscape":3000,"maximumSlideWidthMobile":3000,"maximumSlideWidthMobileLandscape":3000,"maximumSlideWidthConstrainHeight":0,"forceFull":1,"forceFullHorizontalSelector":"","constrainRatio":1,"verticalOffsetSelectors":"","focusUser":0,"focusAutoplay":0,"deviceModes":{"desktopPortrait":1,"desktopLandscape":0,"tabletPortrait":1,"tabletLandscape":0,"mobilePortrait":1,"mobileLandscape":0},"normalizedDeviceModes":{"unknownUnknown":["unknown","Unknown"],"desktopPortrait":["desktop","Portrait"],"desktopLandscape":["desktop","Portrait"],"tabletPortrait":["tablet","Portrait"],"tabletLandscape":["tablet","Portrait"],"mobilePortrait":["mobile","Portrait"],"mobileLandscape":["mobile","Portrait"]},"verticalRatioModifiers":{"unknownUnknown":1,"desktopPortrait":1,"desktopLandscape":1,"tabletPortrait":1,"tabletLandscape":1,"mobilePortrait":1,"mobileLandscape":1},"minimumFontSizes":{"desktopPortrait":1,"desktopLandscape":1,"tabletPortrait":1,"tabletLandscape":1,"mobilePortrait":1,"mobileLandscape":1},"ratioToDevice":{"Portrait":{"tablet":0.7,"mobile":0.5},"Landscape":{"tablet":0,"mobile":0}},"sliderWidthToDevice":{"desktopPortrait":1200,"desktopLandscape":1200,"tabletPortrait":840,"tabletLandscape":0,"mobilePortrait":600,"mobileLandscape":0},"basedOn":"combined","tabletPortraitScreenWidth":800,"mobilePortraitScreenWidth":440,"tabletLandscapeScreenWidth":800,"mobileLandscapeScreenWidth":440,"orientationMode":"width_and_height","scrollFix":0,"overflowHiddenPage":0,"desktopPortraitScreenWidth":1200},"controls":{"scroll":0,"drag":1,"touch":"horizontal","keyboard":1,"tilt":0},"lazyLoad":0,"lazyLoadNeighbor":0,"blockrightclick":0,"maintainSession":0,"autoplay":{"enabled":1,"start":1,"duration":2500,"autoplayToSlide":-1,"autoplayToSlideIndex":-1,"allowReStart":0,"pause":{"click":1,"mouse":"0","mediaStarted":1},"resume":{"click":0,"mouse":"0","mediaEnded":1,"slidechanged":0}},"layerMode":{"playOnce":0,"playFirstLayer":1,"mode":"skippable","inAnimation":"mainInEnd"},"parallax":{"enabled":1,"mobile":0,"is3D":0,"animate":1,"horizontal":"mouse","vertical":"mouse","origin":"slider","scrollmove":"both"},"background.parallax.tablet":1,"background.parallax.mobile":1,"postBackgroundAnimations":0,"initCallbacks":[],"allowBGImageAttachmentFixed":false,"bgAnimations":0,"mainanimation":{"type":"fade","duration":3200,"delay":0,"ease":"easeInOutQuart","parallax":1,"shiftedBackgroundAnimation":"auto"},"carousel":1,"dynamicHeight":0});
            new N2Classes.SmartSliderWidgetArrowImage("n2-ss-52", 1, 0.7, 0.5);
            new N2Classes.SmartSliderWidgetBulletTransition("n2-ss-52", {"overlay":false,"area":10,"thumbnails":[],"action":"click","numeric":0});
        });
    }));
    </script>

@endpush

@section('content')

{{-- Main contant start --}}

      <!-- Nextend Smart Slider 3 #52 - BEGIN -->
      <div id="n2-ss-52-align" class="n2-ss-align">
          <div class="n2-padding">
              <div id="n2-ss-52" class="n2-ss-slider n2-ow n2-has-hover n2notransition n2-ss-load-fade " data-minFontSizedesktopPortrait="1" data-minFontSizedesktopLandscape="1" data-minFontSizetabletPortrait="1" data-minFontSizetabletLandscape="1" data-minFontSizemobilePortrait="1" data-minFontSizemobileLandscape="1" style="font-size: 16px;" data-fontsize="16">
                <div class="n2-ss-slider-1 n2-ss-swipe-element n2-ow" style="">
                    <div class="n2-ss-slider-2 n2-ow">
                        <div class="n2-ss-slider-3 n2-ow" style="">

                            <div class="n2-ss-slide-backgrounds">

                            </div>
                                

            @foreach($sliders as $slider)                    
                        <div data-slide-duration="0" data-id="{{$slider->id}}" class="n2-ss-slide n2-ss-canvas n2-ow  n2-ss-slide-{{$slider->id}}" style="">
                                    <div data-hash="d349e1f06859aca9b28cac662a8f16b3" data-desktop="{{ URL::to('public/sliderimages'.'/'.$slider->image_path ) }}" class="n2-ss-slide-background n2-ow" data-opacity="1" data-blur="0" data-mode="fill" data-x="50" data-y="50">
                                        <div class="n2-ss-slide-background-mask" style="background-color: #ffffff;background-color: RGBA(255,255,255,0.74);">
                                            <img title="" src="{{ URL::to('public/sliderimages'.'/'.$slider->image_path ) }}" alt="" />
                                        </div>
                                    </div>
                                            <div class="n2-ss-layers-container n2-ow" data-csstextalign="center" style="">
                                                <div class="n2-ss-section-outer" style="background:RGBA(0,0,0,0.58);">
                                                    <div class="n2-ss-layer n2-ow" style="overflow:;" data-csstextalign="inherit" data-desktopportraitmaxwidth="0" data-cssselfalign="inherit" data-desktopportraitselfalign="inherit" data-pm="content" data-desktopportraitpadding="10|*|10|*|10|*|10|*|px+" data-desktopportraitinneralign="inherit" data-type="content" data-rotation="0" data-desktopportrait="1" data-desktoplandscape="1" data-tabletportrait="1" data-tabletlandscape="1" data-mobileportrait="1" data-mobilelandscape="1" data-adaptivefont="1" data-desktopportraitfontsize="100" data-plugin="rendered">

                                                        <div class="n2-ss-section-main-content n2-ss-layer-content n2-ow" style="padding:0.625em 0.625em 0.625em 0.625em ;" data-verticalalign="center"><div class="n2-ss-layer n2-ow" style="margin:0em 0em 0em 0em ;overflow:visible;" data-pm="normal" data-desktopportraitmargin="0|*|0|*|0|*|0|*|px+" data-desktopportraitheight="0" data-desktopportraitmaxwidth="0" data-cssselfalign="inherit" data-desktopportraitselfalign="inherit" data-type="layer" data-rotation="0" data-desktopportrait="1" data-desktoplandscape="1" data-tabletportrait="1" data-tabletlandscape="1" data-mobileportrait="1" data-mobilelandscape="1" data-adaptivefont="0" data-desktopportraitfontsize="100" data-plugin="rendered"><div id="n2-ss-52item1" class="n2-font-78cd3fd935f0ab22bfc6da2a920ba02b-hover bk-sl   n2-ow" style="display:block;">{{ $slider->slide_heading }}</div>
                                                        </div>
                                                            <div class="n2-ss-layer n2-ow" style="margin:0em 0em 0em 0em ;overflow:visible;" data-pm="normal" data-desktopportraitmargin="0|*|0|*|0|*|0|*|px+" data-desktopportraitheight="0" data-desktopportraitmaxwidth="0" data-cssselfalign="inherit" data-desktopportraitselfalign="inherit" data-type="layer" data-rotation="0" data-desktopportrait="1" data-desktoplandscape="1" data-tabletportrait="1" data-tabletlandscape="1" data-mobileportrait="1" data-mobilelandscape="1" data-adaptivefont="0" data-desktopportraitfontsize="100" data-plugin="rendered"><div id="n2-ss-52item2" class="n2-font-dcd962d05670dc34090640f852c4318d-hover   n2-ow" style=" color: #ffffff; display:block;">{{ $slider->slide_subheading }}</div></div><div class="n2-ss-layer n2-ow" style="margin:0em 0em 0em 0em ;overflow:visible;" data-pm="normal" data-desktopportraitmargin="0|*|0|*|0|*|0|*|px+" data-desktopportraitheight="0" data-desktopportraitmaxwidth="0" data-cssselfalign="inherit" data-desktopportraitselfalign="inherit" data-type="layer" data-rotation="0" data-desktopportrait="1" data-desktoplandscape="1" data-tabletportrait="1" data-tabletlandscape="1" data-mobileportrait="1" data-mobilelandscape="1" data-adaptivefont="0" data-desktopportraitfontsize="100" data-plugin="rendered"><div class="n2-ow n2-ow-all n2-ss-desktop n2-ss-mobile n2-ss-tablet">
                           <p class="n2-font-bbd981028daeeaef4dcc2e070f5e4930-paragraph  n2-style-a0b4a96b13a1e187500360e0d0de3fd8-heading  n2-ow">
                               {{ $slider->slide_text }}
                           </p>                                    
                  </div></div></div></div></div></div></div>
            @endforeach      




                </div>
              </div>
              <div data-ssleft="0+15" data-sstop="height/2-previousheight/2" id="n2-ss-52-arrow-previous" class="n2-ss-widget n2-ss-widget-display-desktop n2-ss-widget-display-tablet n2-ss-widget-display-mobile nextend-arrow n2-ib n2-ow nextend-arrow-previous  nextend-arrow-animated-fade" style="position: absolute;" role="button" aria-label="Previous slide" tabindex="0"><img class="n2-arrow-normal-img n2-ow" data-no-lazy="1" data-hack="data-lazy-src" src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzIiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCAzMiAzMiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNMTEuNDMzIDE1Ljk5MkwyMi42OSA1LjcxMmMuMzkzLS4zOS4zOTMtMS4wMyAwLTEuNDItLjM5My0uMzktMS4wMy0uMzktMS40MjMgMGwtMTEuOTggMTAuOTRjLS4yMS4yMS0uMy40OS0uMjg1Ljc2LS4wMTUuMjguMDc1LjU2LjI4NC43N2wxMS45OCAxMC45NGMuMzkzLjM5IDEuMDMuMzkgMS40MjQgMCAuMzkzLS40LjM5My0xLjAzIDAtMS40MmwtMTEuMjU3LTEwLjI5IiBmaWxsPSIjZmZmZmZmIiBvcGFjaXR5PSIwLjgiIGZpbGwtcnVsZT0iZXZlbm9kZCIvPjwvc3ZnPg==" alt="Arrow" /><img class="n2-arrow-hover-img n2-ow" data-no-lazy="1" data-hack="data-lazy-src" src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzIiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCAzMiAzMiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNMTEuNDMzIDE1Ljk5MkwyMi42OSA1LjcxMmMuMzkzLS4zOS4zOTMtMS4wMyAwLTEuNDItLjM5My0uMzktMS4wMy0uMzktMS40MjMgMGwtMTEuOTggMTAuOTRjLS4yMS4yMS0uMy40OS0uMjg1Ljc2LS4wMTUuMjguMDc1LjU2LjI4NC43N2wxMS45OCAxMC45NGMuMzkzLjM5IDEuMDMuMzkgMS40MjQgMCAuMzkzLS40LjM5My0xLjAzIDAtMS40MmwtMTEuMjU3LTEwLjI5IiBmaWxsPSIjZmZmZmZmIiBvcGFjaXR5PSIxIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiLz48L3N2Zz4=" alt="Arrow" /></div><div data-ssright="0+15" data-sstop="height/2-nextheight/2" id="n2-ss-52-arrow-next" class="n2-ss-widget n2-ss-widget-display-desktop n2-ss-widget-display-tablet n2-ss-widget-display-mobile nextend-arrow n2-ib n2-ow nextend-arrow-next  nextend-arrow-animated-fade" style="position: absolute;" role="button" aria-label="Next slide" tabindex="0"><img class="n2-arrow-normal-img n2-ow" data-no-lazy="1" data-hack="data-lazy-src" src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzIiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCAzMiAzMiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNMTAuNzIyIDQuMjkzYy0uMzk0LS4zOS0xLjAzMi0uMzktMS40MjcgMC0uMzkzLjM5LS4zOTMgMS4wMyAwIDEuNDJsMTEuMjgzIDEwLjI4LTExLjI4MyAxMC4yOWMtLjM5My4zOS0uMzkzIDEuMDIgMCAxLjQyLjM5NS4zOSAxLjAzMy4zOSAxLjQyNyAwbDEyLjAwNy0xMC45NGMuMjEtLjIxLjMtLjQ5LjI4NC0uNzcuMDE0LS4yNy0uMDc2LS41NS0uMjg2LS43NkwxMC43MiA0LjI5M3oiIGZpbGw9IiNmZmZmZmYiIG9wYWNpdHk9IjAuOCIgZmlsbC1ydWxlPSJldmVub2RkIi8+PC9zdmc+" alt="Arrow" /><img class="n2-arrow-hover-img n2-ow" data-no-lazy="1" data-hack="data-lazy-src" src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzIiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCAzMiAzMiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNMTAuNzIyIDQuMjkzYy0uMzk0LS4zOS0xLjAzMi0uMzktMS40MjcgMC0uMzkzLjM5LS4zOTMgMS4wMyAwIDEuNDJsMTEuMjgzIDEwLjI4LTExLjI4MyAxMC4yOWMtLjM5My4zOS0uMzkzIDEuMDIgMCAxLjQyLjM5NS4zOSAxLjAzMy4zOSAxLjQyNyAwbDEyLjAwNy0xMC45NGMuMjEtLjIxLjMtLjQ5LjI4NC0uNzcuMDE0LS4yNy0uMDc2LS41NS0uMjg2LS43NkwxMC43MiA0LjI5M3oiIGZpbGw9IiNmZmZmZmYiIG9wYWNpdHk9IjEiIGZpbGwtcnVsZT0iZXZlbm9kZCIvPjwvc3ZnPg==" alt="Arrow" /></div>
              <div data-ssleft="width/2-bulletwidth/2" data-ssbottom="0+10" data-offset="10" class="n2-ss-widget n2-ss-widget-display-desktop n2-ss-widget-display-tablet n2-ss-widget-display-mobile  n2-ss-control-bullet" style="position: absolute;"><div class=" nextend-bullet-bar n2-ow nextend-bullet-bar-horizontal" style="text-align: center;"><div class="n2-ow n2-style-15631750811be005da199299b937780d-dot " tabindex="0"></div><div class="n2-ow n2-style-15631750811be005da199299b937780d-dot " tabindex="0"></div><div class="n2-ow n2-style-15631750811be005da199299b937780d-dot " tabindex="0"></div></div></div>
          </div>
      </div><div class="n2-clear"></div><div id="n2-ss-52-spinner" style="display: none;"><div><div class="n2-ss-spinner-simple-white-container"><div class="n2-ss-spinner-simple-white"></div></div></div></div></div></div><div id="n2-ss-52-placeholder" style="position: relative;z-index:2;"><img style="width: 100%; max-width:3000px; display: block;" class="n2-ow" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMCIgd2lkdGg9IjEyMDAiIGhlaWdodD0iMzgwIiA+PC9zdmc+" alt="Slider" /></div>
      <!-- Nextend Smart Slider 3 #52 - END -->

<section>

                  <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 bdiv pl-10 pr-10 qsize" >
                      <a href="#" class="bdivc" data-toggle="modal" data-target="#myLocation">
                          <div class="">
                              <div class="row child">
                                  <div class="col-lg-12 text-center">
                                      <h3 class="child" >Lawyers by Location</h3>
                                      <h6 class="child1 font-13" > Post a Question online and get free advice from multiple lawyers by email. Post a Question online and get free advice from multiple lawyers by email</h6>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>

<!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ Model @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->

<!-- Modal -->

            <div class="modal fade" id="myLocation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg margin-model" role="document">
                    <div class="modal-content" >
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" style="text-align: center"id="myModalLabel"></h4>
                        </div>
                        <div class="modal-body">
                            <div class="row ">
                                <div class="col-md-12 mb-10" >
                                    <div class="  p-45 "  style="text-align: center; height: auto !important; ">
                                        <h2>Hi, How Can We Help You?</h2>
                                         {!! Form::open(['route'=>'search','class'=>'form-inline']) !!}
                                            <div class="row">

                                            <div class="col-lg-3 col-md-3 col-sm-12 p-10" style="">
                                              <select name="region" class="selectpicker form-control btnSize" data-live-search="true" >
                                              <option value="">Search By Province</option>
                                            @foreach( $regions as $region)  
                                               <option value="{{ $region->id }}">{{ $region->region_name }}</option>
                                            @endforeach   
                                              </select>
                                            </div>

                                            <div class="col-lg-3 col-md-3 col-sm-12 p-10">
                                              <select name="state" class="selectpicker form-control btnSize" data-live-search="true">
                                               <option value="">Search By District</option>
                                            @foreach( $states as $state)  
                                               <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                                            @endforeach   
                                              </select>
                                            </div>

                                            <div class="col-lg-3 col-md-3 col-sm-12 p-10">
                                              <select name="city" class="selectpicker  form-control btnSize" data-live-search="true">
                                               <option value="">Search By City</option>
                                            @foreach( $cities as $city)  
                                               <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                            @endforeach 
                                              </select>
                                            </div>

                                            <div class="col-lg-3 col-md-3 col-sm-12  p-10">
                                              <button type="submit" class="form-control form-control-custom btn btn-info search-focus  " > <i class=" icon_search"></i> Search</button>          
                                            </div>
                                            </div>
                                           {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer pt-20 pb-20"> <h4 class="font-11 m-0 text-center"></h4></div>
                    </div>
                </div>
            </div>

<!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ Model End @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->



          <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 bdiv pl-10 pr-10 qsize" >
              <a href="{{ route('lawfirms') }}" class="bdivc">
                  <div class="">
                      <div class="row  child">
                          <div class="col-lg-12 text-center "  >
                                      <h3 class="child">Lawyers by Law Firm</h3>
                                      <h6 class="child1 font-13" >Post a Question online and get free advice from multiple lawyers by email</h6>
                                  </div>
                                  <!--<div class="col-lg-2 asktdivs">-->
                                  <!--<i class="fa fa-chevron-right fa-2x cfa" ></i>-->
                                  <!--</div>-->
                              </div>
                          </div>
                      </a>


                  </div>

          <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 bdiv pl-10 pr-10 qsize" >
              <a href="{{ URL::to('/findlawyer') }}" class="bdivc">
                  <div class="">
                      <div class="row  child">
                          <div class="col-lg-12 text-center "  >
                                      <h3 class="child" >Lawyers by Practice</h3>
                                      <h6 class="child1 font-13" >Post a Question online and get free advice from multiple lawyers by email</h6>
                                  </div>
                                  <!--<div class="col-lg-2 asktdivs">-->
                                  <!--<i class="fa fa-chevron-right fa-2x cfa" ></i>-->
                                  <!--</div>-->
                              </div>
                          </div>
                      </a>

                  </div>
          <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 bdiv pl-10 pr-10 qsize" >
              <a href="{{ URL::to('/lawyerGetListed') }}" class="bdivc">
                  <div class="">
                      <div class="row  child">
                          <div class="col-lg-12 text-center "  >
                                      <h3 class="child">Lawyers get listed &nbsp;&nbsp;</h3>
                                      <h6 class=" child1 font-13">Post a Question online and get free advice from multiple lawyers by email</h6>
                                  </div>
                                  <!--<div class="col-lg-2 asktdivs">-->
                                  <!--<i class="fa fa-chevron-right fa-2x cfa" ></i>-->
                                  <!--</div>-->
                              </div>
                          </div>
                      </a>

                  </div>
          <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 bdiv pl-10 pr-10 qsize" >
              <a href="#free" class="bdivc">
                  <div class="">
                      <div class="row  child">
                          <div class="col-lg-12 text-center">
                                      <h3 class="child">Ask Free Question</h3>
                                      <h6 class=" child1 font-13" >Easily find and book private consults with top lawyers in Nepal </h6>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>
          <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 bdiv pl-10 pr-10 qsize" >
              <a href="{{ URL::to('quickconsult') }}" class="bdivc">
                  <div class="">
                      <div class="row  child">
                          <div class="col-lg-12 text-center "  >
                                      <h3 class="child">Get Quick Consultation</h3>
                                      <h6 class="child1 font-13">If you are faced with a complex legal matter or situation, you will want the caring and experienced representation that Werner Law Firm offers.</h6>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>
      </section>



      <!------------- --------->



      <!-- Section: Practice Area starts -->

      <section class="bg-lighter    padding-left: 65px" style="background-color: #ededed !important;">
          <div class="container">
              <div class="section-content">
                  <div class="row multi-row-clearfix text-center">
                      <div class="section-title icon-bg text-center mb-60">
                          <div class="row">
                              <div class="col-md-12">
                                  <h5 class="sub-title both-side-line">Find The Best Lawyers By</h5>
                                  <h2 class="mt-0 page-title"><i class="fa fa-legal"></i>Practice Area</h2>
                                  <p>We Have Professional In All Law Areas</p>
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-6 col-md-3">
                          <div class="icon-box iconbox-theme-colored bg-lightest">
                              <a href="{{ route('findlawyer_list',['22']) }}" class="icon icon-dark icon-bordered icon-rounded icon-border-effect effect-rounded">
                                  <i class="fa fa-balance-scale"></i>
                              </a>
                              <a href="{{ route('findlawyer_list',['22']) }}">
                                <h5 class="icon-box-title">Criminal Law</h5>
                              </a>  
                          </div>
                      </div>
                      <div class="col-sm-6 col-md-3">
                          <div class="icon-box iconbox-theme-colored bg-lightest">
                              <a href="{{ route('findlawyer_list',['24']) }}" class="icon icon-dark icon-bordered icon-rounded icon-border-effect effect-rounded">
                                  <i class="fa fa-group"></i>
                              </a>
                              <a href="{{ route('findlawyer_list',['24']) }}">
                                <h5 class="icon-box-title">Family Law</h5>
                              </a>  
                          </div>
                      </div>
                      <div class="col-sm-6 col-md-3">
                          <div class="icon-box iconbox-theme-colored bg-lightest">
                              <a href="{{ route('findlawyer_list',['29']) }}" class="icon icon-dark icon-bordered icon-rounded icon-border-effect effect-rounded">
                                  <i class="fa fa-automobile"></i>
                              </a>
                              <a href="{{ route('findlawyer_list',['29']) }}" >
                                <h5 class="icon-box-title">Accident Law</h5>
                              </a>  
                          </div>
                      </div>
                      <div class="col-sm-6 col-md-3">
                          <div class="icon-box iconbox-theme-colored bg-lightest">
                              <a href="{{ route('findlawyer_list',['30']) }}" class="icon icon-dark icon-bordered icon-rounded icon-border-effect effect-rounded">
                                  <i class="fa fa-graduation-cap"></i>
                              </a>
                              <a href="{{ route('findlawyer_list',['30']) }}">
                                <h5 class="icon-box-title">Education Law</h5>
                              </a>  
                          </div>
                      </div>
                      <div class="col-sm-6 col-md-3">
                          <div class="icon-box iconbox-theme-colored bg-lightest">
                              <a href="{{ route('findlawyer_list',['31']) }}" class="icon icon-dark icon-bordered icon-rounded icon-border-effect effect-rounded">
                                  <i class="fa fa-money"></i>
                              </a>
                              <a href="{{ route('findlawyer_list',['31']) }}">
                                <h5 class="icon-box-title">Money Laundering</h5>
                              </a>  
                          </div>
                      </div>
                      <div class="col-sm-6 col-md-3">
                          <div class="icon-box iconbox-theme-colored bg-lightest">
                              <a href="{{ route('findlawyer_list',['32']) }}" class="icon icon-dark icon-bordered icon-rounded icon-border-effect effect-rounded">
                                  <i class="fa fa-child"></i>
                              </a>
                              <a href="{{ route('findlawyer_list',['32']) }}">
                                <h5 class="icon-box-title">Sexual Ofences</h5>
                              </a>  
                          </div>
                      </div>
                      <div class="col-sm-6 col-md-3">
                          <div class="icon-box iconbox-theme-colored bg-lightest">
                              <a href="{{ route('findlawyer_list',['33']) }}" class="icon icon-dark icon-bordered icon-rounded icon-border-effect effect-rounded">
                                  <i class="fa fa-fire"></i>
                              </a>
                              <a href="{{ route('findlawyer_list',['33']) }}">
                                <h5 class="icon-box-title">Fire Accident</h5>
                              </a>  
                          </div>
                      </div>
                      <div class="col-sm-6 col-md-3">
                          <div class="icon-box iconbox-theme-colored bg-lightest">
                              <a href="{{ route('findlawyer_list',['19']) }}" class="icon icon-dark icon-bordered icon-rounded icon-border-effect effect-rounded">
                                  <i class="fa fa-fighter-jet"></i>
                              </a>
                              <a href="{{ route('findlawyer_list',['19']) }}">
                                <h5 class="icon-box-title">IMMIGRATION  LAW</h5>
                              </a>  
                          </div>
                      </div>
                  </div>
              </div>
          </div>

                  <div class="section-title icon-bg text-center mb-60 size">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ URL::to('/findlawyer') }}" class="btn btn-default btn-lg">View More</a>
                </div>
            </div>
        </div>
      </section>

                   <!-- Section: Practice Area end -->



  

  

  

  

  

  

    <!-- Section: Team -->

    <section >

      <div class="container pb-30">
        <div class="section-title icon-bg text-center mb-60">
          <div class="row">
            <div class="col-md-12">
              <h5 class="sub-title both-side-line">Sub Title Here</h5>
              <h2 class="mt-0 page-title"><i class="fa fa-legal"></i>Expert Attorneys</h2>
              <p>we are professional</p>
            </div>
          </div>
        </div>

        <div class="row multi-row-clearfix">
@foreach($simple_lawz as $attorney)          
          <div class="col-sm-6 col-md-3 mb-30 att size esize">
            <div class="attorney">
              <div class="thumb">
                <a href="{{ url('detail').'/'.$attorney->id}}">  
                  <img class="img-fullwidth abc" src="{{ URL::to('public/profileimages/'.$attorney->image_path )}}" alt="{{ URL::to('public/images/dummy.png')}}">
                </a>  
              </div>
              <div class="content">
                <a href="{{ url('detail').'/'.$attorney->id}}">
                  <h4 class="author text-theme-colored">{{$attorney->first_name}} {{ $attorney->last_name }}</h4>
                </a>
                <h6 class="title"><b>Experince:</b> {{ $attorney->fexperience }}{{ $attorney->lexperience }} Years</h6>  
                  <h6 class="title text-dark">
                    <?php 
                      $df = explode(',', $attorney->f_expertise_id);
                      $dl = explode(',', $attorney->l_expertise_id);
                      $cou = 0;

                      foreach ($df as $key) {
                        $cou++;
                        if($cou < 5){    
                            foreach($expertises as $ex){
                              if($key == $ex->id){
                                echo $ex->expertise_name." / ";
                              }
                            }
                        }    
                      }
                      foreach ($dl as $key) {
                         $cou++;
                        if($cou < 5){ 
                            foreach($expertises as $ex){
                              if($key == $ex->id){
                                echo $ex->expertise_name." / ";
                              }
                            }
                        }    
                      }
                    ?>
                  </h6>
                    <a href="{{url('detail').'/'.$attorney->id}}">&nbsp&nbsp<i class="fa fa-angle-double-right text-theme-colored"></i> View detail</a> 
              </div>
            </div>
          </div>
@endforeach
        </div>

      </div>

        <div class="section-title icon-bg text-center mb-60 size ">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ URL::to('/findlawyer') }}" class="btn btn-default btn-lg">View More</a>
                </div>
            </div>
        </div>

    </section>








@if(!empty($premium_lawz[0]))
      <!-- premimum section start -->

<section  class="layer-overlay overlay-light" data-bg-img="{{ URL::to('public/new/images/pattern/p16.jpg') }}"  >
  <div class="container pt-30 ">
    <div class="section-content pt-30">
        
        <!-- premimum image start -->

        <div class="section-content text-center">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="mt-0 mb-70" style="color:  #885205; font-size: 32px;">OUR PREMIUM LAWYERS ACCOUNTS</h3>
                </div>
            </div>
        </div>

        <!-- premimum image ends-->
    

        <!-- premimum accounts start-->

      <div class="row">
      @foreach($premium_lawz as $attorney)  
        <div class="col-sm-12 col-md-6 mb-30">
          <div class="attorney maxwidth400 bg-lighter">
            <div class="row">
              <div class="col-sm-6 col-md-6 xs-text-center pb-sm-20" >
                <div class="thumb box">
                  <a href="{{ url('detail').'/'.$attorney->id}}">
                    <img class="img-fullwidth img-pr-h" src="{{ URL::to('public/profileimages/'.$attorney->image_path )}}" alt="{{ URL::to('public/images/dummy.png')}}">
                  </a>  
                 <div class="ribbon"><span>Premium</span></div>
                </div>
              </div>

              <div class="col-sm-6 col-md-6 xs-text-center pb-sm-20 pt-10">
                <div class="content">
                  <a href="{{ url('detail').'/'.$attorney->id}}">  
                    <h4 class="author text-theme-colored">{{$attorney->first_name}} {{ $attorney->last_name }}</h4>
                  </a>  
                    <h6 class="title text-dark"><b>Experince:</b> {{ $attorney->fexperience }}{{ $attorney->lexperience }} Years</h6>
                  <p><b>Expertises: </b>
                    <?php 
                      $df = explode(',', $attorney->f_expertise_id);
                      $dl = explode(',', $attorney->l_expertise_id);
                      $count = 0;

                      foreach ($df as $key) {
                        $count++;
                        if($count < 4){
                            foreach($expertises as $ex){
                              if($key == $ex->id){
                                echo $ex->expertise_name.", ";
                              }
                            }
                        }  
                      } 

                      foreach ($dl as $key) {
                        $count++;
                        if($count < 4){
                            foreach($expertises as $ex){
                              if($key == $ex->id){
                                echo $ex->expertise_name.", ";
                              }
                            }
                        } 
                      }  

                    ?>
                  <a href="{{url('detail').'/'.$attorney->id}}">&nbsp&nbsp<i class="fa fa-angle-double-right text-theme-colored"></i> Read more</a>  
                  </p>
                  <!-- Address -->
                  <ul class="contact-area mt-10">
                    <li><i class="fa fa-map-marker"></i>
                    <?php
                      foreach ($regions as $region) {
                          if($region->id == $attorney->region_id){
                            echo $region->region_name." / ";
                          }
                        }
                    ?>
                    <?php
                      foreach ($states as $state) {
                          if($state->id == $attorney->state_id){
                            echo $state->state_name." / ";
                          }
                        }
                    ?>
                    <?php
                      foreach ($cities as $city) {
                          if($city->id == $attorney->city_id){
                            echo $city->city_name;
                          }
                        }
                    ?>
                    </li>
                    <li class="mt-20">
                      <a href="{{ url('detail').'/'.$attorney->id}}" class="btn btn-success btn-sm">Appointment</a>
                      <a href="{{ url('detail').'/'.$attorney->id}}" class="btn btn-info btn-sm ml-20">View Detail</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
        <!-- premimum accounts ends-->
    </div>
  </div>
</section>

      <!-- premimum section ends-->
@endif




      <!-- testimonial section starts-->




<!----blogs------>




@if(!empty($posts))
    <section>
        <div class="container mt-30 mb-30 pt-30 pb-30">
            <div class="section-title icon-bg text-center mb-60">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="sub-title both-side-line">Find The Latest</h5>
                        <h2 class="mt-0 page-title"><i class=" pe-7s-news-paper"></i>Blogs and News</h2>
                    </div>
                </div>
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
@endif










    <!-----blogs ends------>







<!------testimonials------>







    <section class="divider parallax layer-overlay" data-stellar-background-ratio="1" data-bg-img="{{ URL::to('public/webimages'.'/'.$web_info->testimonial_bg )}}">

        <div class="container">

            <div class="section-title icon-bg text-center mb-60" style="margin-top:-30px;">
                <div class="row">
                    <div class="col-md-12">

                        <h2 class="mt-0 page-title" style="color:white;">Testimonials</h2>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="testimonial-carousel fullwidth text-center dot-theme-colored">

                    @foreach($testimonials as $testimonial)
                        <!-- Testimonials items start-->
                        <div class="item">
                            <div class="thumb"><img src="{{ URL::to('public/testimonialimages'.'/'.$testimonial->image_path ) }}" alt="" width="90" class="img-circle img-responsive">
                            </div>
                            <div class="content">
                                <p>{{ $testimonial->message }}</p>
                                <h5 class="author text-theme-colored">{{ $testimonial->name }}</h5>
                                <h6 class="title text-white">{{ $testimonial->designation }}</h6>
                            </div>
                        </div>
                        <!-- Testimonials items ends -->        
                    @endforeach

                        <!-- Testimonials items start-->
                        <div class="item">
                            <div class="thumb"><img src="{{ URL::to('public/testimonialimages'.'/'.$testimonials[0]->image_path ) }}" alt="" width="90" class="img-circle">
                            </div>
                            <div class="content">
                                <p>{{ $testimonials[0]->message }}</p>
                                <h5 class="author text-theme-colored">{{ $testimonials[0]->name }}</h5>
                                <h6 class="title text-white">{{ $testimonials[0]->designation }}</h6>
                            </div>
                        </div>
                        <!-- Testimonials items ends -->        
                    


                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-------testimonials ends--------->



   <!-- ask a question section starts-->

<section class="divider question-msg" id="free">
 <div class="container">
  <div class="row">
   <div class="col-md-12">
    <div class="widget border-1px p-30">
      <h5 class="widget-title line-bottom">Ask A Question</h5>
      {!! Form::open(['route'=>'ask','name'=>'quick_contact_form','class'=>'quick-contact-form','id'=>'quick_contact_form']) !!}
        <div class="form-group">
                 <script>
                      function countChar(val) {
                        var len = val.value.length;
                        if (len >= 121) {
                          val.value = val.value.substring(0, 120);
                        } else {
                          $('#charNum').text(120 - len);
                        }
                      };
                    </script>
          <textarea id="field" class="form-control required" placeholder="Ask A Question"  rows="3" name="message" onkeyup="countChar(this)" style="color:black;"></textarea>
          <div id="charNum">120</div>
        </div>
        <div class="panel">
          <div class="panel-title"> <a data-parent="#accordion1" data-toggle="collapse" href=".accordion_qq" class="collapsed" aria-expanded="false"> <span class="open-sub"></span> Add Detail</a> </div>
            <div  class="accordion_qq panel-collapse collapse" role="tablist" aria-expanded="false">
              <div class="panel-content">
                  <script>
                    function countChar1(val) {
                      var len = val.value.length;
                        if (len >= 1001) {
                            val.value = val.value.substring(0, 1000);
                        } else {
                                $('#charNum1').text(1000 - len);
                                }
                              };
                  </script>
                <textarea id="field" class="form-control" placeholder="Ask A Question" name="detail" rows="3" col="10" onkeyup="countChar1(this)" style="color:black;"></textarea>
                <div id="charNum1">1000</div>
              </div>
            </div>
          </div>
          <div class="form-group">
@if(Auth::check())      
            <button type="submit" class="btn btn-dark btn-theme-colored btn-sm mt-0" >Ask Question</button>
@else
            <a href="{{ route('login') }}" class="btn btn-dark btn-theme-colored btn-sm mt-0">Ask Question</a>
            <p class="mt-10"><span><span style="color:red">* </span>Please login first!</span></p>
@endif      
          </div>
      {!! Form::close() !!}

              <!-- Quick Contact Form Validation-->
              <script type="text/javascript">
                $("#quick_contact_form").validate();
              </script>
            </div>
   </div>
  </div>

<section class="search-alphabet">

<h4 class="widget-title line-bottom pull-left">Search Lawyer Alphabetically</h4>
        <div class="container">

        <a class="search-alpha" href="{{ route('findlawyers',['a']) }}">A</a><span class="search-exc"> |</span>
                <a class="search-alpha" href="{{ route('findlawyers',['b']) }}">B</a><span class="search-exc"> |</span>
                <a class="search-alpha" href="{{ route('findlawyers',['c']) }}">C</a><span class="search-exc"> |</span>
                <a class="search-alpha" href="{{ route('findlawyers',['d']) }}">D</a><span class="search-exc"> |</span>
                <a class="search-alpha" href="{{ route('findlawyers',['e']) }}">E</a><span class="search-exc"> |</span>
                <a class="search-alpha" href="{{ route('findlawyers',['f']) }}">F</a><span class="search-exc"> |</span>
                <a class="search-alpha" href="{{ route('findlawyers',['g']) }}">G</a><span class="search-exc"> |</span>
                <a class="search-alpha" href="{{ route('findlawyers',['h']) }}">H</a><span class="search-exc"> |</span>
                <a class="search-alpha" href="{{ route('findlawyers',['i']) }}">I</a><span class="search-exc"> |</span>
                <a class="search-alpha" href="{{ route('findlawyers',['j']) }}">J</a><span class="search-exc"> |</span>
                <a class="search-alpha" href="{{ route('findlawyers',['k']) }}">K</a><span class="search-exc"> |</span>
                <a class="search-alpha" href="{{ route('findlawyers',['l']) }}">L</a><span class="search-exc"> |</span>
                <a class="search-alpha" href="{{ route('findlawyers',['m']) }}">M</a><span class="search-exc"> |</span>
                <a class="search-alpha" href="{{ route('findlawyers',['n']) }}">N</a><span class="search-exc"> |</span>
                <a class="search-alpha" href="{{ route('findlawyers',['o']) }}">O</a><span class="search-exc"> |</span>
                <a class="search-alpha" href="{{ route('findlawyers',['p']) }}">P</a><span class="search-exc"> |</span>
                <a class="search-alpha" href="{{ route('findlawyers',['q']) }}">Q</a><span class="search-exc"> |</span>
                <a class="search-alpha" href="{{ route('findlawyers',['r']) }}">R</a><span class="search-exc"> |</span>
                <a class="search-alpha" href="{{ route('findlawyers',['s']) }}">S</a><span class="search-exc"> |</span>
                <a class="search-alpha" href="{{ route('findlawyers',['t']) }}">T</a><span class="search-exc"> |</span>
                <a class="search-alpha" href="{{ route('findlawyers',['u']) }}">U</a><span class="search-exc"> |</span>
                <a class="search-alpha" href="{{ route('findlawyers',['v']) }}">V</a><span class="search-exc"> |</span>
                <a class="search-alpha" href="{{ route('findlawyers',['w']) }}">W</a><span class="search-exc"> |</span>
                <a class="search-alpha" href="{{ route('findlawyers',['x']) }}">X</a><span class="search-exc"> |</span>
                <a class="search-alpha" href="{{ route('findlawyers',['y']) }}">Y</a><span class="search-exc"> |</span>
                <a class="search-alpha" href="{{ route('findlawyers',['z']) }}">Z</a>
      </div>
     </section>

<!-- Alphabe section ends-->

 </div>
</section>

      <!-- ask a question section ends-->


<!--############################################################-->


{{-- Main contant ends --}}

@stop



@push('js')
  <script src="{{ URL::to('public/new/js/equaljs.js') }}"></script>

@endpush