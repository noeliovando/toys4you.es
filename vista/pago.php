<?php


$crud = new crud();
$crud->conectar('mysql514int.srv-hostalia.com','u5473103_toys499','toys_499','db5473103_toys');

EXTRACT($_POST);

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="icon" href="ico.png" type="image/png" sizes="32x32">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>

<div class="alert alert-success" role="alert" style=text-align:Center;>
<h1>Bienvenido al area de pago </h1>
  
  <div align="center">

<div style=Width:70%;margin-left:15%;> <label>A continuacion podras realizar el pago de los articulos seleccionados, haz click en el boton de "Comprar ahora" para enviar el pago.</label> </div></div></div>


<div align="center">

<form action="https://www.paypal.com/es/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<!-- Email que recibirá el pago -->
<input type="hidden" name="business" value="antonio580@hotmail.es">
<!-- Nombre del producto  -->
<input type="hidden" name="item_name" value="Pedido">
<!-- Tipo de moneda -->
<input type="hidden" name="currency_code" value="EUR">
<!-- Precio del producto -->
<input type="hidden" name="amount" value="<?php echo $monto; ?>">
<!-- Redirección al pagar -->
<input type="hidden" name="return" value="http://localhost/pagospureba/index2.php">
<!-- Redirección al cancelar -->
<input type="hidden" name="cancel_return" value="http://localhost/pagospureba/index2.php">
<!-- Imagen de botón -->
<input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_buynowCC_LG.gif" name="submit" alt="PayPal. La forma rápida y segura de pagar en Internet.">
</form>

</div>


  </div>

</body>
</html>