<?php


class buscar{


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


public function busqueda()
{

	EXTRACT($_POST);



echo '


<table class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Nombre</th>
      <th>Precio</th>
     <th>Editar</th>
    </tr>
  </thead>
  <tbody>
    <tr>
  ';


if($cadena=='')
{


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
      <td>'.$this->nombre.'</td>
      ';
      if($this->precio==''){
echo '
<td>(<strong> No hay precio </strong>)</td>
<td> <a class="btn" data-toggle="modal" href="?vista=admin.php&up='.$this->id.'" > <img src="https://icon-icons.com/icons2/506/PNG/512/pencil_icon-icons.com_49323.png" div id="pic" /> </a> </td>
 <tr>
  ';

      }else{
echo '
<td> &#8364; '.$this->precio.'</td>
<td> <a class="btn" data-toggle="modal" href="?vista=admin.php&up='.$this->id.'" > <img src="https://icon-icons.com/icons2/506/PNG/512/pencil_icon-icons.com_49323.png" div id="pic" /> </a> </td>
 <tr>
  ';

      }
 

}

echo '
  </tr>
  </tbody>
</table>

';
}else{




$this->articulos=mysql_query("SELECT * FROM juguetes WHERE descripcion like '%$cadena%'  ",$this->db_conexion);

$this->num=mysql_num_rows($this->articulos);

if($this->num>0)
{

$this->conta=0;

while($this->row=mysql_fetch_array($this->articulos))
{

	$this->conta+=1;

$this->nombre=$this->row['descripcion'];
$this->precio=$this->row['precio'];
$this->id=$this->row['id'];

  echo '
      <th scope="row">'.$this->conta.'</th>
      <td>'.$this->nombre.'</td>
    
      ';
      if($this->precio==''){
echo '
<td> <a class="btn" data-toggle="modal" href="?vista=admin.php&up='.$this->id.'" > <img src="https://icon-icons.com/icons2/506/PNG/512/pencil_icon-icons.com_49323.png" div id="pic" /> </a> </td>
<td>(<strong> No hay precio </strong>)</td>

 <tr>
  ';

      }else{
echo '
<td>'.$this->precio.'</td>
  <td> <a class="btn" data-toggle="modal" href="?vista=admin.php&up='.$this->id.'" > <img src="https://icon-icons.com/icons2/506/PNG/512/pencil_icon-icons.com_49323.png" div id="pic" /> </a> </td>
 <tr>
  ';
  
      }
 

}



/////////////
}else{

echo "<td colspan='4'> No hay resultados </td>";

}
//////////


echo '
  </tr>
  </tbody>
</table>

';




}



}


           }


$buscar= new buscar();
$buscar->conectar('mysql514int.srv-hostalia.com','u5473103_toys499','toys_499','db5473103_toys');
$buscar->busqueda();

           ?>