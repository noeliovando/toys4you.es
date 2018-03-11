<?php

class cupon2{






function conectar($db_server,$db_user,$db_pass,$db_name){ 
               $this->db_server = $db_server; 
               $this->db_user = $db_user; 
               $this->db_pass = $db_pass; 
               $this->db_name = $db_name; 
               
$this->db_conexion = mysql_connect($this->db_server,$this->db_user,$this->db_pass); 
   
 $db_seleccion = mysql_select_db($this->db_name,$this->db_conexion); 
   
              
               } 



public function agregar(){

echo '


<table class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Codigo</th>
      <th>Porcentaje</th>
    
    </tr>
  </thead>
  <tbody>
    <tr>
  ';

  $this->cupones=mysql_query("SELECT * FROM cupon ",$this->db_conexion);

$this->conta=0;




  while($this->row=mysql_fetch_array($this->cupones)){

$this->porcentaje=$this->row['porcentaje'];
$this->codigo=$this->row['codigo'];
$this->conta+=1;

echo "

<td> ".$this->conta." </td>
<td> ".$this->codigo." </td>
<td> ".$this->porcentaje." % </td>
<tr>

";


  }





echo "

</tbody>
</table>

";


}







/////////////////////////

}




           
$cupon2 = new cupon2();
$cupon2->conectar('mysql514int.srv-hostalia.com','u5473103_toys499','toys_499','db5473103_toys');
$cupon2->agregar();


           ?>