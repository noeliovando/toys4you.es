<?php



class admin{


private $user;
private $db_server;
private $db_user;
private $db_pass;
private $db_name;
protected $nombre;
protected $descripcion;




function conectar($db_server,$db_user,$db_pass,$db_name){ 
               $this->db_server = $db_server; 
               $this->db_user = $db_user; 
               $this->db_pass = $db_pass; 
               $this->db_name = $db_name; 
               
$this->db_conexion = mysql_connect($this->db_server,$this->db_user,$this->db_pass); 
   
 $db_seleccion = mysql_select_db($this->db_name,$this->db_conexion); 
   
              
               } 


public function dash()
{
if(isset($_GET['dash']))
{

$this->real=mysql_query("SELECT * FROM Madrid ",$this->db_conexion);

$this->numero=mysql_num_rows($this->real);

echo '

<div class="jumbotron" div style=background-color:#f7f7f7;>
    <h1 class="display-3">Area del administrador </h1>
  <p class="lead">Bienvenido al area del administrador, en esta seccion podras administrar  toda la pagina, publicar, editar o cambiar articulos, recibir mensajeria y la vez supervisar el movimiento que ocurre dentro de la misma. </p>
  <hr class="my-4">

  <p class="lead">
    <a class="btn btn-primary btn-lg" href="#"  id="menu-toggle" role="button">menu</a>
  </p>
</div>
 <div id="page-content-wrapper">
            <div class="container-fluid">



   

            <div style=Width:100%;float:left;>


   <div class="album text-muted">
      <div class="container">

        <div class="row">


          <div class="card">
            <img src="https://http2.mlstatic.com/avengers-capitan-america-hulk-ironman-sweater-franela-orig-D_NQ_NP_851211-MLV20480787845_112015-F.jpg" alt="" div style=width:90%;margin-left:5%;height:280px;>
<h2> Agregar articulos </h2>

            <p class="card-text">Agrega un nuevo articulo a tu lista de productos en venta.</p>

<br> 

<a href="?vista=admin.php&add" class="btn btn-primary"> Agregar articulo </a>

          </div>


          <div class="card">
                <img src="https://lafrikileria.com/18795-thickbox_default/taza-marvel-comic.jpg" alt="" div style=width:90%;margin-left:5%;height:280px;>

<h2> Gestionar inventario </h2>

            <p class="card-text"> Gestiona el contenido que muestras en el inventario, edita algun producto o eliminalo .</p>

<br>


<a href="?vista=admin.php&arti" class="btn btn-primary"> Gestionar inventario</a>

          </div>


          <div class="card">
             <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Circle-icons-mail.svg/1000px-Circle-icons-mail.svg.png" alt="" div style=width:90%;margin-left:5%;height:280px;>
           


<h2> Mensajeria</h2>

            <p class="card-text"> Administra todos los mensajes que llegan a tu bandeja de mensajes en la pagina </p>


<br>


<a href="?vista=admin.php&men" class="btn btn-primary"> Ver mensajes</a>


          </div>

          </div>

       

          <br><br>





</div>


          <div style=Width:100%;float:left;margin-top:2%;>
<h2>  Articulos  </h2>


   <form>

            <input type="text"  class="form-control" placeholder="Buscar articulo.." name="bucar" onkeyup="buscar_ajax(this.value);" div style=width:70%;>

</form>

  <div id="mostrar">



<table class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Nombre</th>
      <th>Precio</th>
     <th> Editar</th>
    </tr>
  </thead>
  <tbody>
    <tr>
  ';

$this->articulos=mysql_query("SELECT DISTINCT descripcion FROM juguetes LIMIT 20 ",$this->db_conexion);

$this->conta=0;

while($this->row=mysql_fetch_array($this->articulos))
{

	$this->conta+=1;
$this->nombre2=$this->row['descripcion'];

$this->arti2=mysql_query("SELECT * FROM juguetes WHERE descripcion='".$this->nombre2."' ",$this->db_conexion);

$this->row2=mysql_fetch_array($this->arti2);

$this->nombre=$this->row2['descripcion'];
$this->precio=$this->row2['precio'];

$this->id=$this->row2['id'];

  echo '
      <th scope="row">'.$this->conta.'</th>
      <td><a class="btn" data-toggle="modal" href="?vista=admin.php&up='.$this->id.'" id="#exampleModalLong" >'.$this->nombre.'</a></td>
      ';
      if($this->precio==''){
echo '
<td>(<strong> No hay precio </strong>)</td>

  ';

      }else{
echo '
<td>'.$this->precio.'</td>

  ';

      }
 
echo '
<td> <a class="btn" data-toggle="modal" href="?vista=admin.php&up='.$this->id.'" > <img src="https://icon-icons.com/icons2/506/PNG/512/pencil_icon-icons.com_49323.png" div id="pic" /> </a> </td>
 <tr>




  <div class="modal fade" id="exampleModalLong'.$this->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">'.$this->nombre.'</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
';

if($this->precio==''){
   echo '<p>
 <strong div style=font-size:20px;> ( No hay precio ) </strong>
</p>';
}else{
     echo '<p>
 <strong div style=font-size:25px;> '.$this->precio.' </strong>
</p>';

}



echo '

 <p>

</p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>







  <div class="modal fade" id="editar'.$this->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
   
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"> Editar ( '.$this->nombre.')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form action="?Vista=index.php"  method="post">
 
<input type="text" name="nombre" class="form-control" value="'.$this->nombre.'" />

<br>

<input type="text" name="id"  value="'.$this->id.'" />





';

if($this->precio==''){

   echo '<input type="text" name="precio" class="form-control" value="No hay precio" />';
}else{
     echo '<input type="text" name="precio" class="form-control" value="'.$this->precio.'" />';

}



echo '

<br>

<textarea class="form-control" name="descripcion" div style=height:200px;>'.$this->nombre.' </textarea>



      </div>
      <div class="modal-footer">
<div id="resp"> hol </div>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<input type="button" value="Cambiar" id="btn-ingresar" class="btn btn-primary" />


  </form>
      </div>
    </div>
  
  </div>
</div>
</div>

';









}

echo '
  </tr>
  </tbody>
</table>

</div>

<br><br>
</div>




            </div>
        </div>




    </div>
    <!-- /#wrapper -->






    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



';

}else{}

}









public function mensaje()
{
if(isset($_GET['men']))
{



echo '

<div class="jumbotron" div style=background-color:#f7f7f7;>
    <h1 class="display-3">Bandeja de mensajes </h1>
  <p class="lead"> En esta seccion podras recibir toda la mensajeria de la pagina </p>
  <hr class="my-4">

  <p class="lead">
    <a class="btn btn-primary btn-lg" href="#"  id="menu-toggle" role="button">Menu</a>
  </p>
</div>
';




echo '
<div id="myWatch2"> </div>




            </div>
        </div>




    </div>
    <!-- /#wrapper -->






    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



';

}else{}




}


















public function mensajevis()
{
if(isset($_GET['mena']))
{

EXTRACT($_GET);

mysql_query("UPDATE mensajes SET visto='0' WHERE id='$mena' ORDER BY visto DESC ",$this->db_conexion);

$this->informacion=mysql_query("SELECT * FROM mensajes WHERE id='$mena' ",$this->db_conexion);

$this->row4=mysql_fetch_array($this->informacion);

$this->nombre=$this->row4['nombre'];
$this->descripcion=$this->row4['descripcion'];
$this->correo=$this->row4['correo'];
$this->telefono=$this->row4['telefono'];


echo '

<div class="jumbotron" div style=background-color:#f7f7f7; >
    <h1 class="display-3">'.$this->nombre.' </h1>
  <p class="lead"> '.$this->correo.' </p>
  <hr class="my-4">

  <p class="lead">

'.nl2br($this->descripcion).'
<br>
    <a class="btn btn-primary btn-lg" href="?vista=admin.php&men"  >Volver a la bandeja</a>
  </p>
</div>
';



echo '

<div style=Width:40%;float:left;>






            </div>
        </div>




    </div>
    <!-- /#wrapper -->






    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



';

}else{}




}








public function articu()
{
if(isset($_GET['arti']))
{




echo '

<div class="jumbotron" div style=background-color:#f7f7f7;>
    <h1 class="display-3">  Articulos</h1>
  <p class="lead"> En esta area podras revisar todos los articulos que tienes hasta ahora, puedes cambiar su informacion o eliminarlo. </p>
  <hr class="my-4">

  <p class="lead">
    <a class="btn btn-primary btn-lg" href="#"  id="menu-toggle" role="button">Menu</a>
  </p>
</div>
 <div id="page-content-wrapper">
            <div class="container-fluid">



   

   


          <div style=Width:100%;float:left;margin-top:2%;>
<h2>  Articulos  </h2>


   <form>

            <input type="text"  class="form-control" placeholder="Buscar articulo.." name="bucar" onkeyup="buscar_ajax(this.value);" div style=width:70%;>

</form>

  <div id="mostrar">



<table class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Nombre</th>
      <th>Precio</th>
     <th> Editar</th>
    </tr>
  </thead>
  <tbody>
    <tr>
  ';

$this->articulos=mysql_query("SELECT * FROM juguetes LIMIT 20 ",$this->db_conexion);

$this->conta=0;

while($this->row=mysql_fetch_array($this->articulos))
{

  $this->conta+=1;

$this->nombre=$this->row['descripcion'];
$this->precio=$this->row['precio'];
$this->id=$this->row['id'];

  echo '
      <th scope="row">'.$this->conta.'</th>
      <td><a class="btn"  href="?vista=admin&up='.$this->id.'" target="blank"  >'.$this->nombre.'</a></td>
      ';
      if($this->precio==''){
echo '
<td>(<strong> No hay precio </strong>)</td>

  ';

      }else{
echo '
<td>'.$this->precio.'</td>

  ';

      }
 
echo '
<td> <a class="btn"  href="?vista=admin.php&up='.$this->id.'"  target="blank"> <img src="https://icon-icons.com/icons2/506/PNG/512/pencil_icon-icons.com_49323.png" div id="pic" /> </a> </td>
 <tr>






  <div class="modal fade" id="editar'.$this->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
   
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"> Editar ( '.$this->nombre.')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form action="?Vista=index.php"  method="post">
 
<input type="text" name="nombre" class="form-control" value="'.$this->nombre.'" />

<br>

<input type="text" name="id"  value="'.$this->id.'" />





';

if($this->precio==''){

   echo '<input type="text" name="precio" class="form-control" value="No hay precio" />';
}else{
     echo '<input type="text" name="precio" class="form-control" value="'.$this->precio.'" />';

}



echo '

<br>

<textarea class="form-control" name="descripcion" div style=height:200px;> </textarea>



      </div>
      <div class="modal-footer">
<div id="resp"> hol </div>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<input type="button" value="Cambiar" id="btn-ingresar" class="btn btn-primary" />


  </form>
      </div>
    </div>
  
  </div>
</div>
</div>

';









}

echo '
  </tr>
  </tbody>
</table>

</div>

<br><br>
</div>




            </div>
        </div>




    </div>
    <!-- /#wrapper -->






    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



';




}else{}




}









public function upda()
{
if(isset($_GET['up']))
{

EXTRACT($_GET);

$this->producto=mysql_query("SELECT * FROM juguetes WHERE id='$up' ",$this->db_conexion);
$this->num=mysql_num_rows($this->producto);

if($this->num>0){}else{ header("location:?vista=admin.php&arti");}


$this->row6=mysql_fetch_array($this->producto);

$this->precio=$this->row6['precio'];
$this->nom=$this->row6['descripcion'];
$this->descripcion2=$this->row6['descripcion'];
$this->idd=$this->row6['id'];
$this->pic=$this->row6['ruta'];


if($this->pic==''){

$this->confirmar=mysql_query("SELECT *  FROM juguetes WHERE descripcion='".$this->descripcion2."' AND ruta!='' ",$this->db_conexion);

$this->ro6=mysql_fetch_array($this->confirmar);

$this->pic2=$this->ro6['ruta'];

}else{ $this->pic2=$this->row6['ruta']; }



echo '

<div class="jumbotron" div style=background-color:#f7f7f7;>
    <h3 class="display-3"> Seleccionaste  <strong>'.$this->nom.' </strong></h3>
  <p class="lead"> Puedes tanto cambiar cualquier informacion de este producto asi como borrarlo </p>
  <hr class="my-4">

  <p class="lead">
    <a class="btn btn-primary btn-lg" href="?vista=admin.php&arti"  >Volver</a>
  </p>
</div>
';




echo '



<div style=width:49%;float:left;>

<h2> Datos </h2>


<div style=width:70%;margin-left:3%;float:lefT;>

<form id="formulario"  method="post" >
 
<input type="text" name="nom" class="form-control" value="'.$this->nom.'" />

<br>

<input type="hidden" name="id"  value="'.$this->idd.'" />





';

if($this->precio==''){

   echo '<input type="text" name="precio" class="form-control" value="No hay precio" />';
}else{
     echo '<input type="text" name="precio" class="form-control" value="'.$this->precio.'" />';

}



echo '

<br>




     
<br>


<input type="button" value="Cambiar" id="btn-ingresar" class="btn btn-primary" div style=float:left; />
</form>

<form id="formulario2" method="post">

<input type="hidden"  name="id" value="'.$this->idd.'" />

 <input type="button" value="Borrar" id="btn-ingresar2" class="btn btn-danger" div style=Float:left;margin-left:2%; />

</form>
<br><br>
<div id="resp"></div>
<div id="resp2"></div>

<br>

</div>


  











</diV>


<div style=width:49%;float:left;>

<h2>  Articulo  seleccionado</h2>


<div class="card" style="width: 20rem;margin-left:4%;">
  <img class="card-img-top" src="fotos/'.$this->pic2.'" div style=height:200px; alt="Card image cap">
  <div class="card-block">
    <h5 class="card-title">'.$this->nom.'</h5>
    <p class="card-text">
<strong>'.$this->precio.' </strong>
    .</p>
  
  </div>
</div>



</diV>




            </div>
        </div>




    </div>
    <!-- /#wrapper -->






    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



';

}else{}




}












public function ordenes()
{
if(isset($_GET['or']))
{



echo '

<div class="jumbotron" div style=background-color:#f7f7f7;>
    <h1 class="display-3">Ordenes de compra</h1>
  <p class="lead"> Revisa todas las ordenes de compra</p>
  <hr class="my-4">

  <p class="lead">
    <a class="btn btn-primary btn-lg" href="#"  id="menu-toggle" role="button">Menu</a>
  </p>
</div>

';





$this->conta=0;

if(isset($_GET['nr'])){

EXTRACT($_GET);

$this->orden=mysql_query("SELECT * FROM orden  WHERE id='$nr' ",$this->db_conexion);



$this->or=mysql_fetch_array($this->orden);

$this->nombre=$this->or['nombre'];
$this->monto=$this->or['monto'];
$this->email=$this->or['correo'];
$this->telefono=$this->or['telefono'];
$this->direccion=$this->or['direccion'];
$this->serial=$this->or['numero'];

mysql_query("UPDATE orden SET visto='1' WHERE id='$nr' ",$this->db_conexion);


echo "
<div style=margin:1%;>

<h1> ".$this->nombre." </h1>

<span> <strong> email : </strong> ".$this->email." </span>
<br>
<span> <strong> Telefono : </strong> ".$this->telefono." </span>
<br>
<span> <strong> Monto : </strong> ".$this->monto." </span>

<br>

<span> <strong>Articulos pedidos : </strong> </span> <br>
";

$this->ip=$_SERVER['REMOTE_ADDR'];  


$this->carrito=mysql_query("SELECT *fROM  compras WHERE usuario='".$this->ip."'  AND enviado='1' AND numero='".$this->serial."' ",$this->db_conexion);

$this->conta=0;


while($this->ow=mysql_fetch_array($this->carrito)){

$this->conta+=1;
$this->articulo=$this->ow['articulo'];
$this->id=$this->ow['id'];

$this->carrito2=mysql_query("SELECT * FROM juguetes WHERE id='".$this->id."' ",$this->db_conexion);

$this->ow2=mysql_fetch_array($this->carrito2);

$this->name=$this->ow2['descripcion'];

echo " <span> <strong> ".$this->conta." </strong> - ".$this->name."  </span> <br> "; 

}

echo "
<br>

<a href='?vista=admin.php&or' >Volver </a>

<br><br>

<h5> Direccion : ".$this->direccion."  </h5>

<br>


 <div id='map'></div>
    </div>
    <script>
      function initMap() {
        var myLatLng = {lat: 10.1878247, lng: -67.4570927};

        // Create a map object and specify the DOM element for display.
        var map = new google.maps.Map(document.getElementById('map'), {
          center: myLatLng,
          scrollwheel: false,
          zoom: 15
        });

        // Create a marker and set its position.
        var marker = new google.maps.Marker({
          map: map,
          position: myLatLng,
          title: 'Hello World!'
        });
      }

    </script>


</div>


";


///////////////
}else{

  $this->orden=mysql_query("SELECT * FROM orden  ORDER BY visto ASC ",$this->db_conexion);

echo 
'

<table class="table">
  <thead class="thead-inverse">
    <tr>
      <th>#</th>
      <th>Nombre</th>
      <th>Telefono</th>
      <th>Monto</th>
    <th>Informacion</th>
    </tr>
  </thead>
  <tbody>
    <tr>';



while($this->or=mysql_fetch_array($this->orden)){


$this->conta+=1;
$this->nombre=$this->or['nombre'];
$this->monto=$this->or['monto'];
$this->telefono=$this->or['telefono'];
$this->id=$this->or['id'];
$this->visto=$this->or['visto'];

    echo "
      <th scope='row'>".$this->conta."</th>
      <td>".$this->nombre." </td>
      <td> ".$this->telefono." </td>
      <td> ".$this->monto." </td>
      <th> <a href='?vista=admin.php&or&nr=".$this->id."'> Ver mas

";

if($this->visto==1){echo " (visto)";}else{}
  
  echo "     </a></th>
    </tr>";

}

///////////////

}

echo '
  </tbody>
  </thead>
</table>


            </div>
        </div>




    </div>
    <!-- /#wrapper -->






    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



';

}else{}




}








public function add()
{
if(isset($_GET['add']))
{

EXTRACT($_GET);


echo '

<div class="jumbotron" div style=background-color:#f7f7f7;>
    <h3 class="display-3"> Agregar nuevo articulo <strong></strong></h3>
  <p class="lead"> Llena el siguiente formulario para agregar un articulo</p>
  <hr class="my-4">

  <p class="lead">
  <a class="btn btn-primary btn-lg" href="#"  id="menu-toggle" role="button">menu</a>
  </p>
</div>
';


echo ' 

<div  div style=Width:60%;float:left;margin-left:2%; div id="bor">

<h1> Agregar articulo </h1>

<form actio="?vista=admin.php&add" method="post" enctype="multipart/form-data">

    <div class="form-group"> <!-- Full Name -->
        <label for="full_name_id" class="control-label">Nombre del articulo</label>
        <input type="text" class="form-control" id="nombre" name="descripcion" placeholder="Nombre del articulo..">
    </div>    

 <div class="form-group"> <!-- Full Name -->
        <label for="full_name_id" class="control-label">Precio del articulo</label>
        <input type="numer" class="form-control" id="full_name_id" name="precio" placeholder="Precio del articulo..">
    </div>    
        

 <div class="form-group"> <!-- Full Name -->
        <label for="full_name_id" class="control-label">Serial del articulo</label>
        <input type="numer" class="form-control" id="full_name_id" name="seria" placeholder="Serial del articulo..">
    </div> 

                            
    <div class="form-group"> <!-- State Button -->
        <label for="state_id" class="control-label">Talla</label>
        <select class="form-control" name="talla" id="state_id">
            <option value="S">S</option>
            <option value="M">M</option>
         <option value="XL">XL</option>
            <option value="XLL">XLL</option>
              <option value="5">Este articulo no posee tallas</option>
        </select>                    
    </div>
    
   <div class="form-group">
                    <input id="file-1" type="file" class="file"  name="referencia" data-preview-file-type="any">
                </div>
    
    <div class="form-group"> <!-- Submit Button -->
    <input type="submit" value="Agregar"  class="btn btn-primary" />
    </div>     
    
</form>
</div>
';


}else{}




}




public function addarti()
{

if(isset($_GET['add'])){
if(isset($_POST['descripcion']))
{

EXTRACT($_POST);

$this->num=mysql_num_rows(mysql_query("SELECT * FROM juguetes WHERE ruta!='' ",$this->db_conexion));

$this->suma=$this->num+1;

$this->name=$_FILES['referencia']['name'];
$this->ruta=$_FILES['referencia']['tmp_name'];


$this->destino="fotos/".$this->name;

copy($this->ruta,$this->destino);

if($talla==5){
$this->insertar=mysql_query("INSERT INTO juguetes (descripcion,talla,seria,precio,ruta,contador)  VALUES ('$descripcion','','$seria','$precio','".$this->name."','".$this->suma."') ",$this->db_conexion);
}else{

$this->insertar=mysql_query("INSERT INTO juguetes (descripcion,talla,seria,precio,ruta,contador)  VALUES ('$descripcion','$talla','$seria','$precio','".$this->name."','".$this->suma."') ",$this->db_conexion);
}



if($this->insertar== TRUE){
echo "
<div class='alert alert-success' id='b'>
Articulo agregado con exito
</div>
";}else{
  echo "
<div class='alert alert-danger' id='b'>
No se inserto
</div>
";
}

}else{}

}else{}



}





public function ordencompra()
{
if(isset($_GET['orden']))
{



echo '

<div class="jumbotron" div style=background-color:#f7f7f7;>
    <h1 class="display-3">Bandeja de mensajes </h1>
  <p class="lead"> En esta seccion podras recibir toda la mensajeria de la pagina </p>
  <hr class="my-4">

  <p class="lead">
    <a class="btn btn-primary btn-lg" href="#"  id="menu-toggle" role="button">Menu</a>
  </p>
</div>
';




echo '
<div id="myWatch2"> </div>




            </div>
        </div>




    </div>
    <!-- /#wrapper -->






    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



';

}else{}




}





public function cupon()
{
if(isset($_GET['cupon']))
{



echo '

<div class="jumbotron" div style=background-color:#f7f7f7;>
    <h1 class="display-3">Cupones </h1>
  <p class="lead"> Agregar cupon de descuento  a un articulo </p>
  <hr class="my-4">

  <p class="lead">
    <a class="btn btn-primary btn-lg" href="#"  id="menu-toggle" role="button">Menu</a>
  </p>
</div>



<br>

<h1> Agregar nuevo cupon </h1>

<div style=width:90%;margin-left:3%;>


<div style=width:50%;float:left;>

<br>
';

/*
echo '
<label> Seleccionar articulo </label>
<select name="opcion" class="form-control" div style=width:80%;>

';




$this->cupones=mysql_query("SELECT DISTINCT descripcion FROM juguetes  ",$this->db_conexion);




while($this->cow=mysql_fetch_array($this->cupones))
{


$this->nombre2=$this->cow['descripcion'];

$this->cupones2=mysql_query("SELECT * FROM juguetes WHERE descripcion='".$this->nombre2."' ",$this->db_conexion);

$this->cow2=mysql_fetch_array($this->cupones2);

$this->nombre=$this->cow2['descripcion'];
$this->id=$this->cow2['id'];

echo "<option value='".$this->id."'> ".$this->nombre."  </option>  ";

}

echo ' </select>';

*/


echo '


<form id="formulario2" method="post">

<label> Agregar un porcentaje de descuento </label>

<input type="text" name="porcentaje" placeholder="Ingresar porcentaje  de descuento.." class="form-control" div style=Width:70%;>

<br>

<label> Agregar codigo del cupon</label>

<input type="text" name="codigo" placeholder="Ingresar codigo del cupon.." class="form-control" div style=Width:70%;>

<br>

<input type="button" id="btn-ingresar2" class="btn btn-info" value="Agregar" />

</form>

<div id="resp2"></div>

<br><br>
<label><strong>
( Estos cupones podran ser utilizados por tus clientes para obtener descuentos a la hora de hacersu compra )
</strong>
</label>
<img src="http://www.escaperoommadrid.com/wp-content/uploads/2015/05/cupon-regalo.png" div style=width:300px;height:300px; />





    </div>






<div style=Width:40%;float:left;> 

<div id="myWatch3"></div>


</div>


</div>

    <!-- /#wrapper -->



';

}else{}




}




}


?>