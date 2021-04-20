<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Add icon library -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<?php 
		$client = new SoapClient(null, array(
        'uri' => 'http://javiermarcos.epizy.com/soap/',
        'location' => 'http://javiermarcos.epizy.com/soap/service-automoviles.php'
        )
    );        

    $marcas = $client->ObtenerMarcas();
	?>

	<!-- Add JQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

	<script type="text/javascript">
    	$(document).ready(function(){
    	    $('a').click(function() {
    	       let id_p = '#p'+$(this).attr('id');
    	       let id = $(this).attr('id');		
    	       $.post("getModels.php", {id1: id}, function(result) {                
                $(id_p).append(
                    result
                 ) 
                    .show()
                    .delay(60000)
                    .fadeOut();
                });
            });            
    	});
	</script>

    <title>Hello, world!</title>

    <link rel="stylesheet" type="text/css" href="style/style.css">
  </head>
  <body>  	
    <div class="container-fluid bg-dark text-white">
    	<div class="row bordered-row">
		  <div class="col-sm-4">		     
		       <img height="200" width="300" class="img-fluid" src="images/logo.jpg">
		       </div>   
		     <div class="col-md-4 col-sm-4">
		       <h2>Concesionario Multimarca</h2>
		     </div>		    
		  
		</div>

        <?php
            echo '<div class="row bordered-row justify-content-center p-30">';
            for($i=1; $i<=6; $i++) {
                if($i == 4) echo '<div class="row bordered-row justify-content-center p-30">';
                echo '<div class="bordered-col col-xl-3 col-md-3 col-sm-2"><img class="img-fluid" src="images/'.$marcas[$i].'.png">
                        <a id="'.$marcas[$i].'" href="#">Modelos de '. $marcas[$i].'</a>
                        <ul id="p'.$marcas[$i].'"></ul>
                      </div>';
                if($i == 3 || $i == 6) echo '</div>';
            }
        ?>  

    	<!-- Add font aawesome icons -->	  	
    	<div class="row bordered-row justify-content-center">    		
    		<div class="col">
    			<a href="#" class="fa fa-facebook"></a>
    		</div>
    		<div class="col">
    			<a href="#" class="fa fa-twitter"></a>
    		</div>
    		<div class="col">
    			<a href="#" class="fa fa-linkedin"></a>
    		</div>
    		<div class="col">
    			<a href="#" class="fa fa-instagram"></a>
    		</div>
    	</div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>
