

<?php
session_start();
$log = new log();

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
  <link rel="icon" href="ico.png" type="image/png" sizes="32x32">
    <title>Xiritoys - Login</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/signin/signin.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

    <form class="form-signin" action='?vista=log.php' method='post'>
        <h2 class="form-signin-heading">Ingresa tus datos</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" id="inputEmail" name='usuario' class="form-control" placeholder="Nombre de usuario" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name='clave' class="form-control" placeholder="Clave" required autofocus />

     
<input type='submit' value='Iniciar' class='btn btn-lg btn-primary btn-block' />
      </form>
<?php $log->login(); ?>
    </div> <!-- /container -->
  </body>
</html>
