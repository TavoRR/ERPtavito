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

		
		
		
</head>
<body>
<?php
	
	//Recibir por POST los datos del formulario
	
	$nombre =$_POST["nombre"];
	$tipo = $_POST["tipo"];
	$descripcion = $_POST["descripcion"];
	$marca =$_POST["marca"];
	$cantidad = $_POST["cantidad"];
	$precio = $_POST["precio"];
	
?>
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
					<li class="active">
						<a href="inventario.php?pagina=1">
							<span><i class="fa fa-clipboard"></i></span>
							<span>Inventario</span>
						</a>
					</li>
					<li>
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
		<!--Escritorio-->
		<div class="main-content">
			<div class="title">
				Producto Previo
			</div>
			
			<div class="main">
				
					<br><br>
					<div class="widget">
				  <div class="chart">
					  <h2>Producto Previo <?php echo $nombre ?></h2>
					  <div class="table-responsive">
					  <table class="table table-hover">
					  <?php 

			if ($tipo==1){
				$tipoprodu = "Maquillaje";
			}
			else if($tipo==2){
				$tipoprodu = "Ropa";
			}
			else if($tipo==3){
				$tipoprodu = "Zapatos";
			}?>
					  <tr>
					  	<td><strong>Producto:</strong></td>
					  	<td><?php echo $nombre ?></td>
					  </tr>
					  <tr>
					  	<td><strong>Fecha: </strong> </td>
					  	<td> <?php echo $tipoprodu ?></td>
					  </tr>
					  <tr>
					  	<td><strong>Monto: </strong></td>
					  	<td><?php echo $descripcion ?></td>
					  </tr>
					   <tr>
					   	<td><strong>Vendedor: </strong></td>
					   	<td><?php echo $marca ?></td>
					   </tr>
					  </table>
					  </div>
<a href="registros/inventario.php?nombre=<?php echo $nombre ?>&tipo=<?php echo $tipo ?>&descripcion=<?php echo $descripcion ?>&marca=<?php echo $marca ?>&cantidad=<?php echo $cantidad ?>&precio=<?php echo $precio ?>" type="button" class="btn btn-success" >Guardar</a>

					<a href="ventas.php?pagina=1" type="button" class="btn btn-danger">Cancelar</a>
					</div>
					<br>
					<br><br><br><br><br><br><br><br><br><br>
					
				</div>
			</div>
		</div>
	
	
	
	
</body>
</html>