<!-- Gallery Information Form -->
      
<div class="tab-pane" id="gallery">
  <h3 class="text-theme-colored mt-0 pt-5"> Upload Your Gallery</h3>
              <hr>     
        <div class="row">
          {!! Form::open(['route'=>'Gallery','id'=>'glry','name'=>'glry','enctype'=>'multipart/form-data']) !!}
                <input type="hidden" name="id" value="{{ Auth::user()->id }}">

                <div class="col-sm-12" id="photos_div">
                  <div class="field" align="left">
                    <input type="file" class="btn btn-default" id="files" name="photos[]" multiple/>
                    <input type="hidden" name="file_ids" id="file_ids" value="" />
                  </div>
                  <span class='help-block' id="photos_help"><strong></strong></span>
                </div>
                <div class="col-sm-4 col-sm-offset-4 text-center mt-20">
                  <button class="btn btn-info btn-block btn-lg" type="submit" >Upload</button>
                </div>
          {!! Form::close() !!}
        </div>

      <div class="col-lg-12 mt-20">
        <h4 class="m-20 mb-20" style="color:blue;"> Your Gallery Images:</h4>          
        <div class="col-sm-12">
            
        <div class=" row grid-4 gutter-small clearfix" data-lightbox="gallery" >
                      <!-- Portfolio Item Start -->
          @foreach($photos as $img)            
          <div class="col-md-3 mt-20"> 
            <div class="portfolio-item pt-im ">
              <a href="{{ URL::to('public/clientphotos/watermark'.$img->image_path )}}" data-lightbox="gallery-item">
                <img  pt-im src="{{ URL::to('public/clientphotos/watermark'.$img->image_path )}}" alt="">
              </a>
			  <a href="/deletegimage/{{$img->id}}"><i class="fa fa-trash-o"></i>Delete</a>
            </div>
          </div>
        @endforeach
        </div> 


        </div>
      </div>
          <!-- Job Form Validation-->
  <script type="text/javascript">
    $("#glry").validate();
  </script>
<script>
$(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\">Remove image</span>" +
            "</span>").insertAfter("#files");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
          
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});
</script> 
</div>