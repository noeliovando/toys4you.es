<?php
session_start();

$admin = new admin();
$admin->conectar('mysql514int.srv-hostalia.com','u5473103_toys499','toys_499','db5473103_toys');

if(isset($_SESSION['username'])){}else{ header("location:?vista=log.php"); }

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

  <title>Xiritoys - Contacto</title>

    <!-- Bootstrap core CSS -->
        <link rel="icon" href="ico.png" type="image/png" sizes="32x32">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="js/datos2.js"></script>
<script src="js/datos3.js"></script>
<script src="js/datos5.js"></script>
<script src="js/datos7.js"></script>
<script src="js/datos8.js"></script>
<script src="js/datos9.js"></script>

<link href="css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/fileinput.min.js" type="text/javascript"></script>
<link href="https://v4-alpha.getbootstrap.com/examples/album/album.css" rel="stylesheet">


<style type='text/css'>

body
{
    margin:0px;
}

#pic
{
    width:20px;
    height:20px;
    opacity:0.7;
}
#pic:hover
{
    width:30px;
    height:30px;
    opacity:1;

    transition: 0.5s;
}
#pc
{
    width:30px;
    height:30px;
    opacity:0.7;
}
#pc:hover
{
   
    opacity:1;

    transition: 0.5s;
}
#map{
    width:100%;
    height:450px;
}
</style>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
    function buscar_ajax(cadena){
        $.ajax({
        type: 'POST',
        url: 'modelo/buscar.php',
        data: 'cadena=' + cadena,
        success: function(respuesta) {
            //Copiamos el resultado en #mostrar
            $('#mostrar').html(respuesta);
       }
    });
    }


</script>


<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0GnaRm5_37GO0iCB1fbMYDnQYhxYiYX8&callback=initMap">
    </script>


</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
             <h2 div style=color:White;> Admin</h2>                </li>
                <li>
                    <a href="?vista=admin.php&dash">Dashboard</a>
                </li>
                <li>
                    <a href="?vista=admin.php&arti">Articulos</a>
                </li>
                <li>
                    <a href="?vista=admin.php&men">Bandeja de mensajes</a>
                </li>
                 <li>
                    <a href="?vista=admin.php&add">Agregar articulo</a>
                </li>
                  <li>
                    <a href="?vista=admin.php&or">Ordenes de compra</a>
                </li>
                <li>
                    <a href="?vista=admin.php&cupon">Agregar cupon</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->


      

        <!-- Page Content -->
    <?php $admin->dash(); ?>
    <?php $admin->mensaje(); ?>
    <?php $admin->upda(); ?>
    <?php $admin->articu(); ?>
    <?php $admin->ordenes(); ?>
    <?php $admin->mensajevis(); ?>
    <?php $admin->add();?>
    <?php $admin->addarti(); ?>
    <?php $admin->ordencompra(); ?>
       <?php $admin->cupon(); ?>
        <!-- /#page-content-wrapper -->



    <!-- Menu Toggle Script -->

    <script>
    $("#file-3").fileinput({
        showCaption: false,
        browseClass: "btn btn-primary btn-lg",
        fileType: "any"
    });
    </script>

    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0GnaRm5_37GO0iCB1fbMYDnQYhxYiYX8&callback=initMap"
        async defer></script>

</body>

</html>