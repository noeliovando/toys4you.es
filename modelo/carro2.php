<?php



class carro2{


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


public function car(){


$this->ip=$_SERVER['REMOTE_ADDR'];

echo '

	<li class="a text-left"><a href="?vista=carro.php"><span class="glyphicon glyphicon-shopping-cart"></span></a>';


$this->datos=mysql_query("SELECT * FROM compras WHERE usuario='".$this->ip."' AND enviado='' AND  numero='' ",$this->db_conexion);

$this->acum=0;

while($this->row=mysql_fetch_array($this->datos)){
$this->arti=$this->row['articulo'];

$this->seleccion=mysql_query("SELECT * FROM juguetes WHERE id='".$this->arti."' ",$this->db_conexion);

$this->row2=mysql_fetch_array($this->seleccion);

$this->precio=$this->row2['precio'];
$this->acum+=$this->precio;

}



	echo ' &#8364; '.$this->acum.'</li> 

';

}


}

$carro2 = new carro2();
$carro2->conectar('mysql514int.srv-hostalia.com','u5473103_toys499','toys_499','db5473103_toys');
$carro2->car(); 


?>