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

		<script src="../js/jquery.dataTables.min.js"></script>
		<script src="../js/dataTables.bootstrap.min.js"></script>
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
					<li class="active">
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
				Reportes
			</div>
			
<?php $totalV=$totalE=0; ?>

			<div class="main">
				<div class="col-xs-6">
					<div class="widget">
						<div class="chart">
						<h2>Ventas</h2>
						  <input class="form-control" id="myInput" type="text" placeholder="Buscar..">
						  
						<div class="table-responsive">
						  <table id="ventasTB" class="table table-hover">
							<thead>
								<tr>
									<th>Productos</th>
									<th>Fecha</th>
									<th>Monto</th>
								</tr>
							</thead>
							<tbody id="myTable">
								<?php 
									$sql = "SELECT * FROM venta";
									$result = mysqli_query($conn, $sql);
									while($row = mysqli_fetch_assoc($result)){
										?>
										<tr>
											<td><?= $row['producto']; ?></td>
											<td><?= $row['Fecha']; ?></td>
											<td>$ <?= $row['Monto']; ?></td>
										</tr>
										<?php
										$totalV++;
									}
							 ?>
							</tbody>
						  </table>
						</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="widget">
						<div class="chart">
						<h2>Envios</h2>
						  <input class="form-control" id="myInput" type="text" placeholder="Buscar..">
						  
						<div class="table-responsive">
						  <table id="enviosTB" class="table table-hover">
							<thead>
								<tr>
									<th>Productos</th>
									<th>Fecha</th>
									<th>Monto</th>
								</tr>
							</thead>
							<tbody id="myTable">
								<?php 
									$sql = "SELECT * FROM envios";
									$result = mysqli_query($conn, $sql);
									while($row = mysqli_fetch_assoc($result)){
										?>
										<tr>
											<td><?= $row['producto']; ?></td>
											<td><?= $row['fecha']; ?></td>
											<td>$ <?= $row['monto']; ?></td>
										</tr>
										<?php
										$totalE++;
									}
							 ?>
							</tbody>
						  </table>
						</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12">
					<hr>
					<div id="grafica"></div>
				</div>
					
			</div>
		</div>
		<script>
		$(document).ready(function(){
			insertarPaginado('ventasTB',5);
			insertarPaginado('enviosTB',5);
			var data = [{
				'name': 'Ventas',
				'y': <?= $totalV ?>,
				'color'	: '#338e7a'},
				{'name': 'Envios',
				'y': <?= $totalE ?>,
				'color'	: '#89c517'}
			]
			Gpastel('cantidad',data,'Ventas vs Envios','grafica');


		  $("#myInput").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#myTable tr").filter(function() {
			  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		  });
		});
		</script>
</body>
</html>