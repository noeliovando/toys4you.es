<?php $crud = new crud(); 
$crud->conectar('mysql514int.srv-hostalia.com','u5473103_toys499','toys_499','db5473103_toys');

if(isset($_GET['pg'])){}else{header('location:?vista=tienda.php&pg=1');}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Toys4you - Tienda</title>
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
	<!--start slider -->
	    <link rel="stylesheet" href="css/fwslider.css" media="all">
		<script src="js/jquery-ui.min.js"></script>
		<script src="js/css3-mediaqueries.js"></script>
		<script src="js/fwslider.js"></script>

 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="js/datos.js"></script>
<script src="js/datos2.js"></script>
<script src="js/datos10.js"></script>

	<!--end slider -->

<style type='text/Css'>
#borde{
	border-right:solid 1px #dcdcdc;
}
#jumbo
{
height:450px;
background-image:url(http://www.almuestella.com/images/project/8.jpg);
}


</style>

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

        
        <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
           <!----start-images-slider---->
		<div class="images-slider">
		    <div id="fwslider">
		        <div class="slider_container">
		            <div class="slide"> 
		                    <img src="images/img.jpg" alt=""/>
		                <div class="slide_content">
		                    <div class="slide_content_wrap">
		                         <p class="description">New Arrivals</p>
		                        <h4 class="title">Bags & Shoes</h4>	
		                         <p class="description"><a href="#">Browse collection</a></p>	                      
		                        <div class="slide-btns description">		            	                      
		                        </div>
		                    </div>
		                </div>
		            </div>		        
		            <div class="slide">
		                <img src="images/img.jpg" alt=""/>
		                <div class="slide_content">
		                     <div class="slide_content_wrap">		                   
		                         <p class="description">New Arrivals</p>
		                        <h4 class="title">Bags & Shoes</h4>	 
		                         <p class="description"><a href="#">Browse collection</a></p>	 	                       		                       
		                        <div class="slide-btns description">		                      
		                        </div>
		                    </div>
		                </div>
		            </div>
		            <!--/slide -->
		        </div>
		        <div class="timers"> </div>
		        <div class="slidePrev"><span> </span></div>
		        <div class="slideNext"><span> </span></div>
		    </div>
		    <!--/slider -->
		</div>
        </div>
    </div>
</div>




<div class="jumbotron" id='jumbo'>
  <h1 class="display-3">Toys4you</h1>
  <p class="lead" div style=Color:white;>Bienvenido a la tienda virtual de toys4you</p>
  <hr class="my-4">
 
  <p class="lead">
 
 <h2 > Busqueda </h2>


<form id='formulario4' method='post'>

<input type='text' name='articulo' class='form-control' div style=width:30%;float:left; placeholder='Buscar articulo..' />



<input type='button' class='btn btn-info' id='btn-ingresar4' value='Buscar' div style=/>

</form>
  
  

  
  </p>
</div>






 <div class="container">
 <div class="content">	
 <div class="row">
 	<div class="col-md-12 text-center">
 		<h2>Tienda online</h2>
 	</div>	
 </div>	
<div class="row">





<div style=float:left;width:15%; id='borde'>
	
<img src='images/logo4.png' div style=width:120px;height:100px;/>	
<h3> StarWars </h3>
<span> Tenemos para ti, increibles articulos, entra y compruebalo!!! </span>	
	<br>
<h5> <a href='?vista=tienda.php&pg=1&ca=2'> StarWars </a></h5>

	
<h2> Filtrar por:</h2>



<?php $crud->tallas(); ?>




</div>



<div class='col-md-10' style=float:left;>
<br><br>





<div id='resp4'>

			<?php $crud->articulos(); ?>

</div>








</div>


</div>






<div class="clearfix"></div>
</div>








</div>
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