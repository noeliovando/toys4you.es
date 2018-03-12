<?php



class crud{


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

        EXTRACT($_GET);

        $this->suma=$pg*30;
        $this->resta=$this->suma-30;

        if(isseT($_GET['ta'])){

            $this->articulos=mysql_query("SELECT distinct descripcion fROM juguetes WHERE talla='$ta'   ",$this->db_conexion);
            $this->articulos2=mysql_query("SELECT distinct descripcion fROM juguetes WHERE talla='$ta'  ",$this->db_conexion);

        }
        elseif(isseT($_GET['ca'])){

//////////////////////
            if($ca=='2'){$this->articulos=mysql_query("SELECT distinct descripcion fROM juguetes WHERE talla='2'   ",$this->db_conexion);
                $this->articulos2=mysql_query("SELECT distinct descripcion fROM juguetes WHERE talla='2'  ",$this->db_conexion);
            }elseif($ca=='3'){
                $this->articulos=mysql_query("SELECT distinct descripcion fROM juguetes WHERE talla='3'   ",$this->db_conexion);
                $this->articulos2=mysql_query("SELECT distinct descripcion fROM juguetes WHERE talla='3'  ",$this->db_conexion);

            }
            else{$this->articulos=mysql_query("SELECT distinct descripcion fROM juguetes WHERE talla!='2'  AND  talla!='3'",$this->db_conexion);
                $this->articulos2=mysql_query("SELECT distinct descripcion fROM juguetes WHERE talla!='2' talla!='3'  ",$this->db_conexion);
            }


/////////////////////

        }
        else{

            $this->articulos=mysql_query("SELECT distinct descripcion fROM juguetes WHERE contador BETWEEN $this->resta AND $this->suma  LIMIT 30 ",$this->db_conexion);
            $this->articulos2=mysql_query("SELECT distinct descripcion fROM juguetes ",$this->db_conexion);

        }



        $this->num=mysql_num_rows($this->articulos2);

        $this->paginas=ceil($this->num/30);

        $this->conta=0;

        while($this->row=mysql_fetch_array($this->articulos)){

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
			<h2 class="text-center"> &#8364; '.$this->precio.'</h2>
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


        if(isset($_GET['ta'])){}elseif(isset($_GET['ca'])){}else{
            echo '<div style=Width:100%;float:left; align="center">
<ul class="pagination">';

            for ($i=1; $i <= $this->paginas ; $i++) {

                if($i==$pg){echo "<li class='disabled'><a href=''>$i</a></li>";}else{ echo "<li><a href='?vista=tienda.php&pg=$i'>$i</a></li>";}

            }







            echo '
</ul>
</div>

';
        }

//////////

    }



    public function producto(){

        EXTRACT($_GET);

        $this->productoid=mysql_query("SELECT * FROM juguetes WHERE id='$pr' ",$this->db_conexion);

        $this->row4=mysql_fetch_array($this->productoid);

        $this->nombre2=$this->row4['descripcion'];
        $this->precio2=$this->row4['precio'];
        $this->ruta2=$this->row4['ruta'];
        $this->id2=$this->row4['id'];
        $this->talla=$this->row4['talla'];






        echo '
<script type="text/javascript">

    $(document).on("ready",function(){

      $("#btn-ingresar'.$this->id2.'").click(function(){
        var url = "modelo/carro.php";

        $.ajax({
           type: "POST",
           url: url,
           data: $("#formulario'.$this->id2.'").serialize(),
           success: function(data)
           {
             $("#resp'.$this->id2.'").html(data);
           }
         });
      });
    });
</script>
';




        echo '

<div class="cont span_2_of_3">
			 <div class="labout span_1_of_a1">
				<!-- start product_slider -->
				     <ul id="etalage">
							<li>
								<a href="optionallink.html">
									<img class="etalage_thumb_image" src="fotos/'.$this->ruta2.'" />
									<img class="etalage_source_image" src="fotos/'.$this->ruta2.'" />
								</a>
							</li>

						</ul>


			<!-- end product_slider -->
			</div>
			<div class="cont1 span_2_of_a1 pull-right">
				<h3 class="m_3">'.$this->nombre2.'</h3>

				<div class="price_single">

							  <span class="actual"> &#8364; '.$this->precio2.'</span><a href="#"></a>
							</div>


				<div class="btn_form">
				   <form id="formulario'.$this->id2.'" method="post">';


        if($this->talla==''){echo '<input type="hidden" value="'.$this->id2.'" name="articulo" /> '; }
        elseif($this->talla=='2'){echo '<input type="hidden" value="'.$this->id2.'" name="articulo" /> '; }
        elseif($this->talla=='3'){echo '<input type="hidden" value="'.$this->id2.'" name="articulo" /> '; }
        else{

            $this->tallas=mysql_query("SELECT * FROM juguetes WHERE descripcion='".$this->nombre2."' ",$this->db_conexion);


            echo "<label> Selecciona talla </label>
<br>

<select name='articulo' class='form-control' div style=Width:150px;margin-bottom:2%M>
";
            while($this->tow=mysql_fetch_array($this->tallas)){

                $this->nomtalla=$this->tow['talla'];
                $this->idtalla=$this->tow['id'];

                echo "<option value='".$this->idtalla."'> ".$this->nomtalla." </option>  ";

            }


            echo "</selecT><br>";

        }

        echo'


					 <input type="button" id="btn-ingresar'.$this->id2.'" class="btn btn-default"  value="Agregar" title="">
				  </form>
<div id="resp'.$this->id2.'"></div>

				</div>
				<ul class="add-to-links list-unstyled">
    			   <li><a href="#"> Pagos</a></li>
    			</ul>
    			<p class="m_desc">
Para poder cancelar los productos debes dirigirte al carro de compras donde podras cancelar todos los articulos que seleccionaste por medio de las formas de pago que te ofrecemos.
    			</p>

                <div class="social_single">
				   <ul list-unstyled>
					  <li class="fb"><a href="#"><span> </span></a></li>
					  <li class="tw"><a href="#"><span> </span></a></li>
					  <li class="g_plus"><a href="#"><span> </span></a></li>
					  <li class="rss"><a href="#"><span> </span></a></li>
				   </ul>
			    </div>
			</div>
			<div class="clearfix"></div>
         </div>



';

    }


    public function lineaproductos(){


        $this->productos=mysql_query("SELECT * FROM juguetes  WHERE contador!=''  LIMIT 7 ",$this->db_conexion);

        while($this->row3=mysql_fetch_array($this->productos)){

            $this->nombre=$this->row3['descripcion'];
            $this->precio=$this->row3['precio'];
            $this->ruta=$this->row3['ruta'];
            $this->id=$this->row3['id'];

            echo '
	 <li class="nbs-flexisel-item" ;><img src="fotos/'.$this->ruta.'" div style=width:145px;height:102px ><div class="grid-flex"><a href="?vista=producto.php&pr='.$this->id.'">'.$this->nombre.'</a><p> &#8364; '.$this->precio.'</p></div></li>

';

        }

//////////
    }







    public function carro2(){

        $this->ip=$_SERVER['REMOTE_ADDR'];

        $this->compras=mysql_query("SELECT * FROM compras WHERE  usuario='".$this->ip."' AND enviado=''  ",$this->db_conexion);


        $this->acum=0;
        $this->numero=mysql_num_rows($this->compras);


        while($this->row5=mysql_fetch_array($this->compras)){

            $this->articulo=$this->row5['articulo'];

            $this->articulonom=mysql_query("SELECT * FROM juguetes WHERE id='".$this->articulo."' ",$this->db_conexion);

            $this->row6=mysql_fetch_array($this->articulonom);

            $this->nomju=$this->row6['descripcion'];
            $this->pray=$this->row6['precio'];
            $this->ruta=$this->row6['ruta'];
            $this->talla=$this->row6['talla'];

            $this->acum+=$this->pray;



        }


        echo "

 <span> <strong> Items :   </strong> ".$this->numero."  </span>
 <br>
 <span> <strong> Precio :   </strong> &#8364; ".$this->acum."  </span>



";


    }




    public function addorden(){


        IF(isset($_POST['nombre'])){

            EXTRACT($_POST);

            $this->azar=rand(2000,100000);
            $this->ip=$_SERVER['REMOTE_ADDR'];


            $this->insertar2=mysql_query("INSERT INTO orden (nombre,direccion,telefono,correo,lng,lat,monto,usuario,numero) VALUES ('$nombre','$direccion','$telefono','$correo','$lng','$lat','$monto','".$this->ip."','".$this->azar."') ",$this->db_conexion);

            mysql_Query("UPDATE compras SET enviado='1' WHERE usuario='".$this->ip."' AND enviado='' ",$this->db_conexion);
            mysql_Query("UPDATE compras SET numero='".$this->azar."' WHERE usuario='".$this->ip."' AND enviado='1' AND numero='' ",$this->db_conexion);

            $this->monto=$monto;

            if($this->insertar2){echo '
<div class="alert alert-success" role="alert">
 Orden enviada con exito <a href="?vista=index.html" class="alert-link">Volver</a>. </div>



  ';


            }else{echo "No";}

        }else{}


////////////////
    }



    public function tallas()
    {



        $this->tallas1=mysql_Query("SELECT * FROM juguetes WHERE talla='S' ",$this->db_conexion);
        $this->tallas2=mysql_Query("SELECT * FROM juguetes WHERE talla='M' ",$this->db_conexion);
        $this->tallas3=mysql_Query("SELECT * FROM juguetes WHERE talla='XL' ",$this->db_conexion);
        $this->tallas4=mysql_Query("SELECT * FROM juguetes WHERE talla='XXL' ",$this->db_conexion);


        $this->categoria1=mysql_Query("SELECT distinct descripcion FROM juguetes WHERE talla!='' ",$this->db_conexion);
        $this->categoria2=mysql_Query("SELECT * FROM juguetes WHERE talla='2' ",$this->db_conexion);
        $this->categoria3=mysql_Query("SELECT * FROM juguetes WHERE talla='3' ",$this->db_conexion);
        $this->num1=mysql_num_rows($this->tallas1);
        $this->num2=mysql_num_rows($this->tallas2);
        $this->num3=mysql_num_rows($this->tallas3);
        $this->num4=mysql_num_rows($this->tallas4);
        $this->num5=mysql_num_rows($this->categoria1);
        $this->num6=mysql_num_rows($this->categoria2);
        $this->num7=mysql_num_rows($this->categoria3);


        echo "


<h3> Tallas </h3>

<span> <a href='?vista=tienda.php&pg=1&ta=S'> S </a>(".$this->num1.") </span> <br>
<span> <a href='?vista=tienda.php&pg=1&ta=M'> M </a> (".$this->num2.") </span> <br>
<span> <a href='?vista=tienda.php&pg=1&ta=XL'> XL </a> (".$this->num3.") </span> <br>
<span> <a href='?vista=tienda.php&pg=1&ta=XXL'> XXL </a> (".$this->num4.") </span> <br>



<h3> Categoria </h3>

<span> <a href='?vista=tienda.php&pg=1&ca=1'> Ropa </a> (".$this->num5.") </span> <br>
<span> <a href='?vista=tienda.php&pg=1&ca=3'> Tazas </a>   (".$this->num7.")</span> <br>
<span> <a href='?vista=tienda.php&pg=1&ca=2'> Otros </a>   (".$this->num6.")</span> <br>



";



    }


    public function lineaproductos2(){


        $this->productos=mysql_query("SELECT * FROM juguetes  WHERE contador!='' ORDER BY  RAND() LIMIT 10 ",$this->db_conexion);

        while($this->row3=mysql_fetch_array($this->productos)){

            $this->nombre=$this->row3['descripcion'];
            $this->precio=$this->row3['precio'];
            $this->ruta=$this->row3['ruta'];
            $this->id=$this->row3['id'];

            $this->limite=substr($this->nombre, 0,10);


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

  <div class="col-md-2">
          <div class="grid">
            <div class="portfolio app mix_all" data-cat="app" style="display: inline-block; opacity: 1;">
              <div class="portfolio-wrapper">
                <a data-toggle="modal" data-target=".bs-example-modal-md" href="#" class="b-link-stripe b-animate-go  thickbox">
                   <img src="fotos/'.$this->ruta.'" div style=Width:150px;height:150px; /><div class="b-wrapper"><h2 class="b-animate b-from-left    b-delay03 "><img src="images/link-ico.png" alt=""/></h2>
                  </div></a>
                      </div>
              </div>

            <li div style=list-style:none;text-align:Center;color:black;><a href="?vista=producto.php&pr='.$this->id.'">'.$this->limite.'</a></li>
            <h2 class="text-center"> &#8364; '.$this->precio.'</h2>



          <form id="formulario'.$this->id.'" method="post">

<input type="hidden" name="articulo" value="'.$this->id.'" />

<div align="center">


          <input type="button" id="btn-ingresar'.$this->id.'" value="Agregar" class="btn btn-default"/>


 </div>
                  </form>

                  <div id="resp'.$this->id.'"></div>




                    </div>
        </div>


';

        }

//////////
    }

    public function borrar()
    {

        if(isseT($_POST['id'])){

            EXTRACT($_POST);

            $this->ip=$_SERVER['REMOTE_ADDR'];

            $this->eliminar=mysql_query("DELETE FROM compras WHERE id='$id' AND usuario='".$this->ip."'",$this->db_conexion);



///////////////
        }else{}


    }





    public function mapa()
    {

        if(isset($_GET['lng'])){

            EXTRACT($_GET);

            echo "

    <script>
      function initMap() {
        var myLatLng = {lat: $lat, lng: $lng};

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

";
        }else{}
//////////
    }
    public function carrotabla(){

        $this->ip=$_SERVER['REMOTE_ADDR'];
        $this->carro=mysql_query("SELECT *FROM compras  WHERE usuario='".$this->ip."'  AND enviado!='1' ",$this->db_conexion);

        $this->acum=0.0;
        $this->num=mysql_num_rows($this->carro);

        $totalNeto = $totalVolumen = 0;

        while($this->row4=mysql_fetch_array($this->carro))
        {

            $this->articulo2=$this->row4['articulo'];

            $this->carro2=mysql_query("SELECT * FROM juguetes WHERE  id='".$this->articulo2."'  ",$this->db_conexion);

            $this->row5=mysql_fetch_array($this->carro2);

            $this->precio2=$this->row5['precio'];
            $this->imagen=$this->row5['ruta'];
            $this->acum+=$this->precio2;

            $totalNeto+=$this->row5['peso_bruto'];
            $totalVolumen+=$this->row5['peso_volumen'];


        }

        $subTotal = $this->acum;

        //$portesPeso = ( $totalNeto > $totalVolumen ? $totalNeto : $totalVolumen );
        $portesPeso =4.5;

        $this->acum +=0;

        $iva=$this->acum*0.21;

        $this->acum +=$iva+$portesPeso;

        echo "
   <table cellspacing='0'>
                                    <tbody>

                                        <tr class='shipping'>
                                            <th>Total articulos</th>
                                            <td>".$this->num."</td>
                                        </tr>

                                        <tr class='cart-subtotal'>
                                            <th>Subtotal<input type=\"hidden\" value=\"".$subTotal."\" id=\"subTotalIn\" /></th>
                                            <td><span class='amount'>€ ".$subTotal."</span></td>
                                        </tr>

                                          <tr class='cart-subtotal'>
                                            <th>Portes(".$portesPeso.")<input type=\"hidden\" value=\"".$portesPeso."\" id=\"portesPeso\" /></th>
                                            <td><span class='amount' id=\"portesDiv\">€ ".$portesPeso."</span></td>
                                        </tr>


                                        <tr class='cart-subtotal'>
                                            <th>IVA(21%)</th>
                                            <td><span class='amount' id=\"ivaDiv\">€ ".$iva."</span></td>
                                        </tr>


                                        <tr class='order-total'>
                                            <th>Total a pagar</th>
                                            <td><strong><span class='amount' id=\"totalDiv\">€ ".$this->acum."</span></strong> </td>
                                        </tr>
                                    </tbody>
                                </table>
";

    }

}



?>