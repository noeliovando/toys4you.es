

    $(document).on('ready',function(){

      $('#btn-ingresar').click(function(){
        var url = "modelo/editar.php";                                      

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


    $(document).on('ready',function(){

      $('#btn-ingresar2').click(function(){
        var url = "modelo/borrar.php";                                      

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
