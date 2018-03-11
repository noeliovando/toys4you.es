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
		<title>The Yolk Website Template :: w3layouts</title>
			<link rel="icon" href="ico.png" type="image/png" sizes="32x32">
		<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
		<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
		<link href="css/theme.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="refresh" content="4; url=javascript:window.close();"> 
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		</script>
		<!----webfonts---->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800,300' rel='stylesheet' type='text/css'>
		<!----//webfonts---->
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




<style type='text/Css'>

#articulos{
	border-right:solid 1px #dcdcdc;
	margin-top:1%;

}
#borde{
	border-top:solid 1px #dcdcdc;
	margin-top:3%;
	
	width:90%;
	float:left;
}
th
{
	text-align: center;
}
#btn-ingresa2{
	    background-color: #d9534f;
color:white
}

#map
{
width:100%;
height:500px;
}

</style>

 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="js/datos.js"></script>
<script src="js/datos2.js"></script>
<script src="js/datos11.js"></script>

	</head>
	<body>
	


	



      <div id="map"></div>
    
<?php $crud->mapa(); ?>
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0GnaRm5_37GO0iCB1fbMYDnQYhxYiYX8&callback=initMap"
        async defer></script>



</body>
</html>