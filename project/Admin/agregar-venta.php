<?php
	session_start();
	include_once 'connection/conection.php';

	//Checa el inicio de sesion
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		
	}
	else{
		header ('Location: ../login.php');
	}
	$now = time();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Moda y Estilo Cinthya Pineda</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		
		
		<link rel="stylesheet" href="../css/main.css">

		<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/bootstrap-dialog.min.css">

	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/bootstrap-dialog.min.js"></script>
	<script src="../js/generales.js"></script>
		
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />

</head>
<body>
	<div class="header">
			<div class="logo">
				
				<span>Brand</span>
			</div>
			<a href="#" class="nav-trigger"><span>cdaa</span></a>
		</div>
		
		<!--Navbar-->
		<div class="side-nav">
			<div class="logo">
				
				<span>Moda y Estilo Cinthya Pineda</span>
			</div>
			<div class="user-Sidenav"><br><br>
				<center><img alt="User" src="img/majestic.png" ></center>
				<br>
				<br>
				<span id="user-name"><?php echo $_SESSION['username'] ?></span>
				<hr>
			</div>
			<nav>
				<ul>
					<li class="">
						<a href="index.php">
							<span><i class="fa fa-dashboard"></i></span>
							<span>Inicio</span>
						</a>
					</li>
					<li>
						<a href="inventario.php?pagina=1">
							<span><i class="fa fa-clipboard"></i></span>
							<span>Inventario</span>
						</a>
					</li>
					<li class="active">
						<a href="ventas.php?pagina=1">

							<span><i class="fa fa-credit-card-alt"></i></span>
							<span>Ventas</span>
						</a>
					</li>
					<li >
						<a href="envios.php">
							<span><i class="fa fa-send"></i></span>
							<span>Envios</span>
						</a>
					</li>
					<li>
						<a href="usuarios.php">
							<span><i class="fa fa-user"></i></span>
							<span>Usuarios</span>
						</a>
					</li>
					<li>
						<a href="reportes.php">
							<span><i class="fa fa-book"></i></span>
							<span>Reportes</span>
						</a>
					</li>
					<li>
						<a href="../logout.php">
							<span><i class="fa fa-sign-out"></i></span>
							<span>Cerrar Sesion</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
		<!-- Contenido -->
			<div class="main-content">
			<div class="title">
				Ventas
			</div>
			
			<div class="main">
				
					<br><br>
					
				<div class="widget">
<style>
	input,select,textarea{font-size: 16px !important; height: 30px !important;}
</style>
				

<?php 
	$sql = "SELECT * FROM productos";
	$result = mysqli_query($conn, $sql);
					
							
?>


					<div class="chart">
						<h2>Nueva Venta</h2><br>
						<form style="margin-left: 8%; margin-right: 40%;     font-size: 16px;" method="POST" action="registros/add_venta.php">
							<input type="hidden" name="product" value="" id="prod">
							<div class="form-group"><label>Seleccione un producto:  </label><select class="form-control" id="product">
								
								<option value="none">- Seleccionar -</option>
								<?php 

								while($row = mysqli_fetch_assoc($result)){
									if ($row['Tipo']==1){
										$tipoprodu = "Maquillaje";
									}
									else if($row['Tipo']==2){
										$tipoprodu = "Ropa";
									}
									else if($row['Tipo']==3){
										$tipoprodu = "Zapatos";
									}	

									?>
									<option value="<?= $tipoprodu; ?>" cost="<?= $row['Precio']; ?>"><?= $row['Nombre']; ?></option>
									<?php

								}
								 ?>
								
							  </select></div>
							  <div class="form-group"><label>Cantidad:</label><input class="form-control" id="cant" type="number" name="cant"> </input></div>
							  <div class="form-group"><label>Tipo</label><input class="form-control" id="tipo" disabled> </input></div>
							 
							<div class="form-group"><label>Fecha: </label><input name="fecha" class="form-control" id="datepicker"/>
                              <div class="form-group"><label>Costo unitario: </label><input id="monto" name="monto" type="number" class="form-control" type="text" ></div>
							  <div class="form-group"><label>Vendedor</label><input name="vendedor" class="vende form-control disabled" id="<?= $_SESSION['iduser']; ?>" value="<?php echo $_SESSION['username'] ?>"> </input></div>
							<br>
                        </div>
							<div style="text-align: right;">
							<button type="submit" class="btn btn-success">Guardar</button>
							<br><br>
						</div>
						</form>
						
					</div>	
						
					
					</div>
						
				</div>	
				</div>
			
		
		
		
		<script>
		$(document).ready(function(){
		  $("#myInput").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#myTable tr").filter(function() {
			  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		  });
		  var d = new Date();
		  $('#datepicker').val(`${d.getFullYear()}-${(d.getMonth()+1)}-${d.getDate()}`);
		});

		$('#product').change(function(){
			$('#tipo').val($(this).val());
			$('#monto').val($('#product option:selected').attr('cost'));
			$('#prod').val($('#product option:selected').text());
		});

		</script>
</body>
</html>