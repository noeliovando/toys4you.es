
    $(document).on('ready',function(){

      $('#btn-ingresa2').click(function(){
        var url = "modelo/envio2.php";                                      

        $.ajax({                        
           type: "POST",                 
           url: url,                    
           data: $("#formulari2").serialize(),
           success: function(data)            
           {
             $('#res2').html(data);           
           }
         });
      });
    });