<?php



class carro{


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

EXTRACT($_POST);

$this->ip=$_SERVER['REMOTE_ADDR'];

$this->insertar=mysql_query("INSERT INTO compras (articulo,usuario,enviado,numero) VALUES ('$articulo','".$this->ip."','','') ",$this->db_conexion);

}


}

$carro = new carro();
$carro->conectar('mysql514int.srv-hostalia.com','u5473103_toys499','toys_499','db5473103_toys');
$carro->car(); 


?>