<!--Redirecciona dependiendo del tipo de usuario que es -->
<?php
	$tipo=$_GET['tipo'];
	
	if($tipo == 1){
		 header('Location: Admin/index.php');
	 }
	 else if($tipo == 2){
		 header('Location: Cajero/index.php');
	 }

?>