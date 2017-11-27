

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
});


     function sta(obj){
         var val = obj.value;     
         $.post('getstate', {region_id : val} ,function(state){
             $("#state").html(state);
         });
     };

     function cities(obj){
         var val = obj.value;     
         $.post('getcity', {state_id : val} ,function(city){
             $("#city").html(city);
         });
     };

    
