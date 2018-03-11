<?php


class buscar2{


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



public function articulos()
{


EXTRACT($_POST);



$this->articulos2=mysql_query("SELECT * fROM juguetes WHERE descripcion LIKE '%$articulo%' AND ruta!=''  ",$this->db_conexion);


$this->num=mysql_num_rows($this->articulos2);



$this->conta=0;

echo "<div align='center'> <h3>  La busqueda $articulo obtuvo ".$this->num." Resultados </h3> </div><br>";

while($this->row=mysql_fetch_array($this->articulos2)){

$this->nombre=$this->row['descripcion'];
$this->limite=substr($this->nombre, 0,10);



$this->comprobante=mysql_query("SELECT * FROM juguetes WHERE descripcion='".$this->nombre."' ",$this->db_conexion);

$this->row2=mysql_fetch_array($this->comprobante);




$this->precio=$this->row2['precio'];
$this->ruta=$this->row2['ruta'];
$this->id=$this->row2['id'];


echo '
<script type="text/javascript">

    $(document).on("ready",function(){

      $("#btn-ingresar'.$this->id.'").click(function(){
        var url = "modelo/carro.php";                                      

        $.ajax({                        
           type: "POST",                 
           url: url,                    
           data: $("#formulario'.$this->id.'").serialize(),
           success: function(data)            
           {
             $("#resp'.$this->id.'").html(data);           
           }
         });
      });
    });
</script>
';


echo '



	<div class="col-md-4" style=margin-bottom:2%;>
					<div class="grid">
						<div class="portfolio app mix_all" data-cat="app" style="display: inline-block; opacity: 1;">
							<div class="portfolio-wrapper">		
								<a data-toggle="modal" data-target=".bs-example-modal-md" href="#" class="b-link-stripe b-animate-go  thickbox">
							     <img src="fotos/'.$this->ruta.'" div style=height:200px;width:90%;margin-left:5%; /><div class="b-wrapper"><h2 class="b-animate b-from-left    b-delay03 "><img src="images/link-ico.png" alt=""/></h2>
							  	</div></a>
			                </div>
					    </div>		
						<a href="?vista=producto.php&pr='.$this->id.'">			<p class="text-center">
'.$this->limite.'..

					</p></a>
			<h2 class="text-center">$'.$this->precio.'</h2>
						<div align="center">

<form id="formulario'.$this->id.'" method="post">

<input type="hidden" name="articulo" value="'.$this->id.'" />

					<input type="button" id="btn-ingresar'.$this->id.'" value="Agregar" class="btn btn-default"/>
                  </form>

                  <div id="resp'.$this->id.'"></div>

</div>
                    </div>
				</div>
';

/////////
}


//////////

}



}


$buscar2= new buscar2();
$buscar2->conectar('mysql514int.srv-hostalia.com','u5473103_toys499','toys_499','db5473103_toys');
$buscar2->articulos();

?>