<?php



class bandeja{


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


public function mensajeria()
{

echo '


<table class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Nombre</th>
      <th>correo</th>
      <th>Mensaje</th>
    </tr>
  </thead>
  <tbody>
    <tr>
  ';



  $this->articulos=mysql_query("SELECT * FROM mensajes  ORDER BY visto DESC ",$this->db_conexion);

$this->conta=0;

while($this->row=mysql_fetch_array($this->articulos))
{

  $this->conta+=1;

$this->nombre=$this->row['nombre'];
$this->correo=$this->row['correo'];
$this->id=$this->row['id'];
$this->visto=$this->row['visto'];

  echo '
      <th scope="row">'.$this->conta.'</th>
      <td>'.$this->nombre.'</td>
      <td>'.$this->correo.'</td>';

if($this->visto==1){
       
       echo ' <td> <a   href="?vista=admin.php&mena='.$this->id.'" target="blank" > <img src="http://icons.iconarchive.com/icons/icons8/windows-8/256/Messaging-Message-Outline-icon.png" div id="pc" /> </a></td>';
}
else{

    echo ' <td> <img src="https://image.flaticon.com/icons/png/512/55/55413.png" div id="pc" /> </td>';

}


      
        echo '
      <tr>






      ';

 

 


}

echo '
  </tr>
  </tbody>
</table>

<br><br><br><br><br><br><br><br><br><br><br><br>






';



}


           }


$bandeja= new bandeja();
$bandeja->conectar('mysql514int.srv-hostalia.com','u5473103_toys499','toys_499','db5473103_toys');
$bandeja->mensajeria();

           ?>