     

     function expertise(obj){
         var val = obj.getAttribute('id');     
         console.log(val);
         jQuery.post('exprt', {exp_id : val} ,function(ajax_data){
        	console.log(ajax_data);
             // $("#state").html(state);
         });

     };