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
		<script src="../js/graficas/highcharts.js"></script>
		<script src="../js/graficas/exporting.js"></script>
		<script src="../js/graficas/highcharts-3d.js"></script>
		<script src="../js/graficas/series-label.js"></script>
		<script src="../js/graficas/exporting.js"></script>
		<script src="../js/generales.js"></script>
		
		
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
					<li>
						<a href="ventas.php?pagina=1">

							<span><i class="fa fa-credit-card-alt"></i></span>
							<span>Ventas</span>
						</a>
					</li>
					<li class="active" >
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

		<div class="main-content">
			<div class="title">
				Envios
			</div>
			
			<div class="main">
				
					<br><br>
					
				<div class="widget">
					<div class="chart">
					<h2>Envios</h2>
					  <p>Buscar envio:</p>  
					  <input class="form-control" id="myInput" type="text" placeholder="Buscar..">
					  
					<div class="table-responsive">
					  <table class="table table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Agencia de Envios</th>
								<th>Cliente</th>
								<th>Producto</th>
								<th>Fecha</th>
								<th>Monto</th>
							</tr>
						</thead>
						<tbody id="myTable">
							<tr>
								<td>1</td>
								<td>Fedex</td>
								<td>Sthepanie</td><td>Blusa</td><td>12/12/2018</td>
								<td>$200.00</td>
							</tr>
							<tr>
								<td>2</td>
								<td>Fedex</td>
								<td>Samantha</td>
								<td>Maquillaje</td><td>13/06/2018</td>
								<td>$103.00</td>
							</tr><tr>
								<td>3</td>
								<td>Fedex</td>
								<td>Aylin</td>
								<td>Desmaquillante</td>
								<td>03/05/2018</td>
								<td>$250.00</td>
							</tr><tr>
								<td>4</td>
								<td>Fedex</td>
								<td>Fernanda</td><td>Labial</td><td>06/04/2018</td>
								<td>$150.00</td>
							</tr>
						</tbody>
					  </table>
					  <div style="text-align: right;">
					  	<a href="agregar-envio.php" type="button" class="btn btn-success" >Agregar</a>
					  	<button type="button" class="btn btn-primary disabled">Modificar</button>
					  	<button type="button" class="btn btn-danger disabled">Eliminar</button><br><br>
					</div>
					</div>
						
				</div>
				</div>
					<br>
					<br><br><br><br><br><br><br><br><br><br>
			</div>
		</div>
</body>
</html>