<?php

class dato{




function conectar($db_server,$db_user,$db_pass,$db_name){ 
               $this->db_server = $db_server; 
               $this->db_user = $db_user; 
               $this->db_pass = $db_pass; 
               $this->db_name = $db_name; 
               
$this->db_conexion = mysql_connect($this->db_server,$this->db_user,$this->db_pass); 
   
 $db_seleccion = mysql_select_db($this->db_name,$this->db_conexion); 
   
              
               } 



public function carro(){

$this->ip=$_SERVER['REMOTE_ADDR'];	

$this->compras=mysql_query("SELECT * FROM compras WHERE  usuario='".$this->ip."' AND enviado=''  ",$this->db_conexion);

echo '<div style=float:left;width:70%;>
<h1>Carro de compras</h1>
<table class="table table-bordered" div style=width:90%;margin-left:2%;>
  <thead>
    <tr>
      <th>#</th>
      <th>Nombre</th>
      <th>precio</th>
      <th> Eliminar </th>
    </tr>
  </thead>
  <tbody>
 ';

$this->acum=0;
   


while($this->row5=mysql_fetch_array($this->compras)){

$this->articulo=$this->row5['articulo'];
$this->idd=$this->row5['id'];

$this->articulonom=mysql_query("SELECT * FROM juguetes WHERE id='".$this->articulo."' ",$this->db_conexion);

$this->row6=mysql_fetch_array($this->articulonom);

$this->nomju=$this->row6['descripcion'];
$this->pray=$this->row6['precio'];
$this->ruta=$this->row6['ruta'];
$this->talla=$this->row6['talla'];

$this->acum+=$this->pray;


if($this->ruta=='')
{
$this->fotografia=mysql_query("SELECT * FROM juguetes WHERE descripcion='".$this->nomju."'  ",$this->db_conexion);

$this->row7=mysql_fetch_array($this->fotografia);

$this->ruta2=$this->row7['ruta'];


}
else{
$this->ruta2=$this->row6['ruta'];

}



echo '

   <tr>
    <td> <img src="fotos/'.$this->ruta2.'"  div style=Width:50px;height:50px;</td>
      <td> '.$this->nomju.'';

if($this->talla==''){}
elseif($this->talla=='2'){}
elseif($this->talla=='3'){}
else{ echo "<br> <span>  <strong> Talla : </strong> ".$this->talla." </span>";}


      echo ' </td>
      <td> &#8364; '.$this->pray.'</td>
    <td> <div align="center">

<form action="?vista=carro.php" method="post">
<input type="hidden" value="'.$this->idd.'" name="id" />
<input type="submit" class="btn btn-danger" id="btn-ingresa2" value="Borrar" />
</form>


</form>

      </div> </td>
    </tr>
 
';


}

echo'<tr>

<th> </th>
<th> </th>
<th> </th>
<td><strong> <h3> Total : </strong> &#8364; '.$this->acum.'  </h3></td>


   </tbody>
</table>
</div>';

}






}

$dato = new dato();
$dato->conectar('mysql514int.srv-hostalia.com','u5473103_toys499','toys_499','db5473103_toys');
$dato->carro();

?>