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
	
	$nombre =$_GET["nombre"];
	$tipo = $_GET["tipo"];
	$descripcion = $_GET["descripcion"];
	$marca =$_GET["marca"];
	$cantidad = $_GET["cantidad"];
	$precio = $_GET["precio"];
	
	include_once '../connection/conection.php';
	
	$sql = "INSERT INTO productos (nombre, tipo, descripcion, marca, cantidad, precio) VALUES ('$nombre','$tipo','$descripcion','$marca','$cantidad','$precio') ";

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
        	window.location.replace('http://localhost/erptavito/estilo/Admin/inventario.php?pagina=1'); 
        }
    }];

<?php
	if ($conn->query($sql) === TRUE){
?>
		modal('success','wide','Inventario','<b>Los datos se han guardado con exito</b>',false);
<?php
}
	else{
?>
		modal('danger','wide','Inventario','<b>Error al guardar " . $conn->error.</b>',false);
<?php 
} ?>
</script>
</html>
