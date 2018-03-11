

    $(document).on('ready',function(){

      $('#btn-ingresar4').click(function(){
        var url = "modelo/buscar2.php";                                      

        $.ajax({                        
           type: "POST",                 
           url: url,                    
           data: $("#formulario4").serialize(),
           success: function(data)            
           {
             $('#resp4').html(data);           
           }
         });
      });
    });

