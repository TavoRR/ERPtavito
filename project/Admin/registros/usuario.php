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
	$password = $_GET["password"];
	
	include_once '../connection/conection.php';
	
	$sql = "INSERT INTO usuarios (nombre, tipo, password) VALUES ('$nombre','$tipo','$password') ";

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
        	window.location.replace('http://localhost/erptavito/project/Admin/usuarios.php?pagina=1'); 
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
		modal('danger','wide','Inventario','<b>Error al guardar </b>',false);
<?php 
} ?>
</script>
</html>
