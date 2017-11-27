

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
});


     function sta(obj){
         var val = obj.value;     
         $.post("admingetstate", {region_id : val} ,function(state){
             $("#state").html(state);
         });
     };

     function cities(obj){
         var val = obj.value;     
         $.post('admingetcity', {state_id : val} ,function(city){
             $("#city").html(city);
         });
     };


    
