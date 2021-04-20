<?php
  $id = isset($_POST['id1']) ? $_POST['id1'] : 'not yet';
  getModels($id);

  function getModels($id) {  	  	
  	$client = new SoapClient(null, array(
        'uri' => 'http://javiermarcos.epizy.com/soap/',
        'location' => 'http://javiermarcos.epizy.com/soap/service-automoviles.php'
            )
        );  	
  	$models = $client->ObtenerModelos($id);
  	$modelsList = '';
  	foreach ($models as $model) {
  	 	$modelsList .= '<li>' . $model . '</li>';
  	 }  	
  	echo $modelsList;
  }
?>
