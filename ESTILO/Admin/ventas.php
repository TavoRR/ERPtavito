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
	<link rel="stylesheet" href="menu.css">
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
	
	$sql = "SELECT * FROM venta";
	$result = mysqli_query($conn, $sql);
	$resultCheck =  mysqli_num_rows($result);
	
	//Paginacion
	$LIM_PAG=10;
	
	$pagina =$_GET["pagina"];
	if(!$pagina){
		$inicio = 0 ;
		$pagina = 1 ;
	}
	else{
		$inicio = ($pagina - 1)* $LIM_PAG;
	}
	
	$total_paginas = ceil($resultCheck / $LIM_PAG);
	
	
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

		<div class="main-content">
			<div class="title">
				Ventas
			</div>
			
			<div class="main">
				
					<br><br>
					<div class="widget">
									<div class="chart">
					<h2>Ventas</h2>
					  <p>Buscar Venta:</p>  
					  <input class="form-control" id="myInput" type="text" placeholder="Buscar..">
					  
					<div class="table-responsive">
					  <table class="table table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Productos</th>
								<th>Fecha</th>
								<th>Monto</th>
								<th>Vendedor</th>
							</tr>
						</thead>
						<tbody id="myTable">
							<tr>
								<td>1</td>
								<td>Maquillaje Shido</td>
								<td>12/12/2018</td>
								<td>$200.00</td>
								<th>Tavo</th>
							</tr>
							<tr>
								<td>2</td>
								<td>Labial<br>Galleta</td>
								<td>13/06/2018</td>
								<td>$103.00</td>
								<th>Daniel</th>
							</tr><tr>
								<td>3</td>
								<td>Blusa</td>
								<td>03/05/2018</td>
								<td>$250.00</td>
								<th>Daniel</th>
							</tr><tr>
								<td>4</td>
								<td>Zapato</td>
								<td>06/04/2018</td>
								<td>$150.00</td>
								<th>Tavo</th>
							</tr>
						</tbody>
					  </table>
					  <div style="text-align: right;">
					  	<a href="agregar-venta.php" type="button" class="btn btn-success" >Agregar</a>
					  	
					</div>
					</div>
						
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
		});
		</script>
</body>
</html>