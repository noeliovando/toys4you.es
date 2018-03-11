

    $(document).on('ready',function(){

      $('#btn-ingresar').click(function(){
        var url = "modelo/contactar.php";                                      

        $.ajax({                        
           type: "POST",                 
           url: url,                    
           data: $("#formulario").serialize(),
           success: function(data)            
           {
             $('#resp').html(data);           
           }
         });
      });
    });

