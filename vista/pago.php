<?php


$crud = new crud();
$crud->conectar('mysql514int.srv-hostalia.com','u5473103_toys499','toys_499','db5473103_toys');

EXTRACT($_POST);

$factura = time();

$totalpedido=5;
$concepto = "Compra en toys4you.es";
$version = "HMAC_SHA256_V1";
$clave = 'sq7HjrUOBfKmC576ILgskD5srU870gJ7'; //poner la clave SHA-256
$name = 'toys4you.es';
$code = '343686002';


include "apiRedsys.php";
$rsObj = new RedsysAPI;
$url_tpv = 'https://sis-t.redsys.es:25443/sis/realizarPago'; // PRUEBAS (sandbox)

$terminal='1';

$order=$factura;
$amount=intval($monto*100);
$currency = '978'; // EURO
$consumerlng = '001';
$transactionType = '0';
$urlMerchant = 'http://toys4you.es/?vista=pago.php'; // URL DEL COMERCIO CMS
$urlOK = 'http://toys4you.es'; // URL OK
$urlNO = 'http://toys4you.es'; // URL NOK



$rsObj->setParameter("DS_MERCHANT_AMOUNT",$amount);
$rsObj->setParameter("DS_MERCHANT_CURRENCY",$currency);
$rsObj->setParameter("DS_MERCHANT_ORDER",$order);
$rsObj->setParameter("DS_MERCHANT_MERCHANTCODE",$code);
$rsObj->setParameter("DS_MERCHANT_TERMINAL",$terminal);
$rsObj->setParameter("DS_MERCHANT_TRANSACTIONTYPE",$transactionType);
$rsObj->setParameter("DS_MERCHANT_MERCHANTURL",$urlMerchant);
$rsObj->setParameter("DS_MERCHANT_URLOK",$urlOK);
$rsObj->setParameter("DS_MERCHANT_URLKO",$urlNO);
$rsObj->setParameter("DS_MERCHANT_MERCHANTNAME",$name);
$rsObj->setParameter("DS_MERCHANT_CONSUMERLANGUAGE",$consumerlng);
$rsObj->setParameter("DS_MERCHANT_PRODUCTDESCRIPTION",$concepto);

$params = $rsObj->createMerchantParameters();
$signature = $rsObj->createMerchantSignature($clave);

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
    <div class="col-md-2"></div>
    <div class="col-md-2">

        <form id="realizarPago" action="<?php echo $url_tpv; ?>" method="post" target="_self">
            <input type='hidden' name='Ds_SignatureVersion' value='<?php echo $version; ?>'>
            <input type='hidden' name='Ds_MerchantParameters' value='<?php echo $params; ?>'>
            <input type='hidden' name='Ds_Signature' value='<?php echo $signature; ?>'>
            <input type="image" src="https://singaporecreditcards.files.wordpress.com/2013/07/masterandvisacard.png?w=816&h=9999" alt="Pagar facilmente con tu tarjeta" name="submitPayment" value="PAGAR" />
        </form>

    </div>
    <div class="col-md-2"></div>
</div>


</div>

</body>
</html>