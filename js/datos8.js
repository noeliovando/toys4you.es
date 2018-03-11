

    $(document).on('ready',function(){

      $('#btn-ingresar2').click(function(){
        var url = "modelo/cupon.php";                                      

        $.ajax({                        
           type: "POST",                 
           url: url,                    
           data: $("#formulario2").serialize(),
           success: function(data)            
           {
             $('#resp2').html(data);           
           }
         });
      });
    });

