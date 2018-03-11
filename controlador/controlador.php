<?php


spl_autoload_register(function ($nombre_clase) {
    include 'modelo/'.$nombre_clase . '.php';
});





if(isset($_GET['vista']))
{

EXTRACT($_GET);

include("vista/$vista");


}
else{

header("location:?vista=index.html");
}


?>