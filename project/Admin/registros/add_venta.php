<?php
	session_start();
	include_once '../connection/conection.php';

	//Checa el inicio de sesion
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		
	}
	else{
		header ('Location: ../../login.php');
	}
	$now = time();


	//Recibir por POST los datos del formulario
	
	$monto =(floatval($_POST["monto"]) * floatval($_POST['cant']) );
	$fecha = $_POST["fecha"];
	$vende = $_POST["vendedor"];
	$product = $_POST["product"];
	$cant = $_POST['cant'];
	$idpro = $_POST['idp'];
	
	include_once '../connection/conection.php';
	
	$sql = "INSERT INTO venta (Monto, Fecha, Vendedor, producto, cantidad) VALUES ('$monto','$fecha','$vende','$product','$cant') ";
			
				

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/bootstrap-dialog.min.css">

	<script src="../../js/jquery.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/bootstrap-dialog.min.js"></script>
	<script src="../../js/generales.js"></script>
</head>
<body>
	
</body>
<script>
	cleanBotonesModal(false);
	botonesModal=[{ 
    label: 'OK',
        cssClass: 'btn-default',
        action: function(dialogItself){ 
        	window.location.replace('http://localhost/erptavito/project/Admin/ventas.php?pagina=1'); 
        }
    }];
<?php
	if ($conn->query($sql) === TRUE){
		$sql = "UPDATE productos set Cantidad = Cantidad - $cant where idProductos = $idpro";
		if ($conn->query($sql) === TRUE){
?>
			modal('success','wide','Venta','<b>Se realizo la venta exitosamente</b>',false);
<?php	}
		else{
?>
			modal('danger','wide','Venta','<b>Error al registrar la venta </b>',false);
	<?php }	} ?>
</script>
</html>
