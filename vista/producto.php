<?php $crud = new crud(); 
$crud->conectar('mysql514int.srv-hostalia.com','u5473103_toys499','toys_499','db5473103_toys');


?>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
	<head>
		<title>Toys4you - Producto</title>
			<link rel="icon" href="ico.png" type="image/png" sizes="32x32">
		<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
		<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
		<link href="css/theme.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		</script>
		<!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800,300' rel='stylesheet' type='text/css'>
		<!--webfonts-->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<!--  jquery plguin -->
	    <script type="text/javascript" src="js/jquery.min.js"></script>
	    <!-- start details -->
<!----details-product-slider--->
				<!-- Include the Etalage files -->
					<link rel="stylesheet" href="css/etalage.css">
					<script src="js/jquery.etalage.min.js"></script>
				<!-- Include the Etalage files -->
				<script>
						jQuery(document).ready(function($){
			
							$('#etalage').etalage({
								thumb_image_width: 300,
								thumb_image_height: 400,
								
								show_hint: true,
								click_callback: function(image_anchor, instance_id){
									alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
								}
							});
							// This is for the dropdown list example:
							$('.dropdownlist').change(function(){
								etalage_show( $(this).find('option:selected').attr('class') );
							});

					});
				</script>
				 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="js/datos.js"></script>
<script src="js/datos2.js"></script>
<script src="js/datos6.js"></script>



	</head>
	<body>
	
		<div class="header-bg">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="logo"><a href="?vista=index.html">
<h1 div style=Color:white;float:lefT;> Toys4you </h1>

						</a></div>
					</div>
					<div class="col-md-8">					
	 					<nav class="navbar navbar-default" role="navigation">
						  <div class="container-fluid">
						    <!-- Brand and toggle get grouped for better mobile display -->
						    <div class="navbar-header"><span class="text-left"><a href="#">MENU</a></span>
						      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						        <span class="sr-only">Toggle navigation</span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						      </button>						   
						    </div>					
						    <!-- Collect the nav links, forms, and other content for toggling -->
						    <div class="collapse navbar-collapse" style=Float:right; id="bs-example-navbar-collapse-1">
						      <ul class="nav navbar-nav">
						      	 
						        
						     <li><a href="?vista=index.html">Inicio</a></li>
						        <li><a href="?vista=tienda.php">Tienda</a></li>
						        <li><a href="?vista=contact.html">Contacto</a></li>
						      </ul>							      					    					      
						    </div><!-- /.navbar-collapse -->
						  </div><!-- /.container-fluid -->
						</nav>
						<div class="right">
							<ul class="list-unstyled">
							

								<div id="myWatch"></div>

												
							</ul>							
						</div>	
					</div>
					<!----start-images-slider---->	
				  <!-- Single button -->
      
				</div>
			</div>
        </div>	

    <div class="single">
         <div class="container">
     	    <div class="rsidebar span_1_of_left">
					   <section class="sky-form">
                
                <img src='images/logo3.jpg' div style=Width:150px;height:150px;/>
                <h2> Black friday </h2>   	
					<span> En este black friday aprovecha los descuentos que podras  conseguir con nuestros cupones de regalo </span>		
					


				  </section>	  		       		       
		</div>
		

		<?php $crud->producto(); ?>




         <div class="nbs-flexisel-container" style=><div class="nbs-flexisel-inner"><ul id="flexiselDemo3" class="nbs-flexisel-ul" style="left: -195.2px; display: block;">
			
			
			
			
	<?php $crud->lineaproductos(); ?>


		 </ul><div class="nbs-flexisel-nav-left" style="top: 74px;"></div><div class="nbs-flexisel-nav-right" style="top: 74px;"></div></div></div>
	    <script type="text/javascript">
		 $(window).load(function() {
			$("#flexiselDemo1").flexisel();
			$("#flexiselDemo2").flexisel({
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		
			$("#flexiselDemo3").flexisel({
				visibleItems: 5,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		    
		});
	</script>
	<script type="text/javascript" src="js/jquery.flexisel.js"></script>
	 <div class="toogle">
     	<h3 class="m_3">Contactar </h3>
     
<div class="col-md-6">

<form id='formulario' method="post">

<label> Nombre </label>
<br>
<input type="text" name='nombre' class='form-control' placeholder="Ingresa tu nombre..">


<br>

<label> Telefono </label>
<br>
<input type="text" name='telefono' class='form-control' placeholder="Ingresa tu telefono..">


<br>

<label> Email </label>
<br>
<input type="text" name='correo' class='form-control' placeholder="Ingresa tu correo..">




</div>


<div class="col-md-6">

<label> Descripcion </label>
<br>
<textarea name='descripcion' clasS='form-control' div style=height:230px;> </textarea>


<br>


<input type='button' class="btn btn-default" id='btn-ingresar' value='Enviar' div style=float:right;  /> 

</div>



</form>


     </div>					
     </div>
     <div class="clearfix"></div>
	 </div>

<div id='resp'></div>


<div class="footer">
	<div class="container">
		 <div class="row">
		 	<div class="col-md-12">
		 		<ul class="list-inline pull-left">
		 			<li><a href="#">Terms of Services</a></li>
		 			<li><a href="#">Refunds</a></li>
		 			<li><a href="#">Privacy Policy</a></li>
		 			<li><a href="#">Blog</a></li>
		 			<li><a href="#">Contact</a></li>
		 		</ul>
		 		<form class="navbar-form pull-right" role="search">
			        <div class="form-group">
			        <input type="text" class="form-control" placeholder="Search">
			        </div>
			        <button type="Find" class="btn btn-default">Find</button>
			    </form>
		 	</div>	
		 </div>	
		 <div class="copy-right text-center">
			<p>&#169Copyright 2014 All Rights Reserved  Template <a href="http://w3layouts.com/">  w3layouts.com</a></p>	
		</div>
	</div>
</div>
		
</body>
</html>