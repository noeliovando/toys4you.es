<?php

class cupon{






function conectar($db_server,$db_user,$db_pass,$db_name){ 
               $this->db_server = $db_server; 
               $this->db_user = $db_user; 
               $this->db_pass = $db_pass; 
               $this->db_name = $db_name; 
               
$this->db_conexion = mysql_connect($this->db_server,$this->db_user,$this->db_pass); 
   
 $db_seleccion = mysql_select_db($this->db_name,$this->db_conexion); 
   
              
               } 



public function agregar(){

EXTRACT($_POST);

$this->vacio='';

if($porcentaje==$this->vacio OR $codigo==$this->vacio){

Echo "<div class='alert alert-danger' >
Debes llenar todos los campos
</div>";

}else{

$this->buscarcupon=mysql_query("SELECT  * FROM cupon WHERE codigo='$codigo' ",$this->db_conexion);

$this->num=mysql_num_rows($this->buscarcupon);

if($this->num>0){  Echo "<div class='alert alert-danger' >
Ese cupon ya esta registrado
</div>"; }else{


$this->insertar=mysql_query("INSERT INTO cupon (porcentaje,codigo) VALUES('$porcentaje',$codigo)  ",$this->db_conexion);






if($this->insertar){ Echo "<div class='alert alert-success' >
Cupon agregado
</div>"; }else{ Echo "<div class='alert alert-danger' >
No se agrego
</div>"; }



}





}

/////////////////////////

}




           }


$cupon = new cupon();
$cupon->conectar('mysql514int.srv-hostalia.com','u5473103_toys499','toys_499','db5473103_toys');
$cupon->agregar();
           ?>